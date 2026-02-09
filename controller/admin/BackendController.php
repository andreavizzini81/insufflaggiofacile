<?php

use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;
use \Twig\Extension\DebugExtension;
use \Twig\Extra\Intl\IntlExtension;
use \Twig\TwigFunction;

abstract class BackendController {

    protected App         $app;
    protected Database    $db;
    protected Request     $request;
    protected Response    $response;
    protected ?User       $user;
    protected ?Session    $session;
    protected Environment $twig;
    protected AdminPage   $page;
    protected Preload     $preload;
    
    public    array  $data = [];
    protected array  $links = [];
    protected array  $scripts = [];
    protected object $handler;
    protected string $view;
    protected array  $assets;
    protected string $path;
    protected string $prefix = 'admin';
    protected string $themeId = 'admin';
    protected string $themePath;
    protected string $themeUri;

    protected const ASSETS_POSITIONS = ['head', 'body'];
    
    public function __construct(Request &$request, App &$app) {
        $this->app = $app;
        $this->db = Container::Database();
        $this->session = Container::has('Session') ? Container::Session() : null;
        $this->user = Container::has('User') ? Container::User() : null;
        $this->request = $request;
        $this->response = new Response();
        $this->preload = new Preload();
        $this->path = sprintf('%s%s/', $this->app->path, $this->prefix);
        $this->themePath = sprintf('%sview/%s/', $this->app->root, $this->themeId);
        $this->themeUri = sprintf('%sview/%s/', $this->app->path, $this->themeId);
        $this->loadTemplateInfo();
        $this->initTemplatingEngine();
        $this->loadPage();
    }

    protected function loadTemplateInfo() {
        $themeInfoPath = sprintf('%stheme.json', $this->themePath);
        if (!file_exists($themeInfoPath)) {
            return false;
        }
        $metadata = json_decode(file_get_contents($themeInfoPath));
        foreach($metadata->assets->links as $link) {
            $this->addLink($link->attributes, $link->position);
        }
        foreach($metadata->assets->scripts as $script) {
            $this->addScript($script->attributes, $script->position, $script->content ?? null);
        }
    }

    protected function initTemplatingEngine() {
        $this->twig = new Environment(
            new FilesystemLoader($this->themePath), 
            [
                'cache' => sprintf('%scache', $this->themePath),
                'auto_reload' => true,
                'debug' => true
            ]
        );
        $this->twig->addExtension(new IntlExtension());
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addFunction(
            new TwigFunction('getenv', function ($key) {
                return $_ENV[$key];
            })
        );
        $this->twig->addFunction(
            new TwigFunction('setCheckbox', [Utils::class, 'setCheckbox'], [
                'is_safe' => ['html']
            ])
        );
        $this->twig->addFunction(
            new TwigFunction('setOption', [Utils::class, 'setOption'], [
                'is_safe' => ['html']
            ])
        );
        $this->twig->addFunction(
            new TwigFunction('flagInArray', [Utils::class, 'flagInArray'], [
                'is_safe' => ['html']
            ])
        );
        $this->twig->addFunction(
            new TwigFunction('getDefinition', [Definitions::class, 'getValue'], [
                'is_safe' => ['html']
            ])
        );
        Container::set('Twig', $this->twig);
    }

    public function loadPage() {
        $pageId = $this->db->selectOne('admin_page', ['id'], sprintf('view = \'%s\'', $this->view));
        $this->page = new AdminPage((int)$pageId);
        if (!$this->page->exists()) {
            $this->response->setStatusCode(404);
            $this->view = '404';
            return $this->loadPage();
        }
        if (!$this->page->getIsPublic()) {
            if ($this->session && !$this->session->isValid()) {
                $this->view = 'login';
                return $this->loadPage();
            }
            if (!in_array($this->user->getRoleId(), $this->page->getUserRoles())) {
                $this->view = '401';
                return $this->loadPage();
            }
        }
        $handlerClassName = Utils::c2Convert($this->view, true).'Page';
        if (class_exists($handlerClassName)) {
            $this->handler = new $handlerClassName($this);
            $action = $this->request->getQueryParam('action');
            if ($action) {
                $this->handler->{$action}();
            }
        }
    }

    protected function render(): Response {
        $this->response->setBody(
            $this->twig->render(
                sprintf('%s.twig', $this->view), [
                    'path' => $this->path,
                    'absolutePath' => $this->app->path,
                    'theme' => $this->themeUri,
                    'title' => $this->page->getName(),
                    'view'  => $this->page->getView(),
                    'currentUrl' => $this->request->getUrl(),
                    'links' => $this->links,
                    'scripts' => $this->scripts,
                    'hasNav' => $this->page->getHasNav(),
                    'hasTopbar' => $this->page->getHasTopbar(),
                    'hasPagebar' => $this->page->getHasPagebar(),
                    'filterPath' => ($this->page->hasFilter()) ? sprintf('/filters/%s.twig', $this->page->getFilterName()) : null,
                    'user' => $this->user,
                    'nav' => (new Nav($this->page, $this->path))(),
                    'navStatus' => (($this->request->getCookie('NAV_STATUS') ?? 'close') == 'close') ? 'collapsed-nav' : '',
                    'data' => $this->data
                ]
            )
        );
        return $this->response;
    }

    protected function addLink(object $attributes, string $position = 'head') {
        if (!in_array($position, self::ASSETS_POSITIONS)) {
            return false;
        }
        $this->links[$position][] = $this->buildAssetsLink($attributes);
    }

    protected function addScript(object $attributes, string $position = 'head', ?string $content = null) {
        if (!in_array($position, self::ASSETS_POSITIONS)) {
            return false;
        }
        $this->scripts[$position][] = $this->buildAssetsScript($attributes, $content);
    }

    protected function buildAssetsLink(object $attributes) {
        $parts = ['<link'];
        foreach($attributes as $name => $value) {
            $parts[] = sprintf(
                '%s="%s"', $name, str_replace('{{path}}', $this->themeUri, $value)
            );
        }
        $parts[] = '/>';
        return implode(' ', $parts);
    }

    protected function buildAssetsScript(object $attributes, mixed $content) {
        $parts = ['<script'];
        foreach($attributes as $name => $value) {
            $parts[] = sprintf(
                '%s="%s"', $name, str_replace('{{path}}', $this->themeUri, $value)
            );
        }
        $parts[] = '>';
        if (!is_null($content)) {
            $parts[] = $content;
        }
        $parts[] = '</script>';
        return implode(' ', $parts);
    }
}