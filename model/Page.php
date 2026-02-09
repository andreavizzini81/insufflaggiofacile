<?php

class Page extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'page';
    private const PRIMARY_KEY = 'id';    

    private ?int    $id;
    private ?string $title;
    private ?string $description;
    private ?string $metaTitle;
    private ?string $metaDescription;
    private string  $language;
    private string  $uri;
    private string  $robots;
    private ?string $viewName;
    private bool    $isVisible;
    private bool    $inSitemap;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' => null,
            'cast'    => 'int',
            'alias'   => 'id'
        ],
        'title' => [
            'default' => null,
            'cast'    => 'string',
            'alias'   => 'title'
        ],
        'description' => [
            'default' => null,
            'cast'    => 'string',
            'alias'   => 'description'
        ],
        'metaTitle' => [
            'default' => null,
            'cast'    => 'string',
            'alias'   => 'meta_title'
        ],
        'metaDescription' => [
            'default' => null,
            'cast'    => 'string',
            'alias'   => 'meta_description'
        ],
        'language' => [
            'default' => 'it',
            'cast'    => 'string',
            'alias'   => 'language'
        ],
        'uri' => [
            'default' => '',
            'cast'    => 'string',
            'alias'   => 'uri'
        ],
        'robots' => [
            'default' => 'index, follow',
            'cast'    => 'string',
            'alias'   => 'robots'
        ],
        'viewName' => [
            'default' => null,
            'cast'    => 'string',
            'alias'   => 'view'
        ],
        'isVisible' => [
            'default' => true,
            'cast'    => 'bool',
            'alias'   => 'is_visible'
        ],
        'inSitemap' => [
            'default' => false,
            'cast' => 'bool',
            'alias' => 'in_sitemap'
        ]
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->loadDefaults();
        if (!is_null($id)) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function importFromUri(string $uri, string $lang = 'it') {
        $pageId = $this->db->selectOne(
            'page',
            ['id'],
            new DatabaseWhere([
                sprintf('uri = \'%s\'', $this->db->escape($uri)),
                sprintf('language = \'%s\'', $this->db->escape(strtolower($lang)))
            ], 'AND')
        );
        if (is_null($pageId)) {
            return false;
        }
        $this->importFromPrimaryKey($pageId);
        return $this;
    }

    public function render() :Response {
        $response = new Response();
        $response->setStatusCode(404);
        $response->setBody('PAGE NOT FOUND !');
        return $response;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function getMetaTitle() {
        return $this->metaTitle;
    }

    public function setMetaTitle($metaTitle) {
        $this->metaTitle = $metaTitle;
        return $this;
    }

    public function getMetaDescription() {
        return $this->metaDescription;
    }

    public function setMetaDescription($metaDescription) {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    public function getViewName() {
        return $this->viewName;
    }

    public function setViewName($viewName) {
        $this->viewName = $viewName;
        return $this;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function setLanguage($language) {
        $this->language = $language;
        return $this;
    }

	public function getUri(): string {
		return $this->uri;
	}

	public function setUri(string $uri): self {
		$this->uri = $uri;
		return $this;
	}

    public function getRobots() {
        return $this->robots;
    }

    public function setRobots($robots) {
        $this->robots = $robots;
        return $this;
    }

    public function isVisible() {
        return $this->isVisible;
    }

    public function setVisibility(bool $isVisible) {
        $this->isVisible = $isVisible;
        return $this;
    }

	public function getInSitemap(): bool {
		return $this->inSitemap;
	}
	
	public function setInSitemap(bool $inSitemap): self {
		$this->inSitemap = $inSitemap;
		return $this;
	}

}