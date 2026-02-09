<?php

class RouteGroup extends RouteCollector {

    use RouteMiddlewareAdapter, RouteAccessLevelAdapter;
    private ?string $prefix = null;

    public function __construct(string $prefix, ?array $entries = null) {
        $this->prefix = $prefix;
        $this->accessLevel = AccessLevel::PUBLIC;
        if (!is_null($entries) && count($entries) > 0) {
            $this->entries = array_values($entries);
        }
    }

    public function getRoutes() {
        return array_map(function(Route $route) {
            $route->addPrefix($this->prefix);
            if (!is_null($this->middleware)) {
                $route->withMiddleware($this->middleware);
            }
            if (is_null($route->getAccessLevel())) {
                $route->withAccessLevel($this->accessLevel);
            }
            return $route;
        }, $this->entries);
    }

}

?>