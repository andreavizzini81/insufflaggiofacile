<?php

class AttachmentList extends EntityList {

    protected const ENTITY = 'attachment';
    protected $key = 'uuid';
    protected $orderParam = 'position ASC, created_at ASC';

    protected function _entityParam($value) {
        return sprintf('entity = \'%s\'', $this->db->escape($value));
    }

    protected function _entityIdParam($value) {
        return sprintf('entity_id = %d', (int)$value);
    }
    
}