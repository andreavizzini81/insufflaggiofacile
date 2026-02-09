<?php

class AgencyList extends EntityList {

    protected const ENTITY = 'agency';
    protected $orderParam = 'description ASC';

    public function _regionParam($value) {
        if ($value == 'null') {
            return '';
        }
        return sprintf('region = TRIM(\'%s\')', $this->db->escape($value));
    }

    public function _stateParam($value) {
        if ($value == 'null') {
            return '';
        }
        return sprintf('state = TRIM(\'%s\')', $this->db->escape($value));
    }

    public function _cityParam($value) {
        if ($value == 'null') {
            return '';
        }
        return sprintf('city = TRIM(\'%s\')', $this->db->escape($value));
    }

    public function _subdomainParam($value) {

        if (!preg_match("/^[a-z0-9]+$/", $value)) {
            return '1 = 0';
        }

        return sprintf('subdomain = \'%s\'', $value);
    }

    public function _authorizedToParam($value) {
        $userId = (int)$value;
        if ($userId <= 0) {
            return '1 = 0';
        }
        return sprintf('id IN (SELECT agency_id FROM user_agency WHERE user_id = %d)', $userId);
    }

}