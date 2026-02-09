<?php

class CalendarLink extends BaseComponent {

    private const VALID_ROLES = ['admin', 'agency'];

    private const DEFAULTS = [
        'admin'     => null,
        'agencyId'  => null,
        'role'      => 'admin',
        'token'     => null,
        'tasks'     => []
    ];

    private ?User   $admin;
    private ?int    $agencyId;
    private string  $role;
    private ?string $token;
    private array   $tasks;

    public function __construct() {

        foreach(self::DEFAULTS as $key => $value) {
            $this->{$key} = $value;
        }


    }







}