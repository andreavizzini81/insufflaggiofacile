<?php

class Router extends RouteCollector {

    private Request $request;

    public function __construct(Request &$request) {
        $this->request = $request;
    }

    public function group(string $prefix, callable $callback) {
        $group = new RouteGroup($prefix);
        $callback($group);
        $this->addEntry($group);
        return $group;
    }

    public function getRoute() {
        $match = $this->getMatchingRoute();
        if (!$match) {
            error_log(
                sprintf('404 for %s: route not found', $this->request->getUrl())
            );
            (new Response(404, Container::App()->renderStaticFile('NotFound')))->flush();
        }

        if (!preg_match("/^[A-Za-z]\w+$/", $match->route->getController())) {
            throw new Exception("The requested controller is not valid", 500);
        }

        $controller = $match->route->getControllerClassName();

        if ($controller === false || !class_exists($controller)) {
            throw new Exception("The requested controller class ({$controller}) does not exists", 500);
        }

        $action = $match->route->getAction();

        if (!is_null($action)) {
            if (!preg_match("/^[A-Za-z]\w+$/", $action)) {
                throw new Exception("The requested method name ({$controller}::".htmlentities($action ?? 'null').") is not valid", 500);
            }
            if (!method_exists($controller, $action)) {
                throw new Exception("The requested method ({$controller}::{$action}) does not exists.", 500);
            }
        }

        foreach($match->route->getParams() as $key => $value) {
            if (preg_match("/^\@[0-9]+$/", $value)) {
                $matchIndex = (int)str_replace('@', '', $value);
                if (!array_key_exists($matchIndex, $match->params)) {
                    continue;
                }
                $value = $match->params[$matchIndex];
            }
            $this->request->setQueryParam($key, $value);
        }
        return $match->route;
    }

    private function getMatchingRoute() :mixed {
        foreach($this->entries as $entry) {
            if ($entry instanceof Route && ($matches = $this->getRouteMatches($entry)) && $matches !== false) {
                return (object)[
                    'route' => $entry,
                    'params' => $matches
                ];
            }
            if ($entry instanceof RouteGroup) {
                foreach($entry->getRoutes() as $route) {
                    $matches = $this->getRouteMatches($route);
                    if ($matches !== false) {
                        return (object)[
                            'route' => $route,
                            'params' => $matches
                        ];
                    }
                }
            }
        }
        return false;
    }

    private function getRouteMatches($route) {
        if ($route->getMethod() !== $this->request->getMethod()) {
            return false;
        }
        $matches = [];
        if (preg_match(sprintf('/^%s$/', $route->getFilter()), $this->request->getPath(), $matches) > 0) {
            return $matches;
        }
        return false;
    }

}