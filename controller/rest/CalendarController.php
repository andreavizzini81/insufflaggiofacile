<?php

class CalendarController extends RestController {

    public function getEvents(): Response {

        $params = $this->request->getQueryParams();
        if (isset($params['user_id']) && is_array($params['user_id'])) {
            $params['user_id'] = array_intersect(
                $params['user_id'],
                $this->user->getSiblings(false)
            );
        } else {
            $params['user_id'] = $this->user->getId();
        }

        $list = new CalendarEventList($params, true, FullCalendarEventAdapter::class);
        return $this->returnResult([
            'list' => $list->getAll(),
            'params' => $params
        ]);
    }

    public function getLink(): Response {

        $entity = $this->request->getQueryParam('entity');
        $entityId = $this->request->getQueryParam('entityId');

        $tokenGenerator = new CalendarLinkToken();
        $tokenGenerator
            ->setUserId($this->user->getId())
            ->setEntity($entity)
            ->setEntityId($entityId);

        return $this->returnResult([
            'token' => $tokenGenerator->build()
        ]);
    }

    public function setStatusCalendar(): Response {

        $id = $this->request->getQueryParam('id');
        $statusEvent = $this->request->getQueryParam('statusEvent');

        $event = new CalendarEvent($id);
        $event->setStatus($statusEvent);
        $event->save();

        return $this->returnResult([
            'statusEvent' => $event->getStatus()
        ]);
    }

}