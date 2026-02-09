<?php

class RouteNotFoundController extends BackendController {

    protected string $view = '404';

    public function __invoke() :Response {
        return $this->render();
    }

}

?>