<?php

class SeoLandingCategory extends BaseComponent implements JsonSerializable {
    use DatabaseObjectMapper;

    private const ENTITY_TABLE = 'seo_landing_category';
    private const PRIMARY_KEY = 'id';

    private ?int $id;
    private ?string $name;
    private ?string $slug;
    private ?string $description;
    private ?string $menuLabel;
    private ?int $sort;
    private ?int $isVisible;
    private ?int $showInServicesMenu;

    private const PROPERTIES_MAP = [
        'id' => ['default' => null, 'alias' => 'id', 'cast' => 'int'],
        'name' => ['default' => '', 'alias' => 'name', 'cast' => 'string'],
        'slug' => ['default' => '', 'alias' => 'slug', 'cast' => 'string'],
        'description' => ['default' => '', 'alias' => 'description', 'cast' => 'string'],
        'menuLabel' => ['default' => '', 'alias' => 'menu_label', 'cast' => 'string'],
        'sort' => ['default' => 0, 'alias' => 'sort', 'cast' => 'int'],
        'isVisible' => ['default' => 1, 'alias' => 'is_visible', 'cast' => 'int'],
        'showInServicesMenu' => ['default' => 1, 'alias' => 'show_in_services_menu', 'cast' => 'int'],
    ];

    public function __construct(?int $id = null) { parent::__construct(); $this->loadDefaults(); if ($id) { $this->importFromPrimaryKey($id);} }
    public function getId(){return $this->id;} public function getName(){return $this->name;} public function getSlug(){return $this->slug;} public function getDescription(){return $this->description;} public function getMenuLabel(){return $this->menuLabel;} public function getSort(){return $this->sort;} public function getIsVisible(){return $this->isVisible;} public function getShowInServicesMenu(){return $this->showInServicesMenu;}

    public static function findVisibleForServicesMenu(): array {
        $db = Container::Database();
        return (array)$db->getResults("SELECT * FROM seo_landing_category WHERE is_visible = 1 AND show_in_services_menu = 1 ORDER BY sort ASC, name ASC");
    }

    public static function findAllForAdmin(): array {
        return (array)Container::Database()->getResults("SELECT * FROM seo_landing_category ORDER BY sort ASC, name ASC");
    }
}
