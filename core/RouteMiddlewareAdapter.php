<?php

trait RouteMiddlewareAdapter {

    private array $middleware = [];

    public function enqueueMiddleware(string $middleware) {
        $this->middleware[] = $middleware;
        return $this;
    }

    public function getMiddleware() :array {
        return $this->middleware;
    }

    public function withMiddleware(string|array $middleware) {
        if (gettype($middleware) == 'string') {
            $this->enqueueMiddleware($middleware);
        } else {
            foreach($middleware as $item) {
                $this->enqueueMiddleware($item);
            }
        }
        return $this;
    }

    public function hasMiddleware() :bool {
        return count($this->middleware) > 0;
    }

}

?>