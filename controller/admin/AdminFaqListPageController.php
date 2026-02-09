<?php

class AdminFaqListPageController extends BackendController {

    protected string $view = 'faq_list';

    public function __invoke() :Response {

        $contactList = new FaqList($this->request->getQueryParams(), true, Faq::class);
        $contactList->setPageLength(25);
        $this->data['filterParams'] = $this->request->getQueryParams('params');
        $this->data['list'] = $contactList->getPage($this->request->getQueryParam('page') ?? 1);
        $this->data['pagination_obj'] = $contactList->getPagination();
        $this->data['pagination'] = Utils::generatePagination($contactList->getPagination(), $this->request);
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'create-faq info',
                    'href' => sprintf('%sfaq', $this->path)
                ],
                'label' => 'INSERISCI FAQ',
                'icon' => 'plus'
            ])
        ]; 
        return $this->render();
    }

}