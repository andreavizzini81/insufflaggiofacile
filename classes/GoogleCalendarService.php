<?php

class GoogleCalendarService extends BaseComponent {

    private const OAUTH_AUTH_ENDPOINT = 'https://accounts.google.com/o/oauth2/v2/auth';
    private const OAUTH_TOKEN_ENDPOINT = 'https://oauth2.googleapis.com/token';
    private const OAUTH_REVOKE_ENDPOINT = 'https://oauth2.googleapis.com/revoke';
    private const CALENDAR_API_BASE = 'https://www.googleapis.com/calendar/v3';

    private const OAUTH_SCOPE = 'https://www.googleapis.com/auth/calendar';

    private const DATE_TIME_FORMAT = 'Y-m-d\\TH:i:sP';

    public function getAuthUrl(int $userId): string {
        $this->assertEnvironment();

        $state = bin2hex(random_bytes(16));
        $connection = $this->getConnectionData($userId);
        $connection->oauthState = $state;
        $connection->oauthStateCreatedAt = date('Y-m-d H:i:s');
        $this->saveConnectionData($userId, $connection);

        $params = [
            'client_id' => $_ENV['GOOGLE_CLIENT_ID'],
            'redirect_uri' => $_ENV['GOOGLE_REDIRECT_URI'],
            'response_type' => 'code',
            'access_type' => 'offline',
            'prompt' => 'consent',
            'scope' => self::OAUTH_SCOPE,
            'state' => sprintf('%d:%s', $userId, $state)
        ];

        return sprintf('%s?%s', self::OAUTH_AUTH_ENDPOINT, http_build_query($params));
    }

    public function exchangeCodeForToken(int $userId, string $code): object {
        $this->assertEnvironment();

        $response = $this->sendJsonRequest(
            self::OAUTH_TOKEN_ENDPOINT,
            HttpMethodEnum::POST,
            [
                'code' => $code,
                'client_id' => $_ENV['GOOGLE_CLIENT_ID'],
                'client_secret' => $_ENV['GOOGLE_CLIENT_SECRET'],
                'redirect_uri' => $_ENV['GOOGLE_REDIRECT_URI'],
                'grant_type' => 'authorization_code'
            ],
            [],
            false
        );

        if (!isset($response->access_token)) {
            $message = $response->error_description ?? $response->error ?? 'Token OAuth non valido';
            throw new RuntimeException(sprintf('Connessione Google non riuscita: %s', $message));
        }

        $connection = $this->getConnectionData($userId);
        $connection->accessToken = $response->access_token;
        $connection->refreshToken = $response->refresh_token ?? $connection->refreshToken ?? null;
        $connection->expiresAt = date('Y-m-d H:i:s', time() + (int)($response->expires_in ?? 3600));
        $connection->tokenType = $response->token_type ?? 'Bearer';
        $connection->scope = $response->scope ?? self::OAUTH_SCOPE;
        $connection->connectedAt = date('Y-m-d H:i:s');
        $connection->syncEnabled = true;
        $connection->oauthState = null;
        $connection->lastError = null;
        $this->saveConnectionData($userId, $connection);

        return $connection;
    }

    public function refreshAccessTokenIfNeeded(int $userId): object {
        $this->assertEnvironment();

        $connection = $this->getConnectionData($userId);
        if (empty($connection->refreshToken)) {
            throw new RuntimeException('Nessun refresh token disponibile, riconnetti Google Calendar');
        }

        if (!empty($connection->accessToken) && !empty($connection->expiresAt)) {
            $expiresAt = strtotime($connection->expiresAt);
            if ($expiresAt !== false && $expiresAt > time() + 120) {
                return $connection;
            }
        }

        $response = $this->sendJsonRequest(
            self::OAUTH_TOKEN_ENDPOINT,
            HttpMethodEnum::POST,
            [
                'client_id' => $_ENV['GOOGLE_CLIENT_ID'],
                'client_secret' => $_ENV['GOOGLE_CLIENT_SECRET'],
                'refresh_token' => $connection->refreshToken,
                'grant_type' => 'refresh_token'
            ],
            [],
            false
        );

        if (!isset($response->access_token)) {
            $connection->lastError = $response->error_description ?? $response->error ?? 'Impossibile rinnovare il token';
            $this->saveConnectionData($userId, $connection);
            throw new RuntimeException($connection->lastError);
        }

        $connection->accessToken = $response->access_token;
        $connection->expiresAt = date('Y-m-d H:i:s', time() + (int)($response->expires_in ?? 3600));
        $connection->tokenType = $response->token_type ?? 'Bearer';
        $connection->lastError = null;
        $this->saveConnectionData($userId, $connection);

        return $connection;
    }

    public function createEvent(CalendarEvent $event): ?string {
        if (!$this->isSyncEnabledForEvent($event)) {
            return null;
        }

        $connection = $this->refreshAccessTokenIfNeeded((int)$event->getUserId());
        $calendarId = $connection->targetCalendarId ?? 'primary';

        $response = $this->sendJsonRequest(
            sprintf('%s/calendars/%s/events', self::CALENDAR_API_BASE, rawurlencode($calendarId)),
            HttpMethodEnum::POST,
            $this->buildGoogleEventPayload($event),
            $this->buildAuthHeaders($connection)
        );

        if (!isset($response->id)) {
            throw new RuntimeException('Creazione evento su Google Calendar non riuscita');
        }

        $event->setGoogleCalendarEventId($response->id);
        $event->save();

        return $response->id;
    }

    public function updateEvent(CalendarEvent $event): bool {
        if (!$this->isSyncEnabledForEvent($event)) {
            return false;
        }

        $connection = $this->refreshAccessTokenIfNeeded((int)$event->getUserId());
        $calendarId = $connection->targetCalendarId ?? 'primary';

        if (!$event->getGoogleCalendarEventId()) {
            $this->createEvent($event);
            return true;
        }

        $this->sendJsonRequest(
            sprintf(
                '%s/calendars/%s/events/%s',
                self::CALENDAR_API_BASE,
                rawurlencode($calendarId),
                rawurlencode($event->getGoogleCalendarEventId())
            ),
            HttpMethodEnum::PUT,
            $this->buildGoogleEventPayload($event),
            $this->buildAuthHeaders($connection)
        );

        return true;
    }

    public function deleteEvent(CalendarEvent $event): bool {
        if (!$this->isSyncEnabledForEvent($event) || !$event->getGoogleCalendarEventId()) {
            return false;
        }

        $connection = $this->refreshAccessTokenIfNeeded((int)$event->getUserId());
        $calendarId = $connection->targetCalendarId ?? 'primary';

        $this->sendJsonRequest(
            sprintf(
                '%s/calendars/%s/events/%s',
                self::CALENDAR_API_BASE,
                rawurlencode($calendarId),
                rawurlencode($event->getGoogleCalendarEventId())
            ),
            HttpMethodEnum::DELETE,
            null,
            $this->buildAuthHeaders($connection)
        );

        $event->setGoogleCalendarEventId(null);
        $event->save();

        return true;
    }

    public function deleteEventByGoogleId(int $userId, string $googleCalendarEventId): bool {
        if (trim($googleCalendarEventId) === '') {
            return false;
        }

        $connection = $this->getConnectionData($userId);
        if (!(bool)($connection->syncEnabled ?? false)) {
            return false;
        }

        $connection = $this->refreshAccessTokenIfNeeded($userId);
        $calendarId = $connection->targetCalendarId ?? 'primary';

        $this->sendJsonRequest(
            sprintf(
                '%s/calendars/%s/events/%s',
                self::CALENDAR_API_BASE,
                rawurlencode($calendarId),
                rawurlencode($googleCalendarEventId)
            ),
            HttpMethodEnum::DELETE,
            null,
            $this->buildAuthHeaders($connection)
        );

        return true;
    }

    public function listCalendars(int $userId): array {
        $connection = $this->refreshAccessTokenIfNeeded($userId);
        $response = $this->sendJsonRequest(
            sprintf('%s/users/me/calendarList', self::CALENDAR_API_BASE),
            HttpMethodEnum::GET,
            null,
            $this->buildAuthHeaders($connection)
        );

        if (!isset($response->items) || !is_array($response->items)) {
            return [];
        }

        return array_map(static function(object $item): array {
            return [
                'id' => $item->id ?? '',
                'summary' => $item->summary ?? ($item->id ?? ''),
                'primary' => (bool)($item->primary ?? false)
            ];
        }, $response->items);
    }

    public function setSyncEnabled(int $userId, bool $enabled): object {
        $connection = $this->getConnectionData($userId);
        $connection->syncEnabled = $enabled;
        if (!$enabled) {
            $connection->lastError = null;
        }
        $this->saveConnectionData($userId, $connection);
        return $connection;
    }

    public function setTargetCalendar(int $userId, string $calendarId): object {
        $connection = $this->getConnectionData($userId);
        $connection->targetCalendarId = trim($calendarId) !== '' ? trim($calendarId) : 'primary';
        $this->saveConnectionData($userId, $connection);
        return $connection;
    }

    public function revokeConnection(int $userId): object {
        $connection = $this->getConnectionData($userId);

        if (!empty($connection->refreshToken)) {
            $this->sendJsonRequest(
                sprintf('%s?token=%s', self::OAUTH_REVOKE_ENDPOINT, rawurlencode($connection->refreshToken)),
                HttpMethodEnum::POST,
                null,
                [],
                false,
                false
            );
        }

        $connection->accessToken = null;
        $connection->refreshToken = null;
        $connection->expiresAt = null;
        $connection->tokenType = null;
        $connection->scope = null;
        $connection->connectedAt = null;
        $connection->syncEnabled = false;
        $connection->lastError = null;
        $connection->oauthState = null;
        $this->saveConnectionData($userId, $connection);

        return $connection;
    }

    public function getConnectionData(int $userId): object {
        $setting = new Setting($this->getSettingName($userId));
        if (!$setting->exists()) {
            return (object)[
                'syncEnabled' => false,
                'targetCalendarId' => 'primary',
                'accessToken' => null,
                'refreshToken' => null,
                'expiresAt' => null,
                'tokenType' => null,
                'scope' => null,
                'connectedAt' => null,
                'oauthState' => null,
                'oauthStateCreatedAt' => null,
                'lastError' => null
            ];
        }

        return is_object($setting->getValue()) ? $setting->getValue() : (object)[];
    }

    public function validateState(int $userId, string $state): bool {
        $connection = $this->getConnectionData($userId);
        return isset($connection->oauthState) && hash_equals((string)$connection->oauthState, $state);
    }

    public function assertEnvironment(): void {
        $required = [
            'GOOGLE_CLIENT_ID',
            'GOOGLE_CLIENT_SECRET',
            'GOOGLE_REDIRECT_URI'
        ];

        $missing = [];
        foreach($required as $key) {
            if (!isset($_ENV[$key]) || trim((string)$_ENV[$key]) === '') {
                $missing[] = $key;
            }
        }

        if (!empty($missing)) {
            throw new RuntimeException(
                sprintf('Configurazione Google Calendar incompleta, variabili mancanti: %s', implode(', ', $missing))
            );
        }
    }

    private function isSyncEnabledForEvent(CalendarEvent $event): bool {
        if (!$event->getUserId()) {
            return false;
        }

        $connection = $this->getConnectionData((int)$event->getUserId());
        return (bool)($connection->syncEnabled ?? false);
    }

    private function saveConnectionData(int $userId, object $value): void {
        $setting = new Setting($this->getSettingName($userId));
        $setting
            ->setName($this->getSettingName($userId))
            ->setCategory('google_calendar')
            ->setLabel(sprintf('Google Calendar Sync User #%d', $userId))
            ->setParseAs('json')
            ->setValue($value)
            ->save();
    }

    private function getSettingName(int $userId): string {
        return sprintf('google_calendar_connection_user_%d', $userId);
    }

    private function buildGoogleEventPayload(CalendarEvent $event): array {
        $payload = [
            'summary' => $event->getSubject(),
            'description' => $event->getNote() ?? '',
            'extendedProperties' => [
                'private' => [
                    'sw_event_id' => (string)$event->getId(),
                    'sw_entity' => (string)$event->getEntity(),
                    'sw_entity_id' => (string)$event->getEntityId()
                ]
            ]
        ];

        if ($event->isWholeDay()) {
            $payload['start'] = [
                'date' => substr((string)$event->getStartsAt(), 0, 10)
            ];
            $payload['end'] = [
                'date' => substr((string)($event->getEndsAt() ?? $event->getStartsAt()), 0, 10)
            ];
            return $payload;
        }

        $startDate = new DateTime($event->getStartsAt() ?? 'now');
        $endDate = new DateTime($event->getEndsAt() ?? $event->getStartsAt() ?? 'now');

        $payload['start'] = [
            'dateTime' => $startDate->format(self::DATE_TIME_FORMAT),
            'timeZone' => 'Europe/Rome'
        ];
        $payload['end'] = [
            'dateTime' => $endDate->format(self::DATE_TIME_FORMAT),
            'timeZone' => 'Europe/Rome'
        ];

        return $payload;
    }

    private function buildAuthHeaders(object $connection): array {
        $tokenType = $connection->tokenType ?? 'Bearer';
        return [
            sprintf('Authorization: %s %s', $tokenType, $connection->accessToken),
            'Content-Type: application/json'
        ];
    }

    private function sendJsonRequest(
        string $url,
        HttpMethodEnum $method,
        array|string|null $body = null,
        array $headers = [],
        bool $asJson = true,
        bool $throwOnHttpError = true
    ): object {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method->value);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        if (!is_null($body)) {
            if ($asJson) {
                $encodedBody = is_string($body) ? $body : json_encode($body);
                if (!in_array('Content-Type: application/json', $headers, true)) {
                    $headers[] = 'Content-Type: application/json';
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                }
            } else {
                $encodedBody = is_array($body) ? http_build_query($body) : (string)$body;
                if (!in_array('Content-Type: application/x-www-form-urlencoded', $headers, true)) {
                    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                }
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedBody);
        }

        $rawResponse = curl_exec($ch);
        $httpCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        curl_close($ch);

        if ($rawResponse === false) {
            throw new RuntimeException(sprintf('Richiesta Google fallita: %s', $error));
        }

        $decodedResponse = json_decode($rawResponse);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $decodedResponse = (object)[];
        }

        if ($throwOnHttpError && $httpCode >= 400) {
            $message = $decodedResponse->error_description
                ?? $decodedResponse->error->message
                ?? $decodedResponse->error
                ?? sprintf('Errore HTTP Google (%d)', $httpCode);
            throw new RuntimeException($message);
        }

        return $decodedResponse;
    }
}
