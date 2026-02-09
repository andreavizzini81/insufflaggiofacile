<?php

class AdminPageCategory extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'admin_page_category';
    private const PRIMARY_KEY = 'id';

    private ?int $id;
    private ?string $name;
    private ?string $icon;
    private ?string $url;
    private ?bool   $isLink;
    private ?bool   $isExternal;
    private ?array  $pages;
    private ?int    $sort;

    private const PROPERTIES_MAP = [
        'id'         => [
            'default' => null, 
            'alias' => 'id', 
            'cast' => 'int'
        ],
        'name'       => [
            'default' => null, 
            'alias' => 'name', 
            'cast' => 'string'
        ],
        'icon'       => [
            'default' => null, 
            'alias' => 'icon', 
            'cast' => 'string'
        ],
        'url'        => [
            'default' => null, 
            'alias' => 'url', 
            'cast' => 'string'
        ],
        'isLink'     => [
            'default' => false, 
            'alias' => 'is_link', 
            'cast' => 'bool'
        ],
        'isExternal' => [
            'default' => false, 
            'alias' => 'is_external', 
            'cast' => 'bool'
        ],
        'sort'       => [
            'default' => 100, 
            'alias' => 'sort', 
            'cast' => 'int'
        ],
        'pages'      => [
            'default' => [],
            'alias' => null,
            'cast' => 'array'
        ]
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->loadDefaults();
        if (!is_null($id)) {
            $this->setId($id);
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        if ($id > 0) {
            $this->id = $id;
            $this->importFromPrimaryKey($id);
        }
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name) {
        $this->name = $name;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl(string $url) {
        $this->url = $url;
        return $this;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon(string $icon) {
        $this->icon = $icon;
        return $this;
    }

    public function getIsLink() {
        return $this->isLink;
    }

    public function setIsLink(bool $isLink) {
        $this->isLink = $isLink;
        return $this;
    }

    public function getIsExternal() {
        return $this->isExternal;
    }

    public function setIsExternal(bool $isExternal) {
        $this->isExternal = $isExternal;
        return $this;
    }

    public function getSort() {
        return $this->sort;
    }

    public function setSort(int $sort) {
        $this->sort = $sort;
        return $this;
    }

    protected function afterImport() {
        if ($this->exists) {
            $this->pages = (new AdminPageList(['categoryId' => $this->id], true, 'AdminPage'))->getAll();
        }
    }

    public function getPages() {
        return $this->pages;
    }
}

?>