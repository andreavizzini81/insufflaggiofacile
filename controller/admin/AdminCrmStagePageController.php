<?php

class AdminCrmStagePageController extends BackendController {

    protected string $view = 'crm_stage';

    public function __invoke() :Response {
        $id = ($this->request->hasQueryParam('id')) ? (int)$this->request->getQueryParam('id') : null;
        $stage = new CrmStage($id);

        if (!is_null($id) && !$stage->exists()) {
            $this->response->setStatusCode(404);
            $this->view = '404';
            $this->loadPage();
        }

        $this->data['crmStage'] = $stage;
        $this->data['crmStageGroups'] = $this->db->getResults('SELECT id, label AS value FROM crm_stage_group ORDER BY id ASC;') ?? [];
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'save-crm-stage success'
                ],
                'label' => 'SALVA FASE CRM',
                'icon' => 'check'
            ])
        ];

        return $this->render();
    }

}
