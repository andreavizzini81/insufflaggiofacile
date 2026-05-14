<?php

class StaticPage extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'static_page';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private ?string $title;
    private ?string $description;
    private ?string $metaDescription;
    private ?string $titleH1;
    private ?string $slug;
    private ?string $sectionsJson;
    private ?string $faqJson;
    private ?string $structuredDataJson;

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
        ],
        'titleH1' => [
            'default' => '',
            'alias' => 'titolo_h1',
            'cast' => 'string'
        ]
        ,
        'slug' => [
            'default' => '',
            'alias' => 'slug',
            'cast' => 'string'
        ],
        'sectionsJson' => [
            'default' => '[]',
            'alias' => 'sections_json',
            'cast' => 'string'
        ],
        'faqJson' => [
            'default' => '[]',
            'alias' => 'faq_json',
            'cast' => 'string'
        ],
        'structuredDataJson' => [
            'default' => '',
            'alias' => 'structured_data_json',
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

    public function getTitleH1(){
        return $this->titleH1;
    }

    public function setTitleH1($titleH1){
        $this->titleH1 = $titleH1;
        return $this;
    }

    public function getSlug(){
        return $this->slug;
    }

    public function setSlug($slug){
        $this->slug = $slug;
        return $this;
    }

    public function getSectionsJson(){
        return $this->sectionsJson;
    }

    public function setSectionsJson($sectionsJson){
        $this->sectionsJson = $sectionsJson;
        return $this;
    }

    public function getFaqJson(){
        return $this->faqJson;
    }

    public function setFaqJson($faqJson){
        $this->faqJson = $faqJson;
        return $this;
    }

    public function getStructuredDataJson(){
        return $this->structuredDataJson;
    }

    public function setStructuredDataJson($structuredDataJson){
        $this->structuredDataJson = $structuredDataJson;
        return $this;
    }

    public function getSections(): array {
        return json_decode($this->sectionsJson ?? '[]', true) ?: [];
    }

    public function getFaqItems(): array {
        return json_decode($this->faqJson ?? '[]', true) ?: [];
    }

    /*
    public function getImage(){
        $uuid = $this->db->getVar(sprintf('SELECT uuid FROM attachment WHERE entity = \'product\' AND entity_id = %d', $this->getId()));
        $image = (new GenericAttachment($uuid))->getURI();
        return $image;
    }
    */

}