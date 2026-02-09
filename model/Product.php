<?php

class Product extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'product';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private ?string $title;
    private ?string $description;
    private ?string $metaDescription;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' =>  null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'title' => [
            'default' => '',
            'alias' => 'title',
            'cast' => 'string'
        ],
        'description' => [
            'default' => '',
            'alias' => 'description',
            'cast' => 'string'
        ],
        'metaDescription' => [
            'default' => '',
            'alias' => 'meta_description',
            'cast' => 'string'
        ]
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->loadDefaults();
        if ($id) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }


    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
        return $this;
    }

    public function getMetaDescription(){
        return $this->metaDescription;
    }

    public function setMetaDescription($metaDescription){
        $this->metaDescription = $metaDescription;
        return $this;
    }

    public function getImage(){
        $uuid = $this->db->getVar(sprintf('SELECT uuid FROM attachment WHERE entity = \'product\' AND entity_id = %d', $this->getId()));
        $image = (new GenericAttachment($uuid))->getURI();
        return $image;
    }


}