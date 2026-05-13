<?php
class AdminSeoLandingCategoryPageController extends BackendController { protected string $view='seo_landing_category_page'; public function __invoke(): Response { $id=$this->request->hasQueryParam('id')?(int)$this->request->getQueryParam('id'):null; $this->data['category']=new SeoLandingCategory($id); return $this->render(); } }
