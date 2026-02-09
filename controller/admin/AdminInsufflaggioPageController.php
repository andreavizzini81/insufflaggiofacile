<?php

class AdmininsufflaggioPageController extends BackendController {

    protected string $view = 'insufflaggio';

    public function __invoke() :Response {
        $id = ($this->request->hasQueryParam('id')) ? (int)$this->request->getQueryParam('id') : null;
        $insufflaggio = new StaticPage($id);
        if (!is_null($id) && !$insufflaggio->exists()) {
            $this->response->setStatusCode(404);
            $this->view = '404';
            $this->loadPage();
        }
        $this->data['insufflaggio'] = $insufflaggio;
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'save-insufflaggio success'
                ],
                'label' => 'SALVA PRODOTTO',
                'icon' => 'check'
            ])
        ];   
        return $this->render();
    }

}