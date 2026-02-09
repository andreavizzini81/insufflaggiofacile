<?php

class InsufflaggioController extends RestController {

    private StaticPage $insufflaggio;

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
        
        $insufflaggioId = $this->request->getQueryParam('id');
        $this->insufflaggio = new StaticPage($insufflaggioId);

        if (!is_null($insufflaggioId) && !$this->insufflaggio->exists()) {
            $this->returnErrorMessage('Prodotto non trovato');
        }

    }

    public function getData(): Response {

        $insufflaggio = new StaticPage($this->request->getQueryParam('id'));
        if (!$insufflaggio->exists()) {
            return $this->returnErrorMessage('Contatto non trovato', 401);
        }

        return $this->returnResult($insufflaggio);
    }
    

    public function setData(): Response {

        $insufflaggioData = $this->request->getInputParams();
        
        $insufflaggio = new StaticPage($insufflaggioData['id'] ?? null);
        $insufflaggio->import((object)$insufflaggioData);
        $insufflaggioId = $insufflaggio->save();
        if ($insufflaggioId === false) {
            return $this->returnErrorMessage('Impossibile salvare il contatto');
        }
        return $this->returnResult([
            'id' => $insufflaggioId,
            'Insufflaggio' => $this->request->getInputParam('file')
        ]);

    }

    public function delete(): Response {
        $id = $this->request->getQueryParam('id');
        if (is_null($id)) {
            return $this->returnErrorMessage('Riferimento anagrafica non valido', 400);
        }
        $insufflaggio = new StaticPage($id);
        if (!$insufflaggio->exists()) {
            return $this->returnErrorMessage('Anagrafica non trovata', 404);
        }
        $result = $insufflaggio->delete();
        if ($result) {
            return $this->returnResult(null);
        } else {
            return $this->returnErrorMessage('Impossibile eliminare l\'anagrafica.');
        }
    }


}