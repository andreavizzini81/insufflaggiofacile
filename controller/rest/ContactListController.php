<?php

class ContactListController extends RestController {

    public function getList() :Response {
        $filterParams = $this->request->getQueryParams();
        $contactList = new ContactList($filterParams, true, Contact::class); 

        return $this->returnResult([
            'list' => $contactList->getAll()
        ]);

    }

}