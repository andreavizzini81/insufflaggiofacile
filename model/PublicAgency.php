<?php

class PublicAgency extends Agency implements JsonSerializable {

    private const PUBLIC_FIELDS = [
        'id',
        'type',
        'description',
        'email',
        'phone',
        'fixedPhone',
        'businessName',
        'businessAddress',
        'businessCity',
        'businessState',
        'businessRegion',
        'businessZipcode',
        'openingInfo',
        'pec',
        'sdi',
        'vatNumber',
        'address',
        'city',
        'zipcode',
        'state',
        'region',
        'latitude',
        'longitude',
        'holderUserId',
    ];

    public function export(): array {
        $data = parent::export();

        return array_intersect_key(
            $data,
            array_flip(self::PUBLIC_FIELDS)
        );
    }


}