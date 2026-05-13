<?php

class SeoLandingPage extends BaseComponent implements JsonSerializable {
    use DatabaseObjectMapper;

    private const ENTITY_TABLE = 'seo_landing_page';
    private const PRIMARY_KEY = 'id';

    private ?int $id;
    private ?string $slug;
    private ?string $title;
    private ?string $metaTitle;
    private ?string $metaDescription;
    private ?string $h1;
    private ?string $introText;
    private ?string $heroCtaLabel;
    private ?string $heroCtaUrl;
    private ?string $mainContent;
    private ?string $sectionsJson;
    private ?string $faqJson;
    private ?string $structuredDataJson;
    private ?string $menuGroup;
    private ?int $categoryId;
    private ?string $menuLabel;
    private ?int $showInServicesMenu;
    private ?int $showRelatedPages;
    private ?int $sort;
    private ?int $isVisible;
    private ?int $inSitemap;
    private ?string $robots;

    private const PROPERTIES_MAP = [
        'id' => ['default' => null, 'alias' => 'id', 'cast' => 'int'], 'slug' => ['default' => '', 'alias' => 'slug', 'cast' => 'string'],
        'title' => ['default' => '', 'alias' => 'title', 'cast' => 'string'], 'metaTitle' => ['default' => '', 'alias' => 'meta_title', 'cast' => 'string'],
        'metaDescription' => ['default' => '', 'alias' => 'meta_description', 'cast' => 'string'], 'h1' => ['default' => '', 'alias' => 'h1', 'cast' => 'string'],
        'introText' => ['default' => '', 'alias' => 'intro_text', 'cast' => 'string'], 'heroCtaLabel' => ['default' => 'Richiedi un preventivo gratuito', 'alias' => 'hero_cta_label', 'cast' => 'string'],
        'heroCtaUrl' => ['default' => '/richiedi-preventivo', 'alias' => 'hero_cta_url', 'cast' => 'string'], 'mainContent' => ['default' => '', 'alias' => 'main_content', 'cast' => 'string'],
        'sectionsJson' => ['default' => '[]', 'alias' => 'sections_json', 'cast' => 'string'], 'faqJson' => ['default' => '[]', 'alias' => 'faq_json', 'cast' => 'string'],
        'structuredDataJson' => ['default' => '', 'alias' => 'structured_data_json', 'cast' => 'string'], 'menuGroup' => ['default' => 'Servizi', 'alias' => 'menu_group', 'cast' => 'string'],
        'categoryId' => ['default' => null, 'alias' => 'category_id', 'cast' => 'int'], 'menuLabel' => ['default' => '', 'alias' => 'menu_label', 'cast' => 'string'],
        'showInServicesMenu' => ['default' => 1, 'alias' => 'show_in_services_menu', 'cast' => 'int'], 'showRelatedPages' => ['default' => 1, 'alias' => 'show_related_pages', 'cast' => 'int'],
        'sort' => ['default' => 0, 'alias' => 'sort', 'cast' => 'int'], 'isVisible' => ['default' => 1, 'alias' => 'is_visible', 'cast' => 'int'],
        'inSitemap' => ['default' => 1, 'alias' => 'in_sitemap', 'cast' => 'int'], 'robots' => ['default' => 'index, follow', 'alias' => 'robots', 'cast' => 'string'],
    ];

    public function __construct(?int $id = null) { parent::__construct(); $this->loadDefaults(); if ($id) { $this->importFromPrimaryKey($id);} }
    public function getId(){return $this->id;} public function getSlug(){return $this->slug;} public function getTitle(){return $this->title;} public function getMetaTitle(){return $this->metaTitle;} public function getMetaDescription(){return $this->metaDescription;} public function getH1(){return $this->h1;} public function getIntroText(){return $this->introText;} public function getHeroCtaLabel(){return $this->heroCtaLabel;} public function getHeroCtaUrl(){return $this->heroCtaUrl;} public function getMainContent(){return $this->mainContent;} public function getSectionsJson(){return $this->sectionsJson;} public function getFaqJson(){return $this->faqJson;} public function getStructuredDataJson(){return $this->structuredDataJson;} public function getMenuGroup(){return $this->menuGroup;} public function getCategoryId(){return $this->categoryId;} public function getMenuLabel(){return $this->menuLabel;} public function getShowInServicesMenu(){return $this->showInServicesMenu;} public function getShowRelatedPages(){return $this->showRelatedPages;} public function getSort(){return $this->sort;} public function getIsVisible(){return $this->isVisible;} public function getInSitemap(){return $this->inSitemap;} public function getRobots(){return $this->robots;}
    public function getFaqItems(): array { return json_decode($this->faqJson ?? '[]', true) ?: []; }
    public function getSections(): array { return json_decode($this->sectionsJson ?? '[]', true) ?: []; }

    public static function findVisibleByCategory(int $categoryId, ?int $excludePageId = null): array {
        $db = Container::Database(); $query = sprintf("SELECT * FROM seo_landing_page WHERE category_id = %d AND is_visible = 1 AND show_related_pages = 1", $categoryId);
        if (!is_null($excludePageId)) { $query .= sprintf(' AND id <> %d', $excludePageId); }
        $query .= ' ORDER BY sort ASC, id ASC'; return (array)$db->getResults($query);
    }
}
