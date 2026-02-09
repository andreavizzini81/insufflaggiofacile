<?php

class AdminProductPageController extends BackendController {

    protected string $view = 'product';

    public function __invoke() :Response {
        $id = ($this->request->hasQueryParam('id')) ? (int)$this->request->getQueryParam('id') : null;
        $product = new Product($id);
        if (!is_null($id) && !$product->exists()) {
            $this->response->setStatusCode(404);
            $this->view = '404';
            $this->loadPage();
        }
        $this->data['product'] = $product;
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'save-product success'
                ],
                'label' => 'SALVA PRODOTTO',
                'icon' => 'check'
            ])
        ];   
        return $this->render();
    }

}