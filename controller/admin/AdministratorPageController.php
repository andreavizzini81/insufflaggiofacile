<?php

class AdministratorPageController extends BackendController {

    protected string $view = 'administrator';

    public function __invoke() :Response {
        $id = ($this->request->hasQueryParam('id')) ? (int)$this->request->getQueryParam('id') : null;
        $this->data['admin'] = new Admin($id);
        return $this->render();
    }

}

?>