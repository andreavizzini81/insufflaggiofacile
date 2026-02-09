<?php

class StaticPageList extends EntityList {

    protected const ENTITY = 'static_page';
    protected $orderParam = 'id ASC';
 
    public function __construct(?array $params, bool $asClassList = false, ?string $class = '') {
        parent::__construct($params, $asClassList, $class);
    }

}