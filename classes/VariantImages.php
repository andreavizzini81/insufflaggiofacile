<?php

class VariantImages extends BaseComponent{

    private const  BASE_URL = 'https://www.quattroruote.it/auto/foto/';
    private string $variant;
    private int    $variantId;
    private string $model;
    private int    $modelId;
    private string $make;
    private string $infocar;
    private string $url;
    public  array  $images;

    public function __construct(?string $infocar = null) {
        parent::__construct();
        if (!is_null($infocar)) {
            $this->setInfocar($infocar);
        }
    }

    public function setInfocar(string $infocar) :self {
        $this->infocar = $infocar;
        $this->getVariantInfo();
        return $this;
    }

    private function getVariantInfo() {
        $vehicle = $this->db->getRow(
            sprintf(
                'SELECT 
                    infocar, 
                    make, 
                    model, 
                    model_id,
                    variant,
                    variant_id
                FROM
                    vehicle
                WHERE 
                    infocar = \'%s\'
                LIMIT 
                    0,1', 
                $this->infocar
            )
        );

        $this->variant = $vehicle->variant;
        $this->model = $vehicle->model;
        $this->make = $vehicle->make;
        $this->variantId = (int)$vehicle->variant_id;
        $this->modelId = (int)$vehicle->model_id;
        $this->infocar = $vehicle->infocar;
        //$this->url = $this->getUrl();
    }

    public function getUrl(){
        $infocarParts = Utils::explodeInfocarAM($this->infocar);
        $data[] = self::BASE_URL;
        $data[] = $this->qrSlugify($this->make);
        $data[] = $this->qrSlugify($this->model);
        $data[] = $this->qrSlugify(str_replace('  ', ' ', $this->variant));
        $data[] = sprintf(
            '%s%s%s', 
            str_pad($infocarParts->idAllestimento, 6, '0', STR_PAD_LEFT), 
            $infocarParts->anno, 
            str_pad($infocarParts->mese, 2, '0', STR_PAD_LEFT)
        );
        return $this->url = vsprintf('%s%s/%s.%s-%s', $data);
    }

    private function qrSlugify($text) {
        $text = strtolower($text);
    
        $conversions = [
            '.' => '',
            ',' => '',
            '&' => '&',
            ' ' => '-',
            '#' => '',
            '/' => '',
            '\'' => '',
            '(' => '',
            ')' => '',
            '+' => ''
        ];
        $text = str_replace(
            array_keys($conversions), 
            array_values($conversions), 
            $text
        );
        $text = Transliterator::create("Any-Latin; Latin-ASCII; [\u0080-\u7fff] remove")->transliterate($text);
        //$text = preg_replace('/-+/', '-', $text);
        return $text;
    }

    public function getImages(string $url, bool $store = false) {
        if (is_null($this->infocar)) {
            return false;
        }
        $this->images = [];
        $context = stream_context_create(
            array(
                'http' => array(
                    'follow_location' => false
                )
            )
        );
        $imagesPage = file_get_contents($url, false, $context);
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        if (!$imagesPage) {
            return $this->images;
        }
        @$dom->loadHTML($imagesPage);
        foreach($dom->getElementsByTagName('img') as $link) {
            if (!$link->hasAttribute('data-srcset')) {
                continue;
            }
            $imageURL = $link->getAttribute('data-srcset');
            if (!preg_match("/^https:\/\/storage.edidomus.it\/.*\/(FOTO_A|webFoto)_16_9_1280\/([\d]{8})\.(JPG|jpg)$/", $imageURL)) {
            //if (!preg_match("/^https:\/\/storage.edidomus.it\/.*\/webFoto_16_9_1280\/([\d]{8})\.(JPG|jpg)$/", $imageURL)) {
                continue;
            }
            $this->images[] = $imageURL;
        }
        if ($store) {
            //$this->store();
        }
        return $this->images;
    }

    public function storeImages(array $images): bool {
        $this->images = $images;
        return $this->store();
    }

    private function store() :bool {
        if (count($this->images) == 0) {
            return false;
        }
        foreach($this->images as $image) {
            $filename = basename(strtolower($image));
            $imageId = (int)str_replace('.jpg', '', $filename);
            $localPath = (string)sprintf(
                '%smedia/vehicle/%s.jpg',
                $this->app->root,
                $imageId
            );
            if (file_exists($localPath) && filesize($localPath) == 0) {
                unlink($localPath);
            }
            if(!file_exists($localPath)) {
                $this->copyFile($image, $localPath);
            }
            $this->db->insert(
                'variant_image', 
                [
                    'infocar' => $this->infocar,
                    'image_id' => $imageId,
                    'variant_id' => $this->variantId,
                    'model_id' => $this->modelId
                ],
                true
            );
        }
        return true;
    }

    private function copyFile($sourceFile, $destFile) {
        $fileContent = file_get_contents($sourceFile);
        $destFileStream = fopen($destFile, 'w');
        $response = (fwrite($destFileStream, $fileContent)) ? true : false;
        fclose($destFileStream);
        return $response;
    }

}
