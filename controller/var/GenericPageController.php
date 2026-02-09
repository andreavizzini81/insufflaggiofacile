<?php

class GenericPageController extends FrontendController {

    public function __invoke() :Response {
        return $this->render();
    }

}
