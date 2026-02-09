<?php

class AdminPageCategoryPageController extends BackendController {
    
    protected string $view = 'admin_page_category';

    public function __invoke(): Response {

        $category = new AdminPageCategory($this->request->getQueryParam('id'));
        $this->data['category'] = $category;

        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => [
                    'class' => 'action submit'
                ],
                'label' => 'SALVA'
            ])
        ];
        if ($category->exists()) {
            $this->data['actions'][] = new TopbarAction([
                'attributes' => [
                    'class' => 'delete-category danger',
                    'data-id' => $category->getId()
                ],
                'label' => 'ELIMINA'
            ]);
        }
        
        return $this->render();
    }

}