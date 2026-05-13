<?php

class Route {

    use RouteMiddlewareAdapter, RouteAccessLevelAdapter;

    private HttpMethodEnum $method;
    private ?string $filter;
    private array   $params;
    private ?string $controller;
    private ?string $action;
    
    private const DEFAULTS = [
        'method'     => HttpMethodEnum::GET,
        'accessLevel'=> null,
        'filter'     => null,
        'params'     => [],
        'controller' => null,
        'action'     => null,
        'middleware' => []
    ];

    public function __construct(?string $filter = null) {
        $this->loadDefaults();
        if (!is_null($filter)) {
            $this->setFilter($filter);
        }
    }

    private function loadDefaults() :void {
        foreach(self::DEFAULTS as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function setMethod(HttpMethodEnum $method) :self {
        $this->method = $method;
        return $this;
    }

    public function setFilter(string $filter) :self {
        $this->filter = $filter;
        return $this;
    }

    public function setParams(array $params) :self {
        $this->params = $params;
        return $this;
    }

    public function setController(string $controller) :self {
        $this->controller = $controller;
        return $this;
    }

    public function setAction(?string $action) :self {
        $this->action = $action;
        return $this;
    }

    public function addPrefix(?string $prefix) {
        $this->filter = sprintf('%s%s', preg_quote($prefix, '/'), $this->filter);
        return $this;
    }

    public function getMethod() {
        return $this->method;
    }

    public function getFilter() {
        return $this->filter;
    }

    public function getParams() {
        return $this->params;
    }

    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }

    public function getControllerClassName() :string|bool {
        if (is_null($this->controller)) {
            return false;
        }
        return "{$this->controller}Controller";
    }

}