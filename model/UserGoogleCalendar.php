<?php

class UserGoogleCalendar extends BaseComponent {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'user_google_calendar';
    private const PRIMARY_KEY = 'user_id';

    private int $userId;
    private ?string $googleCalendarId;
    private ?string $accessToken;
    private ?string $refreshToken;
    private ?string $tokenExpiresAt;
    private bool $syncEnabled;
    private ?string $lastSyncAt;
    private ?string $lastSyncStatus;
    private ?string $lastSyncError;
    private ?string $oauthState;
    private ?string $oauthStateCreatedAt;
    private ?string $tokenType;
    private ?string $scope;
    private ?string $connectedAt;
    private ?string $lastError;
    private ?string $createdAt;
    private ?string $updatedAt;

    private const PROPERTIES_MAP = [
        'userId' => ['default' => 0, 'alias' => 'user_id', 'cast' => 'int'],
        'googleCalendarId' => ['default' => 'primary', 'alias' => 'google_calendar_id', 'cast' => 'string'],
        'accessToken' => ['default' => null, 'alias' => 'access_token', 'cast' => 'string'],
        'refreshToken' => ['default' => null, 'alias' => 'refresh_token', 'cast' => 'string'],
        'tokenExpiresAt' => ['default' => null, 'alias' => 'token_expires_at', 'cast' => 'string'],
        'syncEnabled' => ['default' => false, 'alias' => 'sync_enabled', 'cast' => 'bool'],
        'lastSyncAt' => ['default' => null, 'alias' => 'last_sync_at', 'cast' => 'string'],
        'lastSyncStatus' => ['default' => null, 'alias' => 'last_sync_status', 'cast' => 'string'],
        'lastSyncError' => ['default' => null, 'alias' => 'last_sync_error', 'cast' => 'string'],
        'oauthState' => ['default' => null, 'alias' => 'oauth_state', 'cast' => 'string'],
        'oauthStateCreatedAt' => ['default' => null, 'alias' => 'oauth_state_created_at', 'cast' => 'string'],
        'tokenType' => ['default' => null, 'alias' => 'token_type', 'cast' => 'string'],
        'scope' => ['default' => null, 'alias' => 'scope', 'cast' => 'string'],
        'connectedAt' => ['default' => null, 'alias' => 'connected_at', 'cast' => 'string'],
        'lastError' => ['default' => null, 'alias' => 'last_error', 'cast' => 'string'],
        'createdAt' => ['default' => null, 'alias' => 'created_at', 'cast' => 'string'],
        'updatedAt' => ['default' => null, 'alias' => 'updated_at', 'cast' => 'string']
    ];

    public function __construct(?int $userId = null) {
        parent::__construct();
        $this->loadDefaults();
        if (!is_null($userId)) {
            $this->importFromPrimaryKey($userId);
        }
    }
}

