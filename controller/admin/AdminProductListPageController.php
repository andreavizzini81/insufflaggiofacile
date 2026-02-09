<?php

class AdminProductListPageController extends BackendController {

    protected string $view = 'product_list';

    public function __invoke() :Response {

        $contactList = new ProductList($this->request->getQueryParams(), true, Product::class);
        $contactList->setPageLength(25);
        $this->data['filterParams'] = $this->request->getQueryParams('params');
        $this->data['list'] = $contactList->getPage($this->request->getQueryParam('page') ?? 1);
        $this->data['pagination_obj'] = $contactList->getPagination();
        $this->data['pagination'] = Utils::generatePagination($contactList->getPagination(), $this->request);
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'create-product info',
                    'href' => sprintf('%sproduct', $this->path)
                ],
                'label' => 'INSERISCI PRODOTTO',
                'icon' => 'plus'
            ])
        ]; 
        return $this->render();
    }

}