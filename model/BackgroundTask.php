<?php

class BackgroundTask extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'background_task';
    private const PRIMARY_KEY = 'id';
    public  const DEFAULT_PRIORITY = 3;

    private ?int     $id;
    private string   $class;
    private ?string  $method;
    private int      $priority;
    private mixed    $metadata;
    private ?string  $createdAt;
    
    private const PROPERTIES_MAP = [
        'id' => [
            'default' => null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'class' => [
            'default' => '',
            'alias' => 'class',
            'cast' => 'string'
        ],
        'method' => [
            'default' => null,
            'alias' => 'method',
            'cast' => 'string'
        ],
        'priority' => [
            'default' => 3,
            'alias' => 'priority',
            'cast' => 'int'
        ],
        'metadata' => [
            'default' => [],
            'alias' => null,
            'cast' => 'array'
        ],
        'createdAt' => [
            'default' => null,
            'alias' => 'created_at',
            'cast' => 'string'
        ]
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->priority = BackgroundTask::DEFAULT_PRIORITY;
        $this->loadDefaults();
        if ($id) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getClass(): string {
        return $this->class;
    }

    public function setClass(string $class): self {
        $this->class = $class;
        return $this;
    }

    public function getMethod(): string {
        return $this->method;
    }

    public function setMethod(string $method): self {
        $this->method = $method;
        return $this;
    }

    public function getPriority(): int {
        return $this->priority;
    }

    public function setPriority(int $priority): self {
        $this->priority = ($priority < 0 || $priority > 5) ? BackgroundTask::DEFAULT_PRIORITY : $priority;
        return $this;
    }

    public function getMetadata(): mixed {
        return $this->metadata;
    }

    public function setMetadata(array $metadata): self {
        $this->metadata = $metadata;
        return $this;
    }

    public function hasMetadataEntry($key): bool {
        return isset($this->metadata[$key]);
    }

    public function getMetadataEntry($key): mixed {
        return isset($this->metadata[$key]) ? $this->metadata[$key] : null;
    }

    public function setMetadataEntry(string $key, mixed $value): self {
        $this->metadata[$key] = $value;
        return $this;
    }

    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }

    private function afterImport($data) {

        if (
            isset($data->metadata) && 
            ($metadata = json_decode($data->metadata, true)) && 
            $metadata !== false
        ) {
            $this->metadata = $metadata;
        }

    }

    private function beforeSave(array &$data) {

        // Creation date
        if (is_null($this->createdAt) && !$this->exists) {
            $this->createdAt = date('Y-m-d H:i:s');
        }

        // Metadata serialization
        $data['metadata'] = json_encode($this->metadata);
    }

    public function execute(): mixed {
        if (!$this->exists) {
            throw new Exception('Cannot execute a non persisted background task');
        }
        if (!class_exists($this->class)) {
            throw new Exception(
                sprintf('%s class does not exists', $this->class)
            );
        }
        if (is_null($this->method)) {
            if (!is_callable($this->class)) {
                throw new Exception(
                    sprintf('%s class is not callable', $this->class)
                );
            } 
        } else {
            if (!method_exists($this->class, $this->method)) {
                throw new Exception(
                    sprintf('%s::%s class method does not exists', $this->class, $this->method)
                );
            }
        }
        $instance = new $this->class;
        $result = ($this->method) ? $instance->{$this->method}($this->metadata) : $instance($this->metadata);

        return $result;
    }

}