<?php
class AdminSeoLandingCategoryListPageController extends BackendController { protected string $view='seo_landing_category_list'; public function __invoke(): Response { $this->data['list']=SeoLandingCategory::findAllForAdmin(); return $this->render(); } }
