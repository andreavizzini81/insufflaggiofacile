<?php

class ProductList extends EntityList {

    protected const ENTITY = 'product';
    protected $orderParam = 'id ASC';
 
    public function __construct(?array $params, bool $asClassList = false, ?string $class = '') {
        parent::__construct($params, $asClassList, $class);
    }

}