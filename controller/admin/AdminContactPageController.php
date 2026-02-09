<?php

class AdminContactPageController extends BackendController {

    protected string $view = 'contact';

    public function __invoke() :Response {
        $id = ($this->request->hasQueryParam('id')) ? (int)$this->request->getQueryParam('id') : null;
        $contact = new Contact($id);
        if (!is_null($id) && !$contact->exists()) {
            $this->response->setStatusCode(404);
            $this->view = '404';
            $this->loadPage();
        }
        $this->data['contact'] = $contact;
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'save-contact success'
                ],
                'label' => 'SALVA CONTATTO',
                'icon' => 'check'
            ])
        ];   
        return $this->render();
    }

}