<?php

class AdminPagesPageController extends BackendController {

    protected string $view = 'admin_pages';
    private ?int $categoryId;

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
        $this->categoryId = ($this->request->hasQueryParam('id')) ? $this->request->getQueryParam('id') : null;
    }

    public function __invoke() :Response {
        $adminPageCategory = new AdminPageCategory($this->categoryId);
        $this->page->setName(
            sprintf('Categoria pagine: %s', $adminPageCategory->getName())
        );
        $this->data['pages'] = (array)$this->getPages();
        $this->data['actions'] = $this->getActions();
        return $this->render();
    }

    public function getActions() {
        return [
            new TopbarAction([
                'attributes' => ['href' => sprintf('%sadmin-page?categoryId=%d', $this->path, $this->categoryId)],
                'label' => 'AGGIUNGI PAGINA',
                'icon' => 'plus'
            ])
        ];
    }

    public function getPages() {
        if($this->categoryId <= 0) {
            $this->view = '404';
            return $this->loadPage();
        }
        return array_map(function($pageId) {
            return new AdminPage((int)$pageId);
        }, (array)$this->db->getCol(
            sprintf("SELECT id FROM admin_page WHERE id_admin_page_category = %d ORDER BY sort ASC;", $this->categoryId)
        ));
    }




}

?>