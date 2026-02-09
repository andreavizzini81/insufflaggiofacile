<?php

class FaqController extends RestController {

    public function getData(): Response {

        $faq = new Faq($this->request->getQueryParam('id'));
        if (!$faq->exists()) {
            return $this->returnErrorMessage('Contatto non trovato', 401);
        }

        return $this->returnResult($faq);
    }
    

    public function setData(): Response {

        $faqData = $this->request->getInputParams();
        
        $faq = new Faq($faqData['id'] ?? null);
        $faq->import((object)$faqData);
        $faqId = $faq->save();
        if ($faqId === false) {
            return $this->returnErrorMessage('Impossibile salvare il contatto');
        }
        return $this->returnResult([
            'id' => $faqId,
            'Faq' => $faq
        ]);

    }

    public function delete(): Response {
        $id = $this->request->getQueryParam('id');
        if (is_null($id)) {
            return $this->returnErrorMessage('Riferimento anagrafica non valido', 400);
        }
        $faq = new Faq($id);
        if (!$faq->exists()) {
            return $this->returnErrorMessage('Anagrafica non trovata', 404);
        }
        $result = $faq->delete();
        if ($result) {
            return $this->returnResult(null);
        } else {
            return $this->returnErrorMessage('Impossibile eliminare l\'anagrafica.');
        }
    }

}