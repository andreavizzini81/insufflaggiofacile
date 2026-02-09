<?php

class ContactList extends EntityList {

    protected const ENTITY = 'contact';

    protected function _keyParam($value) {
        
        $escapedValue = $this->db->escape(trim($value));

        $combinations = [
            sprintf('TRIM(first_name) LIKE \'%%%s%%\'', $escapedValue),
            sprintf('TRIM(last_name) LIKE \'%%%s%%\'', $escapedValue),
            sprintf('CONCAT_WS(\' \', first_name, last_name) LIKE \'%s\'', $escapedValue),
            sprintf('CONCAT_WS(\' \', last_name, first_name) LIKE \'%s\'', $escapedValue),
            sprintf('phone LIKE \'%s\'', $escapedValue),
            sprintf('TRIM(email) LIKE \'%s%%\'', $escapedValue),
            sprintf('business_name LIKE \'%%%s%%\'', $escapedValue),
            sprintf('contact_person LIKE \'%%%s%%\'', $escapedValue)
        ];

        return sprintf(
            '(%s)', implode(' OR ', $combinations)
        );
    }

    protected function _emailParam($value) {

        $email = strtolower(trim($value));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return '0 = 1';
        }

        return sprintf('TRIM(LOWER(email)) = \'%s\'', $this->db->escape($email));
    }

    protected function _cityParam($value) {
        if($value == '') {
            return;
        }
        $escapedValue = $this->db->escape(trim($value));
        return sprintf('city LIKE \'%s\'', $this->db->escape($escapedValue));
    }

    protected function _stateParam($value) {
        if($value == '') {
            return;
        }
        $escapedValue = $this->db->escape(trim($value));
        return sprintf('state IN (SELECT provincia FROM cappario WHERE nome_provincia LIKE \'%s\' OR provincia LIKE \'%s\')', $this->db->escape($escapedValue), $this->db->escape($escapedValue));
    }

}