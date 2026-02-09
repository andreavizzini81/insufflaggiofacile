<?php

class AdminFaqPageController extends BackendController {

    protected string $view = 'faq';

    public function __invoke() :Response {
        $id = ($this->request->hasQueryParam('id')) ? (int)$this->request->getQueryParam('id') : null;
        $faq = new Faq($id);
        if (!is_null($id) && !$faq->exists()) {
            $this->response->setStatusCode(404);
            $this->view = '404';
            $this->loadPage();
        }
        $this->data['faq'] = $faq;
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'save-faq success'
                ],
                'label' => 'SALVA FAQ',
                'icon' => 'check'
            ])
        ];   
        return $this->render();
    }

}