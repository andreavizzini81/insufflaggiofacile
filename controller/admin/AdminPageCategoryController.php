<?php

class AdminPageCategoryController extends RestController {

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
    }

    public function setData() {
        $adminPageCategory = new AdminPageCategory();
        $data = $this->request->getInputParam('params');
        if ($data == null) {
            $this->setStatusCode(400);
            $this->setErrorMessage('Informazioni categoria mancanti');
            return $this->getResponse();
        }
        if (isset($data['id']) && (int)$data['id'] <= 0) {
            unset($data['id']);
        }
        $adminPageCategory->import((object)$data);
        if ($adminPageCategory->save()) {
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
            $adminPageCategory = new AdminPageCategory((int)$id);
            $adminPageCategory->setSort((int)$sort);
            $adminPageCategory->save();
        }
        $this->setStatus(true);
        return $this->getResponse();
    }

    public function delete() {
        $id = $this->request->getQueryParam('id');
        if (is_null($id) || $id <= 0) {
            return $this->returnErrorMessage('Riferimento risorsa non valido', 400);
        }
        $category = new AdminPageCategory($id);
        if (!$category->exists()) {
            return $this->returnErrorMessage('Risorsa non trovata', 404);
        }
        foreach($category->getPages() as $page) {
            $page->delete();
        }
        return $this->returnResult(null, $category->delete());
    }
}

?>