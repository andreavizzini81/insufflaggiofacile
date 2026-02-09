<?php

abstract class RouteCollector {

    protected array $entries = [];

    public function addEntry(Route|RouteGroup $item) {
        $this->entries[] = $item;
        return $this;
    }

    public function get(string $filter) {
        $route = (new Route($filter))->setMethod(HttpMethodEnum::GET);
        $this->addEntry($route);
        return $route;
    }

    public function post(string $filter) {
        $route = (new Route($filter))->setMethod(HttpMethodEnum::POST);
        $this->addEntry($route);
        return $route;
    }

    public function put(string $filter) {
        $route = (new Route($filter))->setMethod(HttpMethodEnum::PUT);
        $this->addEntry($route);
        return $route;
    }

    public function patch(string $filter) {
        $route = (new Route($filter))->setMethod(HttpMethodEnum::PATCH);
        $this->addEntry($route);
        return $route;
    }

    public function delete(string $filter) {
        $route = (new Route($filter))->setMethod(HttpMethodEnum::DELETE);
        $this->addEntry($route);
        return $route;
    }

}