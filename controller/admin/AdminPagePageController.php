<?php

class AdminPagePageController extends BackendController {

    protected string $view = 'admin_page';
    private ?AdminPage $target;

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
        $this->targetId = ($this->request->hasQueryParam('id')) ? $this->request->getQueryParam('id') : null;
        $this->target = new AdminPage($this->targetId);
    }

    public function __invoke() :Response {
        $this->data['page'] = $this->target;
        $this->data['categoryId'] = ($this->target->exists()) 
            ? $this->target->getCategoryId() 
            : $this->request->getQueryParam('categoryId');
        $this->data['actions'] = $this->getActions();
        $this->data['categories'] = $this->getCategories();
        return $this->render();
    }

    private function getCategories() {
        return $this->db->selectAll('admin_page_category', ['id', 'name']);
    }

    private function getActions() {
        if (!$this->target->exists()) {
            return [];
        }
        return [
            new TopbarAction([
                'attributes' => [
                    'class' => 'delete-page danger',
                    'data-id' => $this->target->getId(),
                    'data-category-id' => $this->target->getCategoryId()
                ],
                'label' => 'ELIMINA PAGINA',
                'icon' => 'trash'
            ])
        ];   
    }


}






?>