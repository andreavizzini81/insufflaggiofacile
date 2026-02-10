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
