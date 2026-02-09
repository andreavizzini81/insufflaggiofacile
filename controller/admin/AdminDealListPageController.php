<?php

class AdminDealListPageController extends BackendController {

    protected string $view = 'deals';

    public function __invoke(): Response {

        $this->data['filterParams'] = $this->request->getQueryParams();

        if (!isset($this->data['filterParams']['crm_status'])) {
            $this->data['filterParams']['crm_status'] = 'open';
        }

        $this->data['crm_status_list'] = [
            'open' => 'Aperta',
            'closed' => 'Chiusa',
            'won' => 'Vinta',
            'lost' => 'Persa'
        ];

        $this->data['authorizedAgencies'] = array_map(function($agencyId) {
            return new Agency($agencyId);
        }, $this->user->getAuthorizedAgenciesId());

        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'create-deal accent'
                ],
                'label' => 'NUOVA RICHIESTA',
                'icon' => null
            ])
        ];

        return $this->render();
    }

}