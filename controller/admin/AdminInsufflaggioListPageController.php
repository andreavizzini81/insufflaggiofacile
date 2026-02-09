<?php

class AdminInsufflaggioListPageController extends BackendController {

    protected string $view = 'insufflaggio_list';

    public function __invoke() :Response {

        $insufflaggiotList = new StaticPageList($this->request->getQueryParams(), true, StaticPage::class);
        $insufflaggiotList->setPageLength(25);
        $this->data['filterParams'] = $this->request->getQueryParams('params');
        $this->data['list'] = $insufflaggiotList->getPage($this->request->getQueryParam('page') ?? 1);
        $this->data['pagination_obj'] = $insufflaggiotList->getPagination();
        $this->data['pagination'] = Utils::generatePagination($insufflaggiotList->getPagination(), $this->request);
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'create-insufflaggio info',
                    'href' => sprintf('%sinsufflaggio', $this->path)
                ],
                'label' => 'INSERISCI PRODOTTO',
                'icon' => 'plus'
            ])
        ]; 
        return $this->render();
    }

}