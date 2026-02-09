<?php

class UserList extends EntityList {

    protected const ENTITY = 'user';

    public function _agencyIdParam(int|array $value) {
        
        $agencyIdList = EntityList::validateIntArray(
            is_array($value) ? $value : [$value]
        );

        if (empty($agencyIdList)) {
            return '1 = 0';
        }

        return sprintf('id IN (SELECT user_id FROM user_agency WHERE agency_id IN (%s))', implode(', ', $agencyIdList));
    }

    public function _websiteRoleIdParam($value) {
        $value = (int)$value;
        if (!array_key_exists($value, User::WEBSITE_ROLES)) {
            throw new Exception('Invalid website role id');
        }
        return sprintf('website_role_id = %d', $value);
    }

}

?>