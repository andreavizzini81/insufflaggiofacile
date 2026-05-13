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
            $pages = (array)$this->db->getResults(sprintf("SELECT * FROM seo_landing_page WHERE category_id = %d AND is_visible = 1 AND show_in_services_menu = 1 ORDER BY sort ASC, id ASC", (int)$cat['id']));
            if (count($pages) === 0) { continue; }
            $services[] = ['category' => $cat, 'pages' => $pages];
        }
        $list['seoServicesMenu'] = $services;
        return $list;
    }
}
