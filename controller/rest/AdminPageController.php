<?php

class AdminPageController extends RestController {

    private AdminPage $page;

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
        $this->page = new AdminPage();
    }

    public function setData() {
        $data = $this->request->getInputParam('params');
        if ($data == null) {
            $this->setStatusCode(400);
            $this->setErrorMessage('Informazioni pagina mancanti');
            return $this->getResponse();
        }
        if (isset($data['id']) && (int)$data['id'] <= 0) {
            unset($data['id']);
        }
        $this->page->import((object)$data);
        $idResult = $this->page->save();
        if ($idResult !== false) {
            $this->setResult($this->page);
            $this->setStatus(true);
        } else {
            $this->setErrorMessage('Errore generico');
        }
        return $this->getResponse();
    }

    public function setOrder() {
        $orderInfo = $this->request->getInputParam('ids');
        if (is_null($orderInfo) || !is_array($orderInfo)) {
            $this->setErrorMessage('Formato dei dati non valido');
            return $this->getResponse();
        }
        if (count($orderInfo) == 0) {
            $this->setErrorMessage('Nessuna informazione sul nuovo ordine da salvare.');
            return $this->getResponse();
        }
        foreach($orderInfo as $sort => $id) {
            $adminPage = new AdminPage((int)$id);
            $adminPage->setSort((int)$sort);
            $adminPage->save();
        }
        $this->setStatus(true);
        return $this->getResponse();
    }

    public function delete() {
        $id = (int)$this->request->getQueryParam('id');
        if ($id) {
            $this->page->setId($id);
            $this->setStatus($this->page->delete());            
        } else {
            $this->setErrorMessage('Riferimento pagina non valido');
        }
        return $this->getResponse();        
    }

}

?>