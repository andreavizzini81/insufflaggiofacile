<?php

trait EventableEntity {


    public function createEvent(array $eventData, int $userId): CalendarEvent|false {

        $event = (new CalendarEvent())->import((object)$eventData);
        $event->setEntity(self::ENTITY_TABLE)->setEntityId($this->id)->setUserId($userId);

        if ($event->save()) {
            $this->syncGoogleCalendarAction('create', $event);
            return $event;
        }

        return false;
    }

    public function getEvent(int $id): ?CalendarEvent {

        $event = new CalendarEvent($id);
        
        return ($event->exists() && $event->getEntityId() == $this->id && $event->getEntity() == self::ENTITY_TABLE) ? $event : null;
    }

    public function getEvents(): array {

        if (!$this->exists()) {
            return [];
        }

        $list = new CalendarEventList([
            'entity' => self::ENTITY_TABLE,
            'entity_id' => $this->id
        ], true, CalendarEvent::class);

        return $list->setOrderParam('starts_at DESC')->getAll();
    }

    public function updateEvent(int $eventId, array $data): CalendarEvent|false {

        $event = $this->getEvent($eventId);

        if (is_null($event)) {
            return false;
        }
        $event->import((object)$data);

        if (!$event->save()) {
            return false;
        }

        $this->syncGoogleCalendarAction('update', $event);

        return $event;
    }

    public function getEventsCount(): int {
        if (!$this->exists()) {
            return 0;
        }

        $list = new CalendarEventList([
            'entity' => self::ENTITY_TABLE,
            'entity_id' => $this->id
        ]);
        return $list->getRecordsCount();        
    }

    public function hasEvents(): bool {
        return $this->getEventsCount() > 0;
    }

    public function deleteEvent(int $id): bool {

        $event = new CalendarEvent($id);
        if (!$event->exists() || $event->getEntityId() != $this->id || $event->getEntity() != self::ENTITY_TABLE) {
            return false;
        }

        $this->syncGoogleCalendarAction('delete', $event);
        return $event->delete();
    }

    private function syncGoogleCalendarAction(string $action, CalendarEvent $event): void {
        try {
            $service = new GoogleCalendarService();
            match($action) {
                'create' => $service->createEvent($event),
                'update' => $service->updateEvent($event),
                'delete' => $service->deleteEvent($event),
                default => null
            };
        } catch (Throwable $e) {
            error_log(sprintf('Google Calendar sync error (%s): %s', $action, $e->getMessage()));
        }
    }

}
