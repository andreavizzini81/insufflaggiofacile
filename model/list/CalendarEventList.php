<?php

class CalendarEventList extends EntityList {

    protected const ENTITY = 'calendar_event';
    protected $orderParam = 'starts_at ASC';

    protected function _userIdParam(int|array $value): string {

        $values = EntityList::validateIntArray(
            is_array($value) ? $value : [$value]
        );

        if (empty($values)) {
            return '0 = 1';
        }

        return sprintf('user_id IN (%s)', implode(', ', $values));
    }

    protected function _agencyIdParam(int|array $value): ?string {

        $values = EntityList::validateIntArray(
            is_array($value) ? $value : [$value]
        );

        if (empty($values)) {
            return '0 = 1';
        }

        $assignedUserIds = $this->db->getCol(
            sprintf(
                'SELECT user_id FROM user_agency WHERE agency_id IN (%s)', 
                implode(', ', $values)
            )
        );

        $defaultUserIds = $this->db->getCol(
            sprintf(
                'SELECT id FROM user WHERE default_agency_id IS NOT NULL AND default_agency_id IN (%s)', 
                implode(', ', $values)
            )
        );

        $userIds = array_unique(
            array_merge($assignedUserIds, $defaultUserIds)
        );
        
        if (empty($userIds)) {
            return '0 = 1';
        }

        return sprintf('user_id IN (%s)', implode(', ', $userIds));
    }

    protected function _entityParam(string $value): string {
        return sprintf('entity = \'%s\'', $this->db->escape($value));
    }

    protected function _entityIdParam(int $value): string {

        if ((int)$value <= 0) {
            return '1 = 0';
        }

        return sprintf('entity_id = %d', $value);
    }

    protected function _fromParam(string $value): string {

        $normalizedDateTime = Utils::normalizeDate($value);
        if ($normalizedDateTime == '') {
            return '0 = 1';
        }

        return sprintf(
            'starts_at >= \'%s\'', $normalizedDateTime
        );
    }

    protected function _toParam(string $value): string {
		
		$normalizedDateTime = Utils::normalizeDate($value);
		if ($normalizedDateTime == '') {
            return '0 = 1';
        }
		
        return sprintf(
            'ends_at <= \'%s\'', $normalizedDateTime
        );
    }

    protected function _statusParam(string $value): string {

        if ($value == '') {
            return '0 = 1';
        }

        return sprintf(
            'status = \'%s\'', $value
        );
    }

    /*
    protected function _userIdParam(int|array $value) {
        $values = EntityList::validateIntArray(
            is_array($value) ? $value : [$value]
        );

        if (empty($userIds)) {
            return '0 = 1';
        }

        return sprintf('user_id IN (%s)', implode(', ', $values));
    }
    */
}