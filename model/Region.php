<?php

class Region extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'region';
    private const PRIMARY_KEY = 'id';

    private ?int     $id;
    private string   $name;
    private string   $lat;
    private string   $lon;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' =>  null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'name' => [
            'default' => '',
            'alias' => 'name',
            'cast' => 'string'
        ],
        'lat' => [
            'default' => '',
            'alias' => 'lat',
            'cast' => 'string'
        ],
        'lon' => [
            'default' => '',
            'alias' => 'lon',
            'cast' => 'string'
        ]
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->loadDefaults();
        if (!is_null($id)) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getLat() {
        return $this->lat;
    }

    public function setLat($lat) {
        $this->lat = $lat;

        return $this;
    }

    public function getLon() {
        return $this->lon;
    }

    public function setLon($lon) {
        $this->lon = $lon;
        return $this;
    }
}