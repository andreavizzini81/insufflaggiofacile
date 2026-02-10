<?php

class CrmStageController extends RestController {

    public function getList(): Response {
        $entity = trim((string)($this->request->getQueryParam('entity') ?? 'deal'));
        if ($entity === '') {
            return $this->returnErrorMessage('Entità non valida', 400);
        }

        $stageList = (new CrmStageList(['entity' => $entity], false, CrmStage::class))->getAll();
        return $this->returnResult([
            'list' => $stageList
        ]);
    }

    public function setData(): Response {
        $data = (array)($this->request->getInputParam('params') ?? []);
        if (count($data) === 0) {
            return $this->returnErrorMessage('Informazioni stage mancanti', 400);
        }

        $data['entity'] = 'deal';

        if (isset($data['id']) && (int)$data['id'] <= 0) {
            unset($data['id']);
        }

        if (empty(trim((string)($data['label'] ?? '')))) {
            return $this->returnErrorMessage('Il nome dello stage è obbligatorio', 400);
        }

        $data['position'] = max(0, (int)($data['position'] ?? 0));
        $data['is_won'] = (int)($data['is_won'] ?? 0) === 1 ? 1 : 0;
        $data['is_lost'] = (int)($data['is_lost'] ?? 0) === 1 ? 1 : 0;
        $data['is_default'] = (int)($data['is_default'] ?? 0) === 1 ? 1 : 0;

        if ((int)$data['is_won'] === 1 && (int)$data['is_lost'] === 1) {
            return $this->returnErrorMessage('Uno stage non può essere contemporaneamente vinto e perso', 400);
        }

        if ((int)$data['is_default'] === 1) {
            $this->db->query("UPDATE crm_stage SET is_default = 0 WHERE entity = 'deal'");
        }

        $stage = new CrmStage((int)($data['id'] ?? 0));
        if (isset($data['id']) && !$stage->exists()) {
            return $this->returnErrorMessage('Stage non trovato', 404);
        }

        $stage->import((object)$data);
        $result = $stage->save();
        if ($result === false) {
            return $this->returnErrorMessage('Salvataggio non riuscito');
        }

        return $this->returnResult([
            'stage' => $stage
        ]);
    }

    public function setOrder(): Response {
        $ids = $this->request->getInputParam('ids');
        if (!is_array($ids) || count($ids) === 0) {
            return $this->returnErrorMessage('Formato ordine non valido', 400);
        }

        foreach ($ids as $position => $id) {
            $stage = new CrmStage((int)$id);
            if (!$stage->exists() || $stage->getEntity() !== 'deal') {
                continue;
            }
            $stage->setPosition((int)$position)->save();
        }

        return $this->returnResult(null);
    }

    public function delete(?int $id = null): Response {
        $id ??= (int)$this->request->getQueryParam('id');
        if (!$id) {
            return $this->returnErrorMessage('Riferimento stage non valido', 400);
        }

        $stage = new CrmStage($id);
        if (!$stage->exists() || $stage->getEntity() !== 'deal') {
            return $this->returnErrorMessage('Stage non trovato', 404);
        }

        $inUseCount = (int)$this->db->getVar(sprintf('SELECT COUNT(*) FROM deal WHERE stage_id = %d', $stage->getId()));
        if ($inUseCount > 0) {
            return $this->returnErrorMessage('Impossibile eliminare: stage assegnato a uno o più lead', 400);
        }

        $result = $stage->delete();
        return $this->returnResult(null, $result);
    }
}
