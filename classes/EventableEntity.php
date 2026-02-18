<?php

trait EventableEntity {


    public function createEvent(array $eventData, int $userId): CalendarEvent|false {

        if (!isset($eventData['note']) && isset($eventData['comment'])) {
            $eventData['note'] = $eventData['comment'];
        }

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
        if (!isset($data['note']) && isset($data['comment'])) {
            $data['note'] = $data['comment'];
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

            $this->logGoogleSync('success', $action, $event);
        } catch (Throwable $e) {
            $this->logGoogleSync('error', $action, $event, [
                'message' => $e->getMessage()
            ]);

            $this->queueGoogleCalendarSyncRetry($action, $event);
        }
    }

    private function queueGoogleCalendarSyncRetry(string $action, CalendarEvent $event): void {
        try {
            (new BackgroundTask())
                ->setClass('BackgroundGoogleCalendarSync')
                ->setMethod('process')
                ->setMetadata([
                    'action' => $action,
                    'eventId' => $event->getId(),
                    'userId' => $event->getUserId(),
                    'googleCalendarEventId' => $event->getGoogleCalendarEventId(),
                    'retryCount' => 0
                ])
                ->save();

            $this->logGoogleSync('retry_queued', $action, $event);
        } catch (Throwable $e) {
            $this->logGoogleSync('retry_queue_error', $action, $event, [
                'message' => $e->getMessage()
            ]);
        }
    }

    private function logGoogleSync(string $status, string $action, CalendarEvent $event, array $extra = []): void {
        error_log(json_encode(array_merge([
            'context' => 'google_calendar_sync',
            'status' => $status,
            'action' => $action,
            'event_id' => $event->getId(),
            'google_calendar_event_id' => $event->getGoogleCalendarEventId(),
            'user_id' => $event->getUserId()
        ], $extra), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }

}
