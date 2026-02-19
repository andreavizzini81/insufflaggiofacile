<?php

class GoogleCalendarController extends RestController {

    private GoogleCalendarService $service;

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
        $this->service = new GoogleCalendarService();
    }

    public function getConnectionStatus(): Response {
        return $this->returnResult($this->service->getSyncPreferences($this->user->getId()));
    }

    public function saveSyncPreferences(): Response {
        $enabledRaw = $this->request->getInputParam('enabled');
        $enabled = in_array($enabledRaw, [true, 1, '1', 'true', 'on'], true);
        $calendarId = $this->request->getInputParam('calendar_id');

        try {
            $connection = $this->service->saveSyncPreferences(
                $this->user->getId(),
                $enabled,
                is_null($calendarId) ? null : (string)$calendarId
            );

            return $this->returnResult([
                'connection' => $connection,
                'message' => 'Preferenze sincronizzazione Google salvate correttamente.'
            ]);
        } catch (Throwable $e) {
            return $this->returnErrorMessage($e->getMessage(), 400);
        }
    }

    public function getAuthUrl(): Response {
        try {
            return $this->returnResult([
                'url' => $this->service->getAuthUrl($this->user->getId())
            ]);
        } catch (Throwable $e) {
            return $this->returnErrorMessage($e->getMessage(), 400);
        }
    }

    public function oauthCallback(): Response {
        $code = (string)$this->request->getQueryParam('code');
        $statePayload = (string)$this->request->getQueryParam('state');

        if (trim($code) === '' || trim($statePayload) === '') {
            return $this->returnErrorMessage('Callback OAuth non valida: codice o stato mancanti', 400);
        }

        $stateParts = explode(':', $statePayload, 2);
        if (count($stateParts) !== 2) {
            return $this->returnErrorMessage('Callback OAuth non valida: stato non riconosciuto', 400);
        }

        $userId = (int)$stateParts[0];
        $state = $stateParts[1];

        if ($userId !== (int)$this->user->getId()) {
            return $this->returnErrorMessage('Callback OAuth non valida: utente non corrispondente', 403);
        }

        $stateValidationError = null;
        if (!$this->service->validateState($userId, $state, $stateValidationError)) {
            $message = $stateValidationError === 'expired'
                ? 'Callback OAuth non valida: stato scaduto'
                : 'Callback OAuth non valida: stato non valido';
            return $this->returnErrorMessage($message, 400);
        }

        try {
            $connection = $this->service->exchangeCodeForToken($userId, $code);
            return $this->returnResult([
                'connection' => $connection,
                'message' => 'Google Calendar connesso correttamente. Ora puoi abilitare o riconfigurare la sincronizzazione.'
            ]);
        } catch (Throwable $e) {
            return $this->returnErrorMessage($e->getMessage(), 400);
        }
    }

    public function setSyncStatus(): Response {
        $enabled = (bool)$this->request->getInputParam('enabled');

        try {
            if (!$enabled) {
                $connection = $this->service->revokeConnection($this->user->getId());
                return $this->returnResult([
                    'connection' => $connection,
                    'message' => 'Sincronizzazione Google disabilitata e token revocati. Per riattivare, esegui una nuova connessione OAuth.'
                ]);
            }

            $currentConnection = $this->service->getConnectionData($this->user->getId());
            if (empty($currentConnection->refreshToken) && empty($currentConnection->accessToken)) {
                return $this->returnErrorMessage('Google Calendar non ancora collegato. Avvia prima la connessione OAuth.', 400);
            }

            $connection = $this->service->setSyncEnabled($this->user->getId(), true);
            return $this->returnResult([
                'connection' => $connection,
                'message' => 'Sincronizzazione Google Calendar abilitata.'
            ]);
        } catch (Throwable $e) {
            return $this->returnErrorMessage($e->getMessage(), 400);
        }
    }

    public function setTargetCalendar(): Response {
        $calendarId = (string)$this->request->getInputParam('calendar_id');

        if (trim($calendarId) === '') {
            return $this->returnErrorMessage('Seleziona un calendario Google valido', 400);
        }

        try {
            $connection = $this->service->setTargetCalendar($this->user->getId(), $calendarId);
            return $this->returnResult([
                'connection' => $connection,
                'message' => 'Calendario target aggiornato correttamente.'
            ]);
        } catch (Throwable $e) {
            return $this->returnErrorMessage($e->getMessage(), 400);
        }
    }

    public function listCalendars(): Response {
        try {
            return $this->returnResult([
                'list' => $this->service->listCalendars($this->user->getId())
            ]);
        } catch (Throwable $e) {
            return $this->returnErrorMessage(sprintf('Impossibile recuperare i calendari Google: %s', $e->getMessage()), 400);
        }
    }

}
