<?php

class CrmNoteList extends EntityList {

    protected const ENTITY = 'crm_note';
    protected $orderParam = 'created_at DESC';

    protected function _entityParam(string $value) {
        return sprintf('entity = \'%s\'', $this->db->escape($value));
    }

    protected function _entityIdParam(int $value) {
        return sprintf('entity_id = %d', $value);
    }

}