<?php

class PageNotFoundPageController extends FrontendController {

    public function __invoke() :Response {
        return $this->render();
    }

}
