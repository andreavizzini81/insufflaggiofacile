<?php

class City extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'city';
    private const PRIMARY_KEY = 'id';

    private ?int     $id;
    private ?int     $id_region;
    private ?int     $id_province;
    private string   $name;
    private string   $property_code;
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
        'idProvince' => [
            'default' =>  null,
            'alias' => 'id_province',
            'cast' => 'int'
        ],
        'name' => [
            'default' => '',
            'alias' => 'name',
            'cast' => 'string'
        ],
        'propertyCode' => [
            'default' => '',
            'alias' => 'property_code',
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

    public function getId_province() {
        return $this->id_province;
    }

    public function setId_province($id_province) {
        $this->id_province = $id_province;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getProperty_code() {
        return $this->property_code;
    }

    public function setProperty_code($property_code) {
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