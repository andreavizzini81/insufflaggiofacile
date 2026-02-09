<?php

class DealList extends EntityList {

    protected const ENTITY = 'deal';
    protected $orderParam = 'created_at DESC';

    protected const CRM_STATUS_FILTER_CONDITIONS = [
        'open' => 'is_won = 0 AND is_lost = 0', 
        'closed' => 'is_won = 1 OR is_lost = 1', 
        'won' => 'is_won = 1', 
        'lost' => 'is_lost = 1'
    ];

    public function _keyParam(string $value) {
        if (trim($value) == '') {
            return null;
        }
        $value = $this->db->escape($value);

        $parts = [
            sprintf(
                "contact_id IN (
                    SELECT id FROM contact WHERE first_name LIKE '%s' OR last_name LIKE '%s' OR business_name LIKE '%s' OR vat_number LIKE '%s' OR state IN (SELECT provincia FROM cappario WHERE nome_provincia LIKE '%s') OR city LIKE '%s'
                )",
                $value, $value, $value, $value, $value, $value
            ),
            sprintf('title LIKE \'%%%s%%\'', $value)
        ];

        error_log( 
            sprintf('(%s)', implode(' OR ', $parts))
        );

        return sprintf('(%s)', implode(' OR ', $parts));
    }

    public function _agencyIdParam(array|int $value) {

        $agencyIdList = EntityList::validateIntArray(
            is_array($value) ? $value : [$value]
        );
        if (empty($agencyIdList)) {
            return '1 = 0';
        }

        return sprintf(
            'agency_id IN (%s)',
            implode(', ', $agencyIdList)
        );
    }

    public function _stageIdParam(array|int $value): string {

        $stageIdList = EntityList::validateIntArray(
            is_array($value) ? $value : [$value]
        );

        if (empty($stageIdList)) {
            return '1 = 0';
        }

        return sprintf(
            'stage_id IN (%s)',
            implode(', ', $stageIdList)
        );
    }

    public function _crmStatusParam(string $value): ?string {

        if (trim($value) == '') {
            return null;
        }

        if (!array_key_exists($value, self::CRM_STATUS_FILTER_CONDITIONS)) {
            return '1 = 0';
        }
        
        return sprintf(
            'stage_id IN (SELECT id FROM crm_stage WHERE %s)', 
            self::CRM_STATUS_FILTER_CONDITIONS[$value]
        );
    }

    public function _responsibleIdParam(array|int $value) {

        $responsibleIdList = EntityList::validateIntArray(
            is_array($value) ? $value : [$value]
        );
        if (empty($responsibleIdList)) {
            return '1 = 0';
        }

        return sprintf(
            'responsible_id IN (%s)',
            implode(', ', $responsibleIdList)
        );
    }

}