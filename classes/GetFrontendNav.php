<?php
class GetFrontendNav extends BaseComponent {
    public function __construct() { parent::__construct(); }
    public function __invoke() {
        $list = [];
        $list['product'] = (new ProductList([], true, Product::class))->getAll();
        $list['staticPage'] = (new StaticPageList([], true, StaticPage::class))->getAll();
        $categories = SeoLandingCategory::findVisibleForServicesMenu();
        $services = [];
        foreach ($categories as $category) {
            $cat = (array)$category;
            $pagesList = new SeoLandingPageList([
                'categoryId' => (int)$cat['id'],
                'isVisible' => 1,
                'showInServicesMenu' => 1
            ], true, SeoLandingPage::class);
            $firstPage = $pagesList->getFirst();
            if (!$firstPage) { continue; }
            $pages = $pagesList->getAll();
            if (count($pages) === 0) { continue; }
            $services[] = ['category' => $cat, 'categoryPage' => $firstPage, 'pages' => $pages];
        }
        $list['seoServicesMenu'] = $services;
        return $list;
    }
}
