<?php

class AdminPage extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'admin_page';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private ?int    $categoryId;
    private ?string $name;
    private ?string $icon;
    private ?string $view;
    private ?string $url;
    private ?string $filterName;
    private ?bool   $isVisible;
    private ?bool   $isPublic;
    private ?bool   $isDefault;
    private ?bool   $isExternal;
    private ?bool   $isNewPage;
    private ?bool   $hasTopbar;
    private ?bool   $hasPagebar;
    private ?bool   $hasNav;
    private ?int    $sort;
    private array   $userRoles;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' => null, 
            'alias' => 'id', 
            'cast' => 'int'
        ],
        'categoryId' => [
            'default' => null, 
            'alias' => 'id_admin_page_category', 
            'cast' => 'int'
        ],
        'name' => [
            'default' => null, 
            'alias' => 'name', 
            'cast' => 'string'
        ],
        'icon' => [
            'default' => null, 
            'alias' => 'icon', 
            'cast' => 'string'
        ],
        'view' => [
            'default' => null, 
            'alias' => 'view', 
            'cast' => 'string'
        ],
        'url' => [
            'default' => null, 
            'alias' => 'url', 
            'cast' => 'string'
        ],
        'filterName' => [
            'default' => null, 
            'alias' => 'filter', 
            'cast' => 'string'
        ],
        'isExternal' => [
            'default' => false, 
            'alias' => 'is_external', 
            'cast' => 'bool'
        ],
        'isVisible' => [
            'default' => true, 
            'alias' => 'visible', 
            'cast' => 'bool'
        ],
        'isPublic'  => [
            'default' => false, 
            'alias' => 'is_public', 
            'cast' => 'bool'
        ],
        'isDefault' => [
            'default' => false, 
            'alias' => 'is_default', 
            'cast' => 'bool'
        ],
        'isNewPage' => [
            'default' => false, 
            'alias' => 'is_new_page', 
            'cast' => 'bool'
        ],
        'hasTopbar' => [
            'default' => true, 
            'alias' => 'has_topbar', 
            'cast' => 'bool'
        ],
        'hasPagebar' => [
            'default' => true,
            'alias' => 'has_pagebar',
            'cast' => 'bool'
        ],
        'hasNav' => [
            'default' => true, 
            'alias' => 'has_nav', 
            'cast' => 'bool'
        ],
        'sort' => [
            'default' => 100, 
            'alias' => 'sort', 
            'cast' => 'int'
        ],
        'userRoles' => [
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

    public function setId(int $id): self {
        if ($id > 0) {
            $this->id = $id;
            $this->importFromPrimaryKey($id);
        }
        return $this;
    }

    public function getCategoryId() {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): self {
        $this->categoryId = $categoryId;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;
        return $this;
    }

    public function getIcon() {
        return $this->icon;
    }

    public function setIcon(string $icon): self {
        $this->icon = $icon;
        return $this;
    }

    public function getView() {
        return $this->view;
    }

    public function setView(string $view): self {
        $this->view = $view;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url): self {
        $this->url = $url;
        return $this;
    }

    public function getFilterName(): ?string {
        return $this->filterName;
    }

    public function setFilterName(?string $filterName): self {
        $this->filterName = $filterName;
        return $this;
    }

    public function getIsVisible() {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self {
        $this->isVisible = $isVisible;
        return $this;
    }

    public function getIsPublic() {
        return $this->isPublic;
    }

    public function setIsPublic(bool $isPublic): self {
        $this->isPublic = $isPublic;
        return $this;
    }

    public function getIsDefault() {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): self {
        $this->isDefault = $isDefault;
        return $this;
    }

    public function getIsExternal() {
        return $this->isExternal;
    }

    public function setIsExternal(bool $isExternal): self {
        $this->isExternal = $isExternal;
        return $this;
    }

    public function getIsNewPage() {
        return $this->isNewPage;
    }

    public function setIsNewPage(bool $isNewPage): self {
        $this->isNewPage = $isNewPage;
        return $this;
    }

    public function getHasTopbar() {
        return $this->hasTopbar;
    }

    public function setHasTopbar(bool $hasTopbar): self {
        $this->hasTopbar = $hasTopbar;
        return $this;
    }

    public function getHasPagebar() {
        return $this->hasPagebar;
    }

    public function setHasPagebar($hasPagebar): self {
        $this->hasPagebar = $hasPagebar;
        return $this;
    }

    public function getHasNav() {
        return $this->hasNav;
    }

    public function setHasNav(bool $hasNav): self {
        $this->hasNav = $hasNav;
        return $this;
    }

    public function hasFilter(): ?bool {
        return !is_null($this->filterName);
    }

    public function getSort() {
        return $this->sort;
    }

    public function setSort(int $sort): self {
        $this->sort = $sort;
        return $this;
    }

    public function addUserRole(int $role) {
        $this->userRoles[] = $role;
    }

    public function purgeUserRoles() {
        $this->userRoles = [];
    }

    public function getUserRoles() {
        return $this->userRoles;
    }

    public function afterImport($data) {
        if (isset($data->roles) && is_array($data->roles)) {
            $this->userRoles = array_map(fn($id) => (int)$id, $data->roles);
        }
    }

    private function afterDatabaseFetch(&$data) {
        $data->roles = $this->db->selectCol(
            'admin_page_user_role',
            ['user_role'],
            sprintf('admin_page_id = %d', $this->id)
        );
    }

    public function beforeSave() {
        if (!is_null($this->filterName) && trim($this->filterName) == '') {
            $this->filterName = null;
        }
    }

    public function afterSave(int $id) {
        $this->db->delete(
            'admin_page_user_role',
            sprintf('admin_page_id = %d', $id)
        );
        foreach($this->userRoles as $role) {
            $this->db->insert(
                'admin_page_user_role',
                [
                    'admin_page_id' => $id,
                    'user_role' => $role
                ]
            );
        }
    }

}