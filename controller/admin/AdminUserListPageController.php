<?php

class AdminUserListPageController extends BackendController {

    protected string $view = 'user_list';

    public function __invoke() :Response {

        $userList = new UserList($this->request->getQueryParams(), true, User::class);
        $this->data['list'] = $userList->getPage($this->request->getQueryParam('page') ?? 1);
        $this->data['pagination_obj'] = $userList->getPagination();
        $this->data['pagination'] = Utils::generatePagination($userList->getPagination(), $this->request);
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'create-user info',
                    'href' => sprintf('%suser-manager', $this->path)
                ],
                'label' => 'INSERISCI UTENTE',
                'icon' => 'plus'
            ])
        ];   
        return $this->render();
    }

}