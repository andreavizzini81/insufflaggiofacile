<?php

class Province extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'province';
    private const PRIMARY_KEY = 'id';

    private ?int     $id;
    private ?int     $id_region;
    private string   $name;
    private string   $code;
    private string   $lat;
    private string   $lon;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' =>  null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'idRegion' => [
            'default' =>  null,
            'alias' => 'id_region',
            'cast' => 'int'
        ],
        'name' => [
            'default' => '',
            'alias' => 'name',
            'cast' => 'string'
        ],
        'code' => [
            'default' => '',
            'alias' => 'code',
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

    public function getId_region() {
        return $this->id_region;
    }

    public function setId_region($id_region) {
        $this->id_region = $id_region;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getCode() {
        return $this->property_code;
    }

    public function setCode($property_code) {
        $this->property_code = $property_code;
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