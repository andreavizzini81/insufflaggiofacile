<?php

class ContactController extends RestController {

    public function getData(): Response {

        $contact = new Contact($this->request->getQueryParam('id'));
        if (!$contact->exists()) {
            return $this->returnErrorMessage('Contatto non trovato', 401);
        }

        return $this->returnResult($contact);
    }

    public function setData(): Response {

        $contactData = $this->request->getInputParams();

        if (!filter_var($contactData['email'], FILTER_VALIDATE_EMAIL)) {
            return $this->returnErrorMessage('Indirizzo email formalmente non valido');
        }

        $emailAvailability = $this->checkEmailAvailability(
            $contactData['id'] ?? null,
            $contactData['email']
        );

        if ($emailAvailability !== true) {
            $this->setResult([
                'contactId' => $emailAvailability
            ]);
            return $this->returnErrorMessage('L\'indirizzo email specificato risulta gi&agrave; registrato.');
        }
        
        $contact = new Contact($contactData['id'] ?? null);
        $contact->import((object)$contactData);
        $contactId = $contact->save();
        if ($contactId === false) {
            return $this->returnErrorMessage('Impossibile salvare il contatto');
        }
        return $this->returnResult([
            'id' => $contactId,
            'contact' => $contact
        ]);
    }

    public function delete(): Response {
        $id = $this->request->getQueryParam('id');
        if (is_null($id)) {
            return $this->returnErrorMessage('Riferimento anagrafica non valido', 400);
        }
        $contact = new Contact($id);
        if (!$contact->exists()) {
            return $this->returnErrorMessage('Anagrafica non trovata', 404);
        }
        $result = $contact->delete();
        if ($result) {
            return $this->returnResult(null);
        } else {
            return $this->returnErrorMessage('Impossibile eliminare l\'anagrafica.');
        }
    }

    public function search(): Response {
        $term = $this->request->getInputParam('term');
        
        $results = [];

        if(is_null($term)) {
            return $this->returnErrorMessage('Invalid search term');
        }
        if (strlen(trim($term)) > 3) {
            $contactList = new ContactList([
                'key' => $term
            ], true, Contact::class);

            $contactList->setPageLength(18);
            $results = $contactList->getPage($this->request->getInputParam('page') ?? 1);
        }

        return $this->returnResult([
            'list' => $results,
            'pagination' => $contactList->getPagination()
        ]);
    }

    public function checkUniqueness(): Response {

        $id = $this->request->getInputParam('id');
        $email = $this->request->getInputParam('email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->returnErrorMessage('Indirizzo email formalmente non valido');
        }

        $result = $this->checkEmailAvailability($id, $email);
        if ($result === true) {
            return $this->returnResult(null);
        } else {
            $this->setResult([
                'contactId' => $result
            ]);
            return $this->returnErrorMessage('L\'indirizzo email specificato risulta gi&agrave; registrato.');
        }
    }

    private function checkEmailAvailability(?int $id, string $email): int|bool {

        $contactId = (new ContactList(['email' => $email]))->getFirst();
        if (is_null($contactId) || $contactId == $id) {
            return true;
        }
        return $contactId;
    }

    private function validateKeyParams($id, $email): bool {
        $userId = $this->db->selectOne(
            'contact', 
            ['id'], 
            sprintf('email = \'%s\'', $this->db->escape(strtolower(trim($email))))
        );
        return (is_null($userId) || $userId == $id);
    }

    public function getCity(): Response {
        $state = $this->request->getInputParam('state');
        /*
        if(!isset($state)){
            return true;
        } 
        */
        $response = $this->db->getCol(sprintf('SELECT DISTINCT localita FROM cappario WHERE nome_provincia LIKE \'%s\'', $state));
        return $this->returnResult($response);
        
    }

}