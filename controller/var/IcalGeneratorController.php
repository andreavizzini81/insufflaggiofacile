<?php

use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;
use Spatie\IcalendarGenerator\Properties\TextProperty;

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
        $pastMonths = $this->resolveMonthWindow(
            $this->request->getQueryParam('pastMonths'),
            12
        );
        $futureMonths = $this->resolveMonthWindow(
            $this->request->getQueryParam('futureMonths'),
            24
        );

        $listParams = [
            'from' => $now->sub(new DateInterval(sprintf('P%dM', $pastMonths)))->format('Y-m-d H:i:s'),
            'to' => $now->add(new DateInterval(sprintf('P%dM', $futureMonths)))->format('Y-m-d H:i:s')
        ];

        if ($ct->getEntity() == 'agency') {
            $listParams['agency_id'] = $ct->getEntityId();
        } else {
            $listParams['user_id'] = $ct->getUserId();
        }

        $eventsList = new CalendarEventList($listParams, true, CalendarEvent::class);
        
        $events = $eventsList->getAll();
        $icalPayload = $this->generateIcal($events);
        $lastModified = $this->resolveLastModifiedDate($events);
        $etag = $this->generateEtag($icalPayload, $lastModified);

        if ($this->isNotModified($etag, $lastModified)) {
            $this->response
                ->setStatusCode(304)
                ->setHeader('ETag', $etag)
                ->setHeader('Last-Modified', $lastModified->format(DATE_RFC7231))
                ->setHeader('Cache-Control', 'private, max-age=300, stale-while-revalidate=60')
                ->flush();
        }

        $this->response
            ->setContentType('text/calendar; charset=utf-8')
            ->setBody($icalPayload)
            ->setHeader('ETag', $etag)
            ->setHeader('Last-Modified', $lastModified->format(DATE_RFC7231))
            ->setHeader('Cache-Control', 'private, max-age=300, stale-while-revalidate=60')
            ->setHeader('X-Robots-Tag', 'noindex, nofollow');

        if ($this->shouldForceDownload()) {
            $this->response->setHeader('Content-Disposition', 'attachment; filename=Calendario Rentaless.ics');
        }

        $this->response->flush();
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
                ->createdAt($this->resolveEventDtstamp($event))
                ->startsAt(new DateTime($event->getStartsAt()))
                ->endsAt(new DateTime($event->getEndsAt()));

            $handlerEvent->appendProperty(
                TextProperty::create(
                    'SEQUENCE',
                    (string)$this->resolveEventSequence($event)
                )
            );

            if (!empty($eventDescription)) {
                $handlerEvent->description(implode(' - ', $eventDescription));
            }

            $handler->event($handlerEvent);
        }

        return $handler->get();
    }

    private function resolveMonthWindow(mixed $rawValue, int $fallback): int {
        if (!is_scalar($rawValue)) {
            return $fallback;
        }

        $window = (int)$rawValue;
        if ($window < 1) {
            return $fallback;
        }

        return min($window, 60);
    }

    private function shouldForceDownload(): bool {
        $download = strtolower(trim((string)($this->request->getQueryParam('download') ?? '0')));
        return in_array($download, ['1', 'true', 'yes'], true);
    }

    /**
     * @param CalendarEvent[] $events
     */
    private function resolveLastModifiedDate(array $events): DateTimeImmutable {
        $lastModified = new DateTimeImmutable('@0');

        foreach ($events as $event) {
            $candidate = $event->getUpdatedAt() ?? $event->getCreatedAt() ?? $event->getEndsAt() ?? $event->getStartsAt();
            if (!$candidate) {
                continue;
            }

            try {
                $candidateDate = new DateTimeImmutable($candidate);
            } catch (Throwable $e) {
                continue;
            }

            if ($candidateDate > $lastModified) {
                $lastModified = $candidateDate;
            }
        }

        return $lastModified;
    }

    private function generateEtag(string $icalPayload, DateTimeImmutable $lastModified): string {
        return sprintf('"%s"', sha1($lastModified->format(DATE_ATOM) . $icalPayload));
    }

    private function isNotModified(string $etag, DateTimeImmutable $lastModified): bool {
        $ifNoneMatch = trim((string)($this->request->getHeader('If-None-Match') ?? ''));
        if ($ifNoneMatch !== '' && $ifNoneMatch === $etag) {
            return true;
        }

        $ifModifiedSince = trim((string)($this->request->getHeader('If-Modified-Since') ?? ''));
        if ($ifModifiedSince === '') {
            return false;
        }

        try {
            $sinceDate = new DateTimeImmutable($ifModifiedSince);
        } catch (Throwable $e) {
            return false;
        }

        return $lastModified->getTimestamp() <= $sinceDate->getTimestamp();
    }

    private function resolveEventDtstamp(CalendarEvent $event): DateTimeImmutable {
        $dateValue = $event->getUpdatedAt() ?? $event->getCreatedAt() ?? $event->getStartsAt();
        try {
            return new DateTimeImmutable((string)$dateValue);
        } catch (Throwable $e) {
            return new DateTimeImmutable();
        }
    }

    private function resolveEventSequence(CalendarEvent $event): int {
        $dateValue = $event->getUpdatedAt() ?? $event->getCreatedAt();
        if (!$dateValue) {
            return 0;
        }

        try {
            return max(0, (new DateTimeImmutable($dateValue))->getTimestamp());
        } catch (Throwable $e) {
            return 0;
        }
    }

}
