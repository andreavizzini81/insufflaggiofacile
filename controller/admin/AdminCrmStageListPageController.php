<?php

class AdminCrmStageListPageController extends BackendController {

    protected string $view = 'crm_stage_list';

    public function __invoke() :Response {

        $stageList = new CrmStageList($this->request->getQueryParams(), true, CrmStage::class);
        $stageList->setPageLength(25);
        $this->data['filterParams'] = $this->request->getQueryParams('params');
        $this->data['list'] = $stageList->getPage($this->request->getQueryParam('page') ?? 1);
        $this->data['pagination_obj'] = $stageList->getPagination();
        $this->data['pagination'] = Utils::generatePagination($stageList->getPagination(), $this->request);
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'create-crm-stage info',
                    'href' => sprintf('%scrm-stage', $this->path)
                ],
                'label' => 'INSERISCI FASE CRM',
                'icon' => 'plus'
            ])
        ];

        return $this->render();
    }

}
