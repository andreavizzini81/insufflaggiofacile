<?php

use \Twig\Environment;
use \Twig\Loader\FilesystemLoader;
use \Twig\Extension\DebugExtension;
use \Twig\TwigFunction;

abstract class FrontendController {

    protected App         $app;
    protected Database    $db;
    protected Request     $request;
    protected Response    $response;
    protected Page|bool   $page;
    protected Environment $twig;

    public    array  $data = [];
    public    string $title;
    public    string $description;
    protected array  $links = [];
    protected array  $scripts = [];
    protected object $handler;
    protected string $view;
    protected array  $assets;
    protected string $prefix = '';
    protected string $themeId = 'website';
    protected string $themePath;
    protected string $themeUri;

    protected const ASSETS_POSITIONS = ['head', 'body'];
    
    public function __construct(Request &$request, App &$app) {
        $this->app = $app;
        $this->request = $request;
        $this->db = Container::Database();
        $this->response = new Response();
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
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addFunction(
            new TwigFunction('getenv', function ($key) {
                return $_ENV[$key];
            })
        );
        $this->twig->addFunction(
            new TwigFunction('setCheckbox', 'Utils::setCheckbox')
        );
        $this->twig->addFunction(
            new TwigFunction('flagInArray', 'Utils::flagInArray')
        );
        Container::set('Twig', $this->twig);
    }

    public function loadPage() {
        $uri = $this->request->getQueryParam('uri') ?? '';
        $language = $this->request->getQueryParam('language');
        $page = new Page();
        if ($page->importFromUri($uri, $language) === false || !$page->exists()) {
            $this->response->setHeader('Location', '/404');
            $this->response->flush();
        }
        $this->page = $page;
    }

    protected function render() :Response {
        $this->response->setBody(
            $this->twig->render(
                sprintf('%s.twig', $this->page->getViewName()), 
                [
                    'path' => $this->app->path,
                    'theme' => $this->themeUri,
                    'page' => $this->page,
                    'title' => is_null($this->page->getTitle()) ? $this->title : $this->page->getTitle(),
                    'description' => is_null($this->page->getMetaDescription()) ? $this->description : $this->page->getMetaDescription(),
                    'f_nav' => (new GetFrontendNav())(),
                    'links' => $this->links,
                    'scripts' => $this->scripts,
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
            if (!is_null($value)) {
                $parts[] = sprintf(
                    '%s="%s"', $name, str_replace('{{path}}', $this->themeUri, $value ?? '')
                );                
            } else {
                $parts[] = sprintf('%s', $name);
            }
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

?>