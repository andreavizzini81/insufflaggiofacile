<?php

class SeoLandingPageController extends FrontendController {

    public function __invoke(): Response {
        $slug = $this->request->getQueryParam('slug');
        $row = $this->db->getRow("SELECT id FROM seo_landing_page WHERE slug='".$this->db->escape($slug)."' LIMIT 1");

        if (!$row) {
            $this->response->setHeader('Location', '/404');
            return $this->response;
        }

        $id = is_array($row) ? (int)$row['id'] : (int)$row->id;
        $landing = new SeoLandingPage($id);
        if ((int)$landing->getIsVisible() !== 1) {
            $this->response->setHeader('Location', '/404');
            return $this->response;
        }

        $this->data['landing'] = $landing;
        $category = null;
        if (!is_null($landing->getCategoryId())) { $category = new SeoLandingCategory((int)$landing->getCategoryId()); }
        $this->data['seoLandingCategory'] = $category;
        $this->data['relatedSeoLandingPages'] = !is_null($landing->getCategoryId()) ? SeoLandingPage::findVisibleByCategory((int)$landing->getCategoryId(), (int)$landing->getId()) : [];
        $this->data['faqItems'] = $landing->getFaqItems();
        $this->data['sections'] = $landing->getSections();
        $this->description = $landing->getMetaDescription() ?? '';
        $this->title = $landing->getMetaTitle() ?: $landing->getTitle();
        $this->data['structuredDataJsonLd'] = $landing->getStructuredDataJson();

        return $this->renderCustom('seo-landing');
    }

    protected function renderCustom(string $view): Response {
        $this->response->setBody($this->twig->render($view.'.twig', [
            'path' => $this->app->path,
            'theme' => $this->themeUri,
            'page' => $this->page,
            'title' => $this->title,
            'description' => $this->description,
            'canonicalUrl' => $this->getCanonicalUrl(),
            'f_nav' => (new GetFrontendNav())(),
            'links' => $this->links,
            'scripts' => $this->scripts,
            'data' => $this->data,
            'structuredDataJsonLd' => $this->data['structuredDataJsonLd'] ?? null,
        ]));

        return $this->response;
    }
}
