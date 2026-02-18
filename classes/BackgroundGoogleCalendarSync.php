<?php

class BackgroundGoogleCalendarSync extends BaseComponent {

    private const MAX_RETRIES = 3;

    public function process(array $metadata): bool {
        $action = (string)($metadata['action'] ?? '');
        $eventId = isset($metadata['eventId']) ? (int)$metadata['eventId'] : null;
        $userId = isset($metadata['userId']) ? (int)$metadata['userId'] : null;
        $googleCalendarEventId = $metadata['googleCalendarEventId'] ?? null;

        if (!in_array($action, ['create', 'update', 'delete'], true) || is_null($userId)) {
            $this->log('invalid_task_payload', $action, $eventId, $googleCalendarEventId, $userId, [
                'metadata' => $metadata
            ]);
            return false;
        }

        try {
            $service = new GoogleCalendarService();
            $event = !is_null($eventId) ? new CalendarEvent($eventId) : null;

            if ($action === 'delete') {
                if ($event instanceof CalendarEvent && $event->exists() && $event->getGoogleCalendarEventId()) {
                    $service->deleteEvent($event);
                } elseif (!empty($googleCalendarEventId)) {
                    $service->deleteEventByGoogleId($userId, (string)$googleCalendarEventId);
                }
            } elseif ($event instanceof CalendarEvent && $event->exists()) {
                if ($action === 'create') {
                    $service->createEvent($event);
                }

                if ($action === 'update') {
                    $service->updateEvent($event);
                }
            } else {
                throw new RuntimeException('Evento locale non disponibile per sincronizzazione');
            }

            $this->log('retry_success', $action, $eventId, $googleCalendarEventId, $userId);
            return true;
        } catch (Throwable $e) {
            $retryCount = isset($metadata['retryCount']) ? (int)$metadata['retryCount'] : 0;
            $this->log('retry_error', $action, $eventId, $googleCalendarEventId, $userId, [
                'retryCount' => $retryCount,
                'message' => $e->getMessage()
            ]);

            if ($retryCount < self::MAX_RETRIES) {
                (new BackgroundTask())
                    ->setClass(self::class)
                    ->setMethod('process')
                    ->setMetadata([
                        'action' => $action,
                        'eventId' => $eventId,
                        'userId' => $userId,
                        'googleCalendarEventId' => $googleCalendarEventId,
                        'retryCount' => $retryCount + 1
                    ])
                    ->save();
            }

            return false;
        }
    }

    private function log(
        string $actionLabel,
        string $action,
        ?int $eventId,
        ?string $googleCalendarEventId,
        ?int $userId,
        array $extra = []
    ): void {
        error_log(json_encode(array_merge([
            'context' => 'google_calendar_sync_retry',
            'action' => $action,
            'action_label' => $actionLabel,
            'event_id' => $eventId,
            'google_calendar_event_id' => $googleCalendarEventId,
            'user_id' => $userId
        ], $extra), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    }
}
