<?php

class CalendarActivityList extends EntityList {

    protected const ENTITY = 'calendar_activity';
    protected $orderParam = 'activity ASC, id ASC';

    protected function _activityParam(string $value): string {
        return sprintf(
            'activity LIKE "%%%s%%"',
            $this->db->escape(trim($value))
        );
    }

}
