<?php
class SeoLandingPageList extends EntityList {
    protected const ENTITY = 'seo_landing_page';
    protected $orderParam = 'sort ASC, id ASC';

    public function __construct(?array $params, bool $asClassList = false, ?string $class = '') {
        parent::__construct($params, $asClassList, $class);
    }

    protected function _categoryIdParam($value) {
        if ((int)$value > 0) {
            return sprintf('category_id = %d', (int)$value);
        }
    }

    protected function _isVisibleParam($value) {
        return sprintf('is_visible = %d', (int)$value);
    }

    protected function _showInServicesMenuParam($value) {
        return sprintf('show_in_services_menu = %d', (int)$value);
    }

    protected function _inSitemapParam($value) {
        return sprintf('in_sitemap = %d', (int)$value);
    }
}
