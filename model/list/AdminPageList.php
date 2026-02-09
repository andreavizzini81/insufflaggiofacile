<?php

class AdminPageList extends EntityList {

    protected const ENTITY = 'admin_page';

    public function __construct(?array $params, bool $asClassList = false, ?string $class = '') {
        parent::__construct($params, $asClassList, $class);
    }

    protected function _categoryIdParam($value) {
        if ((int)$value > 0) {
            return sprintf('id_admin_page_category = %d', (int)$value);
        }
    }

    protected function _isDefaultParam($value) {
        $value = (int)$value;
        return sprintf('is_default = %d', $value);
    }

    protected function _isPublicParam($value) {
        $value = (int)$value;
        return sprintf('is_public = %d', $value);
    }

}


?>