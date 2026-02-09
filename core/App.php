<?php

class App {

    public  string   $environment;
    public  string   $protocol;
    public  string   $path;
    public  string   $folder;
    public  string   $root;
    public  string   $absoluteRoot;
    public  Router   $router;
    public  Request  $request;
    private array    $middlewareQueue;

    public function __construct() {
        set_exception_handler([$this, 'handleException']);
        set_error_handler([$this, 'handleError']);
        $this->initServices();
    }

    private function initServices() :void {
        $this->root = ROOT;
        $this->environment = PHP_SAPI;
        $dotenv = Dotenv\Dotenv::createImmutable(ROOT);
        $dotenv->safeLoad();
        $this->middlewareQueue = [];
        $this->request = RequestFactory::fromGlobals();
        $this->path = sprintf("%s://%s/", $this->request->getScheme(), $this->request->gethost());        

        $db = new Database((object)[
            'hostname' => $_ENV['DB_HOSTNAME'], 
            'username' => $_ENV['DB_USERNAME'], 
            'password' => $_ENV['DB_PASSWORD'], 
            'database' => $_ENV['DB_DATABASE'], 
            'charset'  => $_ENV['DB_CHARSET'] ?? 'utf8mb4',
            'port'     => $_ENV['DB_PORT'] ?? 3306
        ]);

        Container::set('App', $this);
        Container::set('Database', $db);
        Container::set('Request', $this->request);

        $this->router = new Router($this->request);
    }

    private function getCliArgs(): object {
        $args = new stdClass();
        foreach($_SERVER['argv'] as $index => $arg) {
            if ($index == 0) {
                continue;
            }
            $argParts = explode('=', $arg);
            if (count($argParts) == 1) {
                $args->{$argParts[0]} = null;
            } else {
                $args->{$argParts[0]} = $argParts[1];
            }
        }
        return $args;
    }

    public function run() {
        if ($this->environment == 'cli') {
            $this->runCliCommand();
            exit(0);
        }

        if ($this->request->getMethod()->value === 'OPTIONS') {
            (new Response(200))->flush();
        }

        $isHeadRequest = $this->request->getMethod()->value === 'HEAD';
        if ($isHeadRequest) {
            $this->request->setMethod(HttpMethodEnum::GET);
        }
        
        $route = $this->router->getRoute();

        if ($isHeadRequest) {
            http_response_code(
                is_null($route) ? 404 : 200
            );
            exit(0);
        }

        if (is_null($route)) {
            error_log(
                sprintf('404 for %s: route is null', $this->request->getUrl())
            );
            (new Response(404, self::renderStaticFile('NotFound')))->flush();
        }

        foreach($route->getMiddleware() as $middlewareClassName) {
            $this->middlewareQueue[$middlewareClassName] = new $middlewareClassName();
            $this->middlewareQueue[$middlewareClassName]->processRequest($this->request, $route);
        }

        $controller = new ($route->getControllerClassName())($this->request, $this);
        $action = $route->getAction();

        $result = ($action) ? $controller->{$action}() : $controller();
        $response = ($result instanceof Response) ? $result : new Response(200, $result ?? '');
        
        foreach(array_reverse(array_keys($this->middlewareQueue)) as $middlewareName) {
            $this->middlewareQueue[$middlewareName]->processResponse($response);
        }

        $response->flush();
    }

    private function runCliCommand() {
        // CLI non ancora implementata in maniera consistente...
        $cliArguments = $this->getCliArgs();

        if (!isset($cliArguments->controller) || !$cliArguments->controller) {
            throw new Exception("Missing controller argument", 500);
        }

        $controllerClassName = sprintf('%sController', $cliArguments->controller);
        if (!class_exists($controllerClassName)) {
            throw new Exception("The requested controller class ({$controllerClassName}) does not exists", 500);
        }

        $controller = new $controllerClassName($cliArguments, $this);

        $action = $cliArguments->action ?? null;
        if (!is_null($action)) {
            if (!preg_match("/^[A-Za-z]\w+$/", $action)) {
                throw new Exception("The requested method name ({$controllerClassName}::".htmlentities($action ?? 'null').") is not valid", 500);
            }
            if (!method_exists($controller, $action)) {
                throw new Exception("The requested method ({$controllerClassName}::{$action}) does not exists.", 500);
            }
        }
        if ($action) {
            $controller->{$action}();
        } else {
            $controller();
        }
    }

    public function handleException(Throwable $error) {
        error_log(
            json_encode($error, JSON_UNESCAPED_UNICODE | JSON_INVALID_UTF8_IGNORE)
        );

        $data = (object)[
            'exception' => (object)[
                'message' => $error->getMessage(),
                'code' => $error->getCode()
            ]
        ];

        if (DEBUG && DEBUG_LEVEL > 1) {
            $data->exception->trace = $error->getTrace();
            $data->exception->file = $error->getFile();
            $data->exception->line = $error->getLine();
        }

        $json = json_encode($data, 128);

        if (DEBUG) {
            (new Response(500, self::renderStaticFile('Exception', ['EXCEPTION' => $json])))->flush();
        }
    }
    
    public function handleError(int $errno, string $errstr, string $errfile, int $errline, array $errcontext = []) {
        error_log(
            json_encode((object)
                [
                    'error' => [
                        'level' => $errno == 0 ? "FATAL" : array_search($errno, get_defined_constants(true)['Core']),
                        'message' => $errstr,
                        'file' => $errfile,
                        'line' => $errline,
                        'context' => $errcontext
                    ]
                ], 
                128
            )
        );
    }

    public function renderStaticFile(string $name, array $templateParts = []) {
        $content = file_get_contents(
            sprintf('%sview/static/%s.html', $this->root, $name)
        );
        if (!empty($templateParts)) {
            foreach($templateParts as $key => $value) {
                $search = sprintf('{{%s}}', $key);
                $content = str_replace($search, $value, $content);
            }
        }
        return $content;
    }

}