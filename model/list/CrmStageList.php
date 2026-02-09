<?php

class CrmStageList extends EntityList {

    protected const ENTITY = 'crm_stage';
    protected $orderParam = 'position ASC, id ASC';

    protected function _entityParam($value) {
        return sprintf(
            'entity = \'%s\'',
            $this->db->escape($value)
        );
    }

    protected function _isDefaultParam($value) {
        $flag = (int)$value == 1 ? 1 : 0;
        return sprintf('is_default = %d', $flag);
    }

    protected function _isWonParam($value) {
        $flag = (int)$value == 1 ? 1 : 0;
        return sprintf('is_won = %d', $flag);
    }

    protected function _isLostParam($value) {
        $flag = (int)$value == 1 ? 1 : 0;
        return sprintf('is_lost = %d', $flag);
    }

    protected function _isFinalParam($value) {
        if ((int)$value == 1) {
            return '(is_won = 1 OR is_lost = 1)';
        } else {
            return '(is_won = 0 AND is_lost = 0)';
        }
    }

}