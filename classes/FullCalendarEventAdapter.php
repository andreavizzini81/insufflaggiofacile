<?php

class FullCalendarEventAdapter extends CalendarEvent implements JsonSerializable {

    public function jsonSerialize(): mixed {

        return (object)[
            'id' => $this->getId(),
            'title' => $this->getSubject(),
            'start' => $this->getStartsAt(),
            'end' => $this->getEndsAt(),
            'className' => sprintf('calendar-event-%s', $this->getColor()),
            'allDay' => $this->isWholeDay(),
            'extendedProps' => (object)[
                'endpoint' => $this->getEndpoint(),
                'entity' => $this->getEntity(),
                'entityId' => $this->getEntityId(),
                'eventId' => $this->getId(),
                'userId' => $this->getUserId()
            ]
        ];
    }

}