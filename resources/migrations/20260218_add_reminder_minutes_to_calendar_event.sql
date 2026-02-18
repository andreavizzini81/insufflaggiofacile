ALTER TABLE `calendar_event`
    ADD COLUMN `reminder_minutes` INT NULL DEFAULT NULL AFTER `note`;
