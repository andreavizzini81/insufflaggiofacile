<?php

class InsufflaggioPageController extends FrontendController {

    public function __invoke() :Response {
        $selected = new StaticPage($this->request->getQueryParam('id'));
        $this->data['staticPage'] = $selected;
        $this->description = $selected->getMetaDescription();
        return $this->render();
    }

}