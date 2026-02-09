<?php

use \Icamys\SitemapGenerator\Config;
use \Icamys\SitemapGenerator\SitemapGenerator;

class SitemapController extends CliController {

    private Config           $config;
    private SitemapGenerator $generator;

    public function generateSitemap() {

        Cli::print('Sitemap generation has started...');

        $this->config = (new Config())
            ->setBaseURL('https://www.rentalness.com/')
            ->setSaveDirectory($this->app->root);

        $this->generator = (new SitemapGenerator($this->config))
            ->setMaxURLsPerSitemap(50000)
            ->setSitemapFileName("sitemap.xml")
            ->setSitemapIndexFileName("sitemap-index.xml");

        Cli::print("\t--> Generating pages entries");
        // Home
        $this->generator->addURL(
            '/', 
            new DateTime(), 
            'always', 
            0.5
        );

        // Pagine
        $pageList = new PageList([
            'in_sitemap' => 1
        ], true, Page::class);

        foreach($pageList->getAll() as $page) {
            $this->generator->addURL(
                sprintf('/%s', $page->getUri()), 
                new DateTime(), 
                'always', 
                0.7
            );
        }

        Cli::print("\t--> Generating blog entries");
        // Categorie blog
        $blogCategoryList = new BlogCategoryList(
            [], true, BlogCategory::class
        );

        foreach($blogCategoryList->getAll() as $blogCategory) {
            $this->generator->addURL(
                sprintf('/%s', $blogCategory->getPermalink()), 
                new DateTime(), 
                'always', 
                0.5
            );
        }

        // Articoli blog
        $blogArticleList = new BlogArticleList(
            [], true, BlogArticle::class
        );

        foreach($blogArticleList->getAll() as $blogArticle) {
            $this->generator->addURL(
                sprintf('/%s', $blogArticle->getPermalink()), 
                new DateTime(), 
                'always', 
                0.5
            );
        }

        Cli::print("\t--> Generating vehicles entries");
        // Veicoli
        $vehicleList = new VehicleList([
            'active' => 1
        ], true, Vehicle::class);

        foreach($vehicleList->getAll() as $vehicle) {
            $this->generator->addURL(
                sprintf('/%s', $vehicle->getURI()), 
                new DateTime(), 
                'always', 
                0.5
            );
        }

        $this->generator->flush();
        $this->generator->finalize();
        $this->generator->updateRobots();

        Cli::print('Sitemap generation completed', true, 'green');
    }

}