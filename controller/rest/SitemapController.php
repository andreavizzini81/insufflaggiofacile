<?php

use \Icamys\SitemapGenerator\Config;
use \Icamys\SitemapGenerator\SitemapGenerator;

class SitemapController extends CliController {

    private const SITE_URL = 'https://www.insufflaggiofacile.it';

    private Config           $config;
    private SitemapGenerator $generator;

    private array $excludedPaths = [
        '/home',
        '/index',
        '/index.html',
        '/index.php',
        '/privacy',
        '/cookie-policy',
        '/thank-you',
        '/admin',
        '/preview',
        '/test',
        '/bozza',
        '/staging'
    ];

    public function generateSitemap() {

        Cli::print('Sitemap generation has started...');

        $this->config = (new Config())
            ->setBaseURL(self::SITE_URL)
            ->setSaveDirectory($this->app->root);

        $this->generator = (new SitemapGenerator($this->config))
            ->setMaxURLsPerSitemap(50000)
            ->setSitemapFileName('sitemap.xml')
            ->setSitemapIndexFileName('sitemap-index.xml');

        $indexedUrls = [];

        Cli::print("\t--> Generating pages entries");

        $this->addPathToSitemap('/', $indexedUrls, 1.0);

        $pageList = new PageList([
            'in_sitemap' => 1
        ], true, Page::class);

        foreach ($pageList->getAll() as $page) {
            if (method_exists($page, 'getUri')) {
                $this->addPathToSitemap((string)$page->getUri(), $indexedUrls, 0.7);
            }
        }

        Cli::print("\t--> Generating products entries");
        $this->addProductEntries($indexedUrls);

        Cli::print("\t--> Generating insufflaggio entries");
        $this->addInsufflaggioEntries($indexedUrls);

        $this->generator->flush();
        $this->generator->finalize();
        $this->generator->updateRobots();

        Cli::print('Sitemap generation completed', true, 'green');
    }

    private function normalizeSitemapPath(string $path): string {
        $trimmedPath = trim($path);

        if ($trimmedPath === '' || $trimmedPath === '/' || $trimmedPath === '/home' || $trimmedPath === '/index') {
            return '/';
        }

        $cleanPath = explode('?', $trimmedPath)[0];
        $cleanPath = explode('#', $cleanPath)[0];
        $cleanPath = preg_replace('/\/+$/', '', $cleanPath) ?? '';

        if ($cleanPath === '') {
            return '/';
        }

        return str_starts_with($cleanPath, '/') ? $cleanPath : sprintf('/%s', $cleanPath);
    }

    private function toAbsoluteUrl(string $path): string {
        $normalizedPath = $this->normalizeSitemapPath($path);

        if ($normalizedPath === '/') {
            return self::SITE_URL . '/';
        }

        return self::SITE_URL . $normalizedPath;
    }

    private function isIndexablePath(string $path): bool {
        $normalizedPath = $this->normalizeSitemapPath($path);

        if (in_array($normalizedPath, $this->excludedPaths, true)) {
            return false;
        }

        foreach (['/admin', '/preview', '/test', '/thank-you', '/bozza', '/staging'] as $excludedFragment) {
            if (str_contains($normalizedPath, $excludedFragment)) {
                return false;
            }
        }

        return true;
    }

    private function addPathToSitemap(string $path, array &$indexedUrls, float $priority): void {
        if (!$this->isIndexablePath($path)) {
            return;
        }

        $absoluteUrl = $this->toAbsoluteUrl($path);

        if (isset($indexedUrls[$absoluteUrl])) {
            return;
        }

        $indexedUrls[$absoluteUrl] = true;

        $this->generator->addURL(
            str_replace(self::SITE_URL, '', $absoluteUrl),
            new DateTime(),
            'always',
            $priority
        );
    }

    private function addProductEntries(array &$indexedUrls): void {
        $productList = new ProductList([], true, Product::class);

        foreach ($productList->getAll() as $product) {
            if (!method_exists($product, 'getId')) {
                continue;
            }

            $productId = (int)$product->getId();
            if ($productId <= 0) {
                continue;
            }

            $this->addPathToSitemap(sprintf('/scheda-prodotto/%d', $productId), $indexedUrls, 0.7);
        }
    }

    private function addInsufflaggioEntries(array &$indexedUrls): void {
        $staticPageList = new StaticPageList([], true, StaticPage::class);

        foreach ($staticPageList->getAll() as $staticPage) {
            if (!method_exists($staticPage, 'getId') || !method_exists($staticPage, 'getTitle')) {
                continue;
            }

            $staticPageId = (int)$staticPage->getId();
            if ($staticPageId <= 0) {
                continue;
            }

            $this->addPathToSitemap(
                $this->buildInsufflaggioPath((string)$staticPage->getTitle(), $staticPageId),
                $indexedUrls,
                0.7
            );
        }
    }

    private function buildInsufflaggioPath(string $title, int $id): string {
        $title = trim($title);
        $encodedTitle = rawurlencode($title !== '' ? $title : 'pagina');
        return sprintf('/insufflaggio/%s/%d', $encodedTitle, $id);
    }
}
