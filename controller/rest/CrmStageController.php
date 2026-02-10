<?php

class CrmStageController extends RestController {

    public function getData(): Response {

        $stage = new CrmStage($this->request->getQueryParam('id'));
        if (!$stage->exists()) {
            return $this->returnErrorMessage('Fase CRM non trovata', 404);
        }

        return $this->returnResult($stage);
    }

    public function setData(): Response {

        $stageData = $this->request->getInputParams();

        $stage = new CrmStage($stageData['id'] ?? null);
        $stage->import((object)$stageData);
        $stageId = $stage->save();

        if ($stageId === false) {
            return $this->returnErrorMessage('Impossibile salvare la fase CRM');
        }

        return $this->returnResult([
            'id' => $stageId,
            'crmStage' => $stage
        ]);
    }

    public function delete(): Response {
        $id = $this->request->getQueryParam('id');
        if (is_null($id)) {
            return $this->returnErrorMessage('Riferimento fase CRM non valido', 400);
        }

        $stage = new CrmStage($id);
        if (!$stage->exists()) {
            return $this->returnErrorMessage('Fase CRM non trovata', 404);
        }

        $result = $stage->delete();
        if ($result) {
            return $this->returnResult(null);
        }

        return $this->returnErrorMessage('Impossibile eliminare la fase CRM.');
    }

}
