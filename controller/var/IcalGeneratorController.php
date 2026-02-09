<?php

use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;

class IcalGeneratorController {

    protected App       $app;
    protected Database  $db;
    protected Request   $request;
    protected Response  $response;

    public function __construct(Request &$request, App &$app) {
        $this->app = $app;
        $this->request = $request;
        $this->response = new Response();
        $this->response->setContentType('application/json');

        $this->db = Container::Database();
    }

    public function __invoke() {

        $token = $this->request->getQueryParam('token');
        if (is_null($token)) {
            $this->response->setStatusCode(500)->flush();
        }

        $ct = new CalendarLinkToken();
        $isValid = $ct->verify($token);
        if (!$isValid) {
            $this->response->setStatusCode(401)->flush();
        }

        $now = new DateTimeImmutable();

        $listParams = [
            'from' => $now->sub(new DateInterval('P3M'))->format('Y-m-d H:i:s'),
            'to' => $now->add(new DateInterval('P3M'))->format('Y-m-d H:i:s')
        ];

        if ($ct->getEntity() == 'agency') {
            $listParams['agency_id'] = $ct->getEntityId();
        } else {
            $listParams['user_id'] = $ct->getUserId();
        }

        $eventsList = new CalendarEventList($listParams, true, CalendarEvent::class);
        
        $this->response
            ->setContentType('text/calendar')
            ->setBody(
                $this->generateIcal(
                    $eventsList->getAll()
                )
            )
            ->setHeader('Content-Disposition', 'attachment; filename=Calendario Rentaless.ics')
            ->flush();
    }

    private function generateIcal(array $events): string {
        $handler = Calendar::create('Calendario Rentaless');
        
        foreach($events as $event) {
            $handlerEvent = Event::create();
            if ($event->isWholeDay()) {
                $handlerEvent->fullDay();
            }
            $eventDescription = [];
            if ($event->getNote()) {
                $eventDescription[] = $event->getNote();
            }
            if ($event->getEntityLink()) {
                $eventDescription[] = $event->getEntityLink();
            }
            $handlerEvent
                ->uniqueIdentifier(sprintf('RentalnessEvent::%d', $event->getId()))
                ->name($event->getSubject())
                ->startsAt(new DateTime($event->getStartsAt()))
                ->endsAt(new DateTime($event->getEndsAt()));

            if (!empty($eventDescription)) {
                $handlerEvent->description(implode(' - ', $eventDescription));
            }

            $handler->event($handlerEvent);
        }

        return $handler->get();
    }

}