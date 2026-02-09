<?php

class AdminPageCategoriesPageController extends BackendController {

    protected string $view = 'admin_page_categories';

    public function __invoke() :Response {
        $this->data['categories'] = (array)$this->getCategories();
        $this->data['actions'] = $this->getActions();
        return $this->render();
    }

    public function getActions() {
        return [
            new TopbarAction([
                'attributes' => ['href' => sprintf('%sadmin-page-category', $this->path)],
                'label' => 'AGGIUNGI CATEGORIA',
                'icon' => 'plus'
            ])
        ];
    }

    public function getCategories() {
        return $this->db->getResults("SELECT * FROM admin_page_category ORDER BY sort ASC;");
    }

}

?>