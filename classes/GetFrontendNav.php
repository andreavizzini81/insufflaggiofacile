<?php

class GetFrontendNav extends BaseComponent {

    public function __construct() {
        parent::__construct();
    }

    public function __invoke() {
        $list = [];
        $productList = new ProductList([], true, Product::class);
        $staticPageList = new StaticPageList([], true, StaticPage::class);
        $list['product'] = $productList->getAll();
        $list['staticPage'] = $staticPageList->getAll();
        return $list;
    }
    
}