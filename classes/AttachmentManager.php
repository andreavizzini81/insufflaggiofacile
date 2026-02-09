<?php

abstract class AttachmentManager {
    protected $db;
    protected $app;
    protected $file;
    protected $data;
    protected $attachment;
    protected $uuid;

    public function __construct(?string $uuid = null, ?array $data = null, ?object $file = null ) {
        $this->db = Container::get('Database');
        $this->app = Container::get('App');
        if($file != null) {
           $this->file = ($file != null) ? $file : null; 
        }
        if($data != null) {
            $this->data = ($data != null) ? $data : null;
        }
        $this->attachment = new Attachment(null);
        $this->uuid = ($uuid != null) ? $uuid : Utils::guid();
    }

    public function saveDbAttachment(string $uuid) {
        $this->attachment->setUuid($uuid);
        $this->attachment->setTitle($this->file->getName()); 
        $this->attachment->setMimeType($this->file->getMimeType());
        $this->attachment->setMetadata(json_encode($this->file));
        $date = new DateTime('now');
        $this->attachment->setCreatedAt((string) $date->format('Y-m-d H:i:s'));
        $this->attachment->import((object)$this->getData());
        $attachmentSave = $this->attachment->save();
        if ($attachmentSave === false) { 
            return false;
        }
        return true;
    }

    public function saveFile($uuid) {
        $filePath = sprintf('%smedia/uploads/%s', ROOT, $uuid);
        if (!$this->file->moveTo($filePath)) {
            return false;
        }
        if ($this->file->getExtension() === 'pdf') {
            $preview_path = sprintf('%s.%s', $filePath, 'jpg');
            $imagick = new Imagick();
            $imagick->readImage($filePath.'[0]');
            $imagick->transformImageColorspace(\Imagick::COLORSPACE_SRGB);
            $imagick->setImageBackgroundColor('white');
            $imagick->setImageAlphaChannel(\Imagick::ALPHACHANNEL_REMOVE);
            $imagick->mergeImageLayers(\Imagick::LAYERMETHOD_FLATTEN);
            $imagick->cropThumbnailImage(320, 320);
            $imagick->writeImage($preview_path);
            $imagick->clear(); 
            $imagick->destroy();  
        }
        return true;
    }

    public function deleteDbAttachment(string $uuid) {
        $attachmentModel = new Attachment($uuid);
        if (!$attachmentModel->exists()) {
            return false;
        }
        $result = $this->db->delete('attachment', sprintf('uuid = \'%s\'', $uuid));
        if (!$result) {
            return false;
        }
        return true;
    } 

    public function deleteFile(string $uuid) {
        $filePath = sprintf('%smedia/uploads/%s', ROOT, $uuid);
        unlink($filePath);
        if(file_exists(sprintf('%s.jpg',$filePath))) {
            unlink(sprintf('%s.jpg',$filePath));
        }
        return true;
    }

    public function getUuid() {
        return $this->uuid;
    }

    private function getData() {
        return $this->data;
    }

}