<?php

class AdminAgencyListPageController extends BackendController {

    protected string $view = 'agency_list';

    public function __invoke() :Response {
        $agencyList = new AgencyList($this->request->getQueryParams(), true, Agency::class);
        $agencyList->setPageLength(50);
        $this->data['list'] = $agencyList->getPage($this->request->getQueryParam('page') ?? 1);
        $this->data['pagination_obj'] = $agencyList->getPagination();
        $this->data['pagination'] = Utils::generatePagination($agencyList->getPagination(), $this->request);
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'create-agency info',
                    'href' => sprintf('%sagency-manager', $this->path)
                ],
                'label' => 'INSERISCI AGENZIA',
                'icon' => 'plus'
            ])
        ];   
        return $this->render();
    }

}