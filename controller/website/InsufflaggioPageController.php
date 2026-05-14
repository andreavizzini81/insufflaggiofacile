<?php

class InsufflaggioPageController extends FrontendController {

    public function __invoke() :Response {
        $selected = new StaticPage($this->request->getQueryParam('id'));
        $this->data['staticPage'] = $selected;
        $this->description = $selected->getMetaDescription();
        $this->data['sections'] = $selected->getSections();
        $this->data['faqItems'] = $selected->getFaqItems();
        $this->data['structuredDataJsonLd'] = $selected->getStructuredDataJson();
        return $this->render();
    }

}