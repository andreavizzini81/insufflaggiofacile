<?php

class PageNotFoundPageController extends FrontendController {

    public function loadPage() {
        $this->page = false;
    }

    public function __invoke() :Response {
        return $this->response
            ->setStatusCode(404)
            ->setBody($this->app->renderStaticFile('NotFound'));
    }

}
