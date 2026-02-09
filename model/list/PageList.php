<?php

class PageList extends EntityList {

    protected const ENTITY = 'page';

    protected function _inSitemapParam($value) {

        $flag = (int)$value > 0 ? 1 : 0;
        return sprintf('in_sitemap = %d', $flag);
    }

}