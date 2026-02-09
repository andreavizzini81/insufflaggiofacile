<?php

class AdminPasswordRestorePageController extends BackendController {

    protected string $view = 'password_restore';

    public function __invoke() :Response {
        $this->data['step'] = ($this->request->hasQueryParam('token')) ? 2 : 1;
        $this->data['token'] = $this->request->getQueryParam('token');
        return $this->render();
    }

}