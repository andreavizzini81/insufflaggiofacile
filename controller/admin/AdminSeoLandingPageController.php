<?php

class AdminSeoLandingPageController extends BackendController {

    protected string $view = 'seo_landing_page';

    public function __invoke(): Response {
        $id = ($this->request->hasQueryParam('id')) ? (int)$this->request->getQueryParam('id') : null;
        $landing = new SeoLandingPage($id);

        if (!is_null($id) && !$landing->exists()) {
            $this->response->setStatusCode(404);
            $this->view = '404';
            $this->loadPage();
        }

        $this->data['landing'] = $landing;
        $this->data['categories'] = SeoLandingCategory::findAllForAdmin();
        $this->data['actions'] = [
            new TopbarAction([
                'attributes' => ['class' => 'save-seo-landing success'],
                'label' => 'SALVA LANDING SEO',
                'icon' => 'check'
            ])
        ];

        return $this->render();
    }
}
