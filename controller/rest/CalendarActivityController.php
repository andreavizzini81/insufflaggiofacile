<?php

class CalendarActivityController extends RestController {

    public function setOrder(): Response {

        $orderInfo = $this->request->getInputParam('ids');
        if (!is_array($orderInfo) || count($orderInfo) === 0) {
            return $this->returnErrorMessage('Nessuna informazione sul nuovo ordine da salvare.', 400);
        }

        foreach ($orderInfo as $sort => $id) {
            $activity = new CalendarActivity((int)$id);
            if (!$activity->exists()) {
                return $this->returnErrorMessage(sprintf('Attività calendario con ID %d non trovata', (int)$id), 404);
            }

            $activity->setSort((int)$sort);
            if ($activity->save() === false) {
                return $this->returnErrorMessage(sprintf("Impossibile aggiornare l'ordinamento dell'attività %d", (int)$id));
            }
        }

        return $this->returnResult(null);
    }

    public function getList(): Response {

        $list = new CalendarActivityList($this->request->getQueryParams(), true, CalendarActivity::class);

        return $this->returnResult([
            'list' => $list->getAll()
        ]);
    }

    public function getData(): Response {

        $activity = new CalendarActivity((int)$this->request->getQueryParam('id'));
        if (!$activity->exists()) {
            return $this->returnErrorMessage('Attività calendario non trovata', 404);
        }

        return $this->returnResult([
            'activity' => $activity
        ]);
    }

    public function setData(): Response {

        $activityData = $this->request->getInputParams();
        $activityData['activity'] = trim((string)($activityData['activity'] ?? ''));

        if ($activityData['activity'] === '') {
            return $this->returnErrorMessage('Il campo attività è obbligatorio', 400);
        }

        $activity = new CalendarActivity(isset($activityData['id']) ? (int)$activityData['id'] : null);
        $activity->import((object)$activityData);

        $activityId = $activity->save();
        if ($activityId === false) {
            return $this->returnErrorMessage('Impossibile salvare l\'attività calendario');
        }

        return $this->returnResult([
            'id' => $activityId,
            'activity' => $activity
        ]);
    }

    public function delete(): Response {

        $id = $this->request->getQueryParam('id');
        if (is_null($id)) {
            return $this->returnErrorMessage('Riferimento attività calendario non valido', 400);
        }

        $activity = new CalendarActivity((int)$id);
        if (!$activity->exists()) {
            return $this->returnErrorMessage('Attività calendario non trovata', 404);
        }

        if (!$activity->delete()) {
            return $this->returnErrorMessage('Impossibile eliminare l\'attività calendario');
        }

        return $this->returnResult(null);
    }

}
