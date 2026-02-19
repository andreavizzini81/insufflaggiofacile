CREATE TABLE IF NOT EXISTS `user_google_calendar` (
    `user_id` INT NOT NULL,
    `google_calendar_id` VARCHAR(255) NOT NULL DEFAULT 'primary',
    `access_token` TEXT NULL,
    `refresh_token` TEXT NULL,
    `token_expires_at` DATETIME NULL,
    `sync_enabled` TINYINT(1) NOT NULL DEFAULT 0,
    `last_sync_at` DATETIME NULL,
    `last_sync_status` VARCHAR(32) NULL,
    `last_sync_error` VARCHAR(255) NULL,
    `oauth_state` VARCHAR(255) NULL,
    `oauth_state_created_at` DATETIME NULL,
    `token_type` VARCHAR(64) NULL,
    `scope` TEXT NULL,
    `connected_at` DATETIME NULL,
    `last_error` VARCHAR(255) NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user_google_calendar` (
    `user_id`,
    `google_calendar_id`,
    `access_token`,
    `refresh_token`,
    `token_expires_at`,
    `sync_enabled`,
    `last_sync_at`,
    `last_sync_status`,
    `last_sync_error`,
    `oauth_state`,
    `oauth_state_created_at`,
    `token_type`,
    `scope`,
    `connected_at`,
    `last_error`
)
SELECT
    CAST(SUBSTRING_INDEX(`name`, '_', -1) AS UNSIGNED) AS `user_id`,
    COALESCE(NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.targetCalendarId')), ''), 'primary') AS `google_calendar_id`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.accessToken')), '') AS `access_token`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.refreshToken')), '') AS `refresh_token`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.expiresAt')), '') AS `token_expires_at`,
    IF(JSON_EXTRACT(`value`, '$.syncEnabled') = true, 1, 0) AS `sync_enabled`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.lastSyncAt')), '') AS `last_sync_at`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.lastSyncStatus')), '') AS `last_sync_status`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.lastSyncError')), '') AS `last_sync_error`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.oauthState')), '') AS `oauth_state`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.oauthStateCreatedAt')), '') AS `oauth_state_created_at`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.tokenType')), '') AS `token_type`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.scope')), '') AS `scope`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.connectedAt')), '') AS `connected_at`,
    NULLIF(JSON_UNQUOTE(JSON_EXTRACT(`value`, '$.lastError')), '') AS `last_error`
FROM `setting`
WHERE `category` = 'google_calendar'
  AND `name` LIKE 'google_calendar_connection_user_%'
  AND `parse_as` = 'json'
ON DUPLICATE KEY UPDATE
    `google_calendar_id` = VALUES(`google_calendar_id`),
    `access_token` = VALUES(`access_token`),
    `refresh_token` = VALUES(`refresh_token`),
    `token_expires_at` = VALUES(`token_expires_at`),
    `sync_enabled` = VALUES(`sync_enabled`),
    `last_sync_at` = VALUES(`last_sync_at`),
    `last_sync_status` = VALUES(`last_sync_status`),
    `last_sync_error` = VALUES(`last_sync_error`),
    `oauth_state` = VALUES(`oauth_state`),
    `oauth_state_created_at` = VALUES(`oauth_state_created_at`),
    `token_type` = VALUES(`token_type`),
    `scope` = VALUES(`scope`),
    `connected_at` = VALUES(`connected_at`),
    `last_error` = VALUES(`last_error`),
    `updated_at` = CURRENT_TIMESTAMP;
