<?php

class Nav extends BaseComponent {
    
    private ?User      $user;
    private ?Session   $session;
    private ?AdminPage $current;
    private string     $path;

    public function __construct(?AdminPage $adminPage, string $path) {
        parent::__construct();
        $this->session = Container::has('Session') ? Container::Session() : null;
        $this->user = Container::has('User') ? Container::User() : null;
        $this->current = $adminPage;
        $this->path = $path;
    }

    public function __invoke() {
        $data = array();
        if (!$this->user || !$this->user->exists()) {
            return [];
        }
        if (!$this->session || !$this->session->isValid()) {
            return [];
        }
        $authorizedEntries = (array)$this->db->getResults(
            "SELECT 
                admin_page.id AS page_id, 
                admin_page.name AS page_name, 
                admin_page.url AS page_url,
                admin_page.is_external AS page_is_external, 
                admin_page.is_new_page AS page_is_new,
                admin_page.visible AS page_is_visible, 
                admin_page.id_admin_page_category AS category_id, 
                admin_page_category.name AS category_name, 
                admin_page_category.is_link AS category_is_link, 
                admin_page_category.url AS category_url, 
                admin_page_category.is_external AS category_is_external, 
                admin_page_category.icon AS category_icon
            FROM 
                admin_page 
                INNER JOIN admin_page_category ON admin_page.id_admin_page_category = admin_page_category.id 
            WHERE 
                admin_page.id IN (SELECT admin_page_id FROM admin_page_user_role WHERE user_role = {$this->user->getRoleId()}) 
                AND (admin_page.visible = 1 OR admin_page_category.is_link = 1) 
            ORDER BY 
                admin_page_category.sort ASC,
                admin_page.sort ASC,
                admin_page.id ASC"
        );
        foreach($authorizedEntries as $entry) {
            if (!isset($data[$entry->category_id])) {
                $data[$entry->category_id] = new stdClass();
                $data[$entry->category_id]->id = $entry->category_id;
                $data[$entry->category_id]->name = $entry->category_name;
                $data[$entry->category_id]->url = ($entry->category_is_external) ? $entry->category_url : $this->path.$entry->category_url;
                $data[$entry->category_id]->url = ($entry->category_is_link) ? $data[$entry->category_id]->url : 'javascript:void(0);';
                $data[$entry->category_id]->isCurrent = ($this->current->exists() && $entry->category_id == $this->current->getCategoryId());
                $data[$entry->category_id]->icon = $entry->category_icon;
                $data[$entry->category_id]->pages = array();
            }
            if ($entry->page_is_visible) {
                $page = new stdClass();
                $page->id = $entry->page_id;
                $page->name = $entry->page_name;
                $page->url = ($entry->page_is_external) ? $entry->page_url : $this->path.$entry->page_url;
                $page->target = ($entry->page_is_new) ? '_blank' : '_self';
                $page->isCurrent = ($entry->page_id == $this->current->getId());
                $data[$entry->category_id]->pages[] = $page;                
            }
        }
        return $data;
    }
    
}