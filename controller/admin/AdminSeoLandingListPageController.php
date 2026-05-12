<?php

class AdminSeoLandingListPageController extends BackendController {

    protected string $view = 'seo_landing_list';

    public function __invoke(): Response {
        $list = new SeoLandingPageList($this->request->getQueryParams(), true, SeoLandingPage::class);
        $list->setPageLength(25);

        $this->data['list'] = $list->getPage($this->request->getQueryParam('page') ?? 1);
        $this->data['pagination_obj'] = $list->getPagination();
        $this->data['pagination'] = Utils::generatePagination($list->getPagination(), $this->request);
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'create-seo-landing info',
                    'href' => sprintf('%sseo-landing', $this->path)
                ],
                'label' => 'INSERISCI LANDING SEO',
                'icon' => 'plus'
            ])
        ];

        return $this->render();
    }
}
