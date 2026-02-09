<?php

class AdminLoginPageController extends BackendController {

    protected string $view = 'login';

    public function __invoke() :Response {
        return $this->render();
    }

}