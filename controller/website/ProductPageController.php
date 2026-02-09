<?php

class ProductPageController extends FrontendController {

    public function __invoke() :Response {
        $selectedProduct = new Product($this->request->getQueryParam('id'));
        $this->data['product'] = $selectedProduct;
        $this->description = $selectedProduct->getMetaDescription();
        return $this->render();
    }

}