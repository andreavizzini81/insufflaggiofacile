<?php

class ProductPageController extends FrontendController {

    public function __invoke() :Response {
        $selectedProduct = new Product($this->request->getQueryParam('id'));
        $this->data['product'] = $selectedProduct;
        $this->description = $selectedProduct->getMetaDescription();
        $this->data['sections'] = $selectedProduct->getSections();
        $this->data['faqItems'] = $selectedProduct->getFaqItems();
        $this->data['structuredDataJsonLd'] = $selectedProduct->getStructuredDataJson();
        return $this->render();
    }

}