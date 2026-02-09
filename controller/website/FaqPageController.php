<?php

class FaqPageController extends FrontendController {

    public function __invoke() :Response {
        $faqList = new FaqList([], true, Faq::class);
		$list = $faqList->getAll();
		$this->data['list'] = $list;
        return $this->render();
    }

}