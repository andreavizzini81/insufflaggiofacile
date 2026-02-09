<?php

class AdminContactListPageController extends BackendController {

    protected string $view = 'contact_list';

    public function __invoke() :Response {

        $contactList = new ContactList($this->request->getQueryParams(), true, Contact::class);
        $contactList->setPageLength(25);
        $this->data['filterParams'] = $this->request->getQueryParams('params');
        $this->data['state'] = $this->db->getResults('SELECT DISTINCT nome_provincia FROM cappario WHERE regione = \'SICILIA\'');
        $this->data['list'] = $contactList->getPage($this->request->getQueryParam('page') ?? 1);
        $this->data['pagination_obj'] = $contactList->getPagination();
        $this->data['pagination'] = Utils::generatePagination($contactList->getPagination(), $this->request);
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'create-contact info',
                    'href' => sprintf('%scontact', $this->path)
                ],
                'label' => 'INSERISCI ANAGRAFICA',
                'icon' => 'plus'
            ])
        ]; 
        return $this->render();
    }

}