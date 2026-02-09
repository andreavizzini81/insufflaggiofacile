<?php

class AdminUserPageController extends BackendController {

    protected string $view = 'user';

    public function __invoke() :Response {
        $id = ($this->request->hasQueryParam('id')) ? (int)$this->request->getQueryParam('id') : null;
        $user = new User($id);
        if (!is_null($id) && !$user->exists()) {
            $this->response->setStatusCode(404);
            $this->view = '404';
            $this->loadPage();
        }
        
        $agencyList = new AgencyList([], true, Agency::class);
        $this->data['agencyList'] = $agencyList->getAll();
        $this->data['user'] = $user;
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'save-user success'
                ],
                'label' => 'SALVA UTENTE',
                'icon' => 'check'
            ])
        ];   
        return $this->render();
    }

}






?>