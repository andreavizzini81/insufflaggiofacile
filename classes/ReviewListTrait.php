<?php

trait ReviewListTrait {

    private function getReviews() {
        $reviewsList = new ReviewList([], true, Review::class);
        $reviewsList->setPageLength(10);
        $reviewsList->setOrderParam('RAND()');
        return $reviewsList->getPage(1);
    }

}