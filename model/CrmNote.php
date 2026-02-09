<?php

class CrmNote extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'crm_note';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private ?string $entity;
    private ?int    $entityId;
    private string  $content;
    private ?string $createdAt;
    private ?string $updatedAt;
    private ?int    $createdById;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' => null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'entity' => [
            'default' => null,
            'alias' => 'entity',
            'cast' => 'string'
        ],
        'entityId' => [
            'default' => null,
            'alias' => 'entity_id',
            'cast' => 'int'
        ],
        'content' => [
            'default' => '',
            'alias' => 'content',
            'cast' => 'string'
        ],
        'createdAt' => [
            'default' => null,
            'alias' => 'created_at',
            'cast' => 'string'
        ],
        'updatedAt' => [
            'default' => null,
            'alias' => 'updated_at',
            'cast' => 'string'
        ],
        'createdById' => [
            'default' => null,
            'alias' => 'created_by_id',
            'cast' => 'int'
        ]
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->loadDefaults();
        if ($id) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getEntity(): ?string {
        return $this->entity;
    }

    public function setEntity(string $entity): self {
        $this->entity = $entity;
        return $this;
    }

    public function getEntityId(): ?int {
        return $this->entityId;
    }

    public function setEntityId(int $entityId): self {
        $this->entityId = $entityId;
        return $this;
    }

    public function getContent(): string {
        return $this->content;
    }

    public function setContent(string $content): self {
        $this->content = $content;
        return $this;
    }

    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): self {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?string {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): self {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getCreatedById(): ?int {
        return $this->createdById;
    }

    public function setCreatedById(int $createdById): self {
        $this->createdById = $createdById;
        return $this;
    }

    public function getUser(): ?User {
        $user = new User($this->createdById);
        if (!$user->exists()) {
            return null;
        }
        return $user;
    }

    private function beforeSave(array &$data) {

        if (is_null($this->createdAt) && !$this->exists) {
            $this->createdAt = date('Y-m-d H:i:s');
        }

        $this->updatedAt = date('Y-m-d H:i:s');
    }

    private function afterExport(&$data) {
        $user = $this->getUser();
        if ($user) {
            $data['user'] = (object)[
                'id' => $user->getId(),
                'name' => sprintf('%s %s', $user->getFirstName(), $user->getLastName())
            ];            
        }
    }

}