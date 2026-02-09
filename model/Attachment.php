<?php 
 
abstract class Attachment extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    protected const ENTITY_TABLE = 'attachment';
    protected const PRIMARY_KEY = 'uuid';

    protected ?string $uuid;
    protected string  $entity;
    protected ?int    $entityId;
    protected ?string $entityCategory;
    protected string  $title;
    protected ?string $type;
    protected ?string $mimeType;
    protected string  $createdAt;
    protected int     $position;

    protected ?string $origin = null;

    protected const PROPERTIES_MAP = [
        'uuid' => [
            'default' => null,
            'alias' => 'uuid',
            'cast' => 'string'
        ],
        'entity' => [
            'default' => '',
            'alias' => 'entity',
            'cast' => 'string'
        ],        
        'entityId' => [
            'default' => null,
            'alias' => 'entity_id',
            'cast' => 'int'
        ],
        'entityCategory' => [
            'default' => null,
            'alias' => 'entity_category',
            'cast' => 'string'
        ],
        'title' => [
            'default' => '',
            'alias' => 'title',
            'cast' => 'string'
        ],
        'type' => [
            'default' => null,
            'alias' => 'type',
            'cast' => 'string'
        ],
        'mimeType' => [
            'default' => '',
            'alias' => 'mime_type',
            'cast' => 'string'
        ],
        'createdAt' => [
            'default' => '',
            'alias' => 'created_at',
            'cast' => 'string'
        ],
        'position' => [
            'default' => 0,
            'alias' => 'position',
            'cast' => 'int'
        ]
    ];

    public function __construct(?string $uuid = null) {
        parent::__construct();
        $this->loadDefaults();
        $this->type = static::class;
        if ($uuid) {
            $this->importFromPrimaryKey($uuid);
        }
    }

    public function getUuid() {
        return $this->uuid;
    }

    public function getEntity() {
        return $this->entity;
    }

    public function setEntity($entity) {
        $this->entity = $entity;
        return $this;
    }

    public function getEntityId() {
        return $this->entityId;
    }

    public function setEntityId($entityId) {
        $this->entityId = $entityId;
        return $this;
    }

    public function getEntityCategory() {
        return $this->entityCategory;
    }

    public function setEntityCategory($entityCategory) {
        $this->entityCategory = $entityCategory;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function getMimeType() {
        return $this->mimeType;
    }

    public function setMimeType($mimeType) {
        $this->mimeType = $mimeType;
        return $this;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getPosition() {
        return $this->position;
    }

    public function setPosition($position) {
        $this->position = $position;
        return $this;
    }

    protected function beforeSave(array &$data) {
        if (!$this->exists && !is_null($this->origin)) {
            if (!array_key_exists($this->mimeType, static::MIME_TYPES)) {
                throw new Exception('Invalid file format');
            }

            $this->createdAt = date('Y-m-d H:i:s');
            $this->uuid = Utils::guid();

            $destination = sprintf('%s/%s', ROOT, static::PATH);

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $destinationFileName = sprintf(
                '%s/%s.%s', 
                $destination, 
                $this->uuid,
                static::MIME_TYPES[$this->mimeType]
            );
            copy($this->origin, $destinationFileName);
            if (method_exists($this, 'afterFileCopy')) {
                $this->afterFileCopy($destinationFileName);
            }
        }
    }

    protected function afterExport(&$data) {
        $data['uri'] = $this->getURI();
        $data['extension'] = Utils::getExtensionFromMimeType($this->mimeType);
    }

    protected function beforeDelete() {
        /*
        $images = array_merge(
            glob(sprintf('%s/%s%s.*', ROOT, $this->uuid)),
            glob(sprintf('%s/media/product/images/thumbs/%s*', ROOT, $this->uuid))
        );
        foreach($images as $image) {
            unlink($image);
        }
        */
        try {
            unlink($this->getPath());
        } catch(Exception $ex) {
            error_log('Exception during attachment delete');
            error_log(json_encode($ex));
        }
    }

    public function getPath() {
        if (!$this->exists) {
            return null;
        }
        return sprintf('%s/%s%s.%s', ROOT, static::PATH, $this->uuid, static::MIME_TYPES[$this->mimeType]);
    }

    public function getURI() {
        if (!$this->exists) {
            return null;
        }
        return sprintf('%s%s%s.%s', $this->app->path, static::PATH, $this->uuid, static::MIME_TYPES[$this->mimeType]);
    }

    public function fromOrigin(string $origin) {
        $realPath = realpath($origin);
        if ($realPath === false || !file_exists($realPath) || !is_file($realPath)) {
            throw new Exception('Invalid origin file');
        }
        $mimeType = mime_content_type($realPath);
        if ($mimeType === false) {
            throw new Exception('Cannot detect mime type of the origin file');
        }
        if (!array_key_exists($mimeType, static::MIME_TYPES)) {
            throw new Exception('Invalid origin file format');
        }
        $fileInfo = pathinfo($realPath);
        $this->title = $fileInfo['basename'];
        $this->mimeType = $mimeType;
        $this->origin = $realPath;
        return $this;
    }

    public function fromUploadedFile(UploadedFile $file) {
        if (!array_key_exists($file->getMimeType(), static::MIME_TYPES)) {
            throw new Exception(sprintf('Invalid uploaded file format: %s', $file->getMimeType()));
        }
        $this->title = $file->getName();
        $this->mimeType = $file->getMimeType();
        $this->origin = $file->getTmpName();
        return $this;
    }

}