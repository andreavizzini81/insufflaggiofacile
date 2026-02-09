<?php

class PublicUser extends User implements JsonSerializable {

    private const PUBLIC_FIELDS = [
        'id',
        'firstName',
        'lastName',
        'email',
        'phone',
        'websiteRoleId'
    ];

    public function export(): array {
        $data = parent::export();

        return array_intersect_key(
            $data,
            array_flip(self::PUBLIC_FIELDS)
        );
    }

}