<?php

class AdministratorsPageController extends BackendController {

    protected string $view = 'administrators';

    public function __invoke() :Response {
        $this->data['admins'] = $this->getAdmins();
        $this->data['actions'] = $this->getActions();
        return $this->render();
    }

    public function getAdmins() {
        $adminList = new AdminList([], true, Admin::class);
        return $adminList->getAll();
    }

    public function getActions() {
        return [
            new TopbarAction([
                'attributes' => [
                    'class' => 'add-admin',
                    'href' => sprintf('%sadministrator', $this->app->path)
                ],
                'label' => 'AGGIUNGI UTENTE',
                'icon' => 'plus'
            ])
        ];   
    }

}

?>