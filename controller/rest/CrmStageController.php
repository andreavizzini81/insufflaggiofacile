<?php

class CrmStageController extends RestController {

    public function setOrder(): Response {

        $orderInfo = $this->request->getInputParam('ids');
        if (!is_array($orderInfo) || count($orderInfo) === 0) {
            return $this->returnErrorMessage('Nessuna informazione sul nuovo ordine da salvare.', 400);
        }

        foreach ($orderInfo as $position => $id) {
            $stage = new CrmStage((int)$id);
            if (!$stage->exists()) {
                return $this->returnErrorMessage(sprintf('Fase CRM con ID %d non trovata', (int)$id), 404);
            }
            $stage->setPosition((int)$position);
            if ($stage->save() === false) {
                return $this->returnErrorMessage(sprintf('Impossibile aggiornare la posizione della fase CRM %d', (int)$id));
            }
        }

        return $this->returnResult(null);
    }

    public function getData(): Response {

        $stage = new CrmStage($this->request->getQueryParam('id'));
        if (!$stage->exists()) {
            return $this->returnErrorMessage('Fase CRM non trovata', 404);
        }

        return $this->returnResult($stage);
    }

    public function setData(): Response {

        $stageData = $this->request->getInputParams();
        $stageData['entity'] = 'deal';

        $groupId = $stageData['group_id'] ?? null;
        if ($groupId === 'NULL' || $groupId === '' || $groupId === null || (is_numeric($groupId) && (int)$groupId <= 0)) {
            $stageData['group_id'] = null;
        }

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
