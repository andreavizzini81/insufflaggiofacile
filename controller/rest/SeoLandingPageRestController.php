<?php

class SeoLandingPageRestController extends RestController {

    public function setData(): Response {
        $data = $this->request->getInputParams();
        $landing = new SeoLandingPage($data['id'] ?? null);
        $landing->import((object)$data);
        $id = $landing->save();
        if ($id === false) {
            return $this->returnErrorMessage('Impossibile salvare la landing SEO');
        }
        return $this->returnResult(['id' => $id]);
    }

    public function delete(): Response {
        $id = $this->request->getQueryParam('id');
        if (is_null($id)) {
            return $this->returnErrorMessage('Riferimento non valido', 400);
        }
        $landing = new SeoLandingPage((int)$id);
        if (!$landing->exists()) {
            return $this->returnErrorMessage('Landing non trovata', 404);
        }
        if (!$landing->delete()) {
            return $this->returnErrorMessage('Impossibile eliminare la landing');
        }
        return $this->returnResult(null);
    }
}
