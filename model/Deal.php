<?php

class Deal extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper, StageableEntity, AnnotableEntity, EventableEntity;
    private const ENTITY_TABLE = 'deal';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private string  $type = 'GenericDeal';
    private ?string $createdAt;
    private ?string $updatedAt;
    private ?int    $contactId;
    private ?int    $stageId;
    private ?int    $responsibleId;
    private ?int    $createdById;
    private ?int    $agencyId;
    private ?string $title;
    private ?string $message;
    private ?float  $value;
    private mixed   $metadata;
    
    private const PROPERTIES_MAP = [
        'id' => [
            'default' => null,
            'alias' => 'id',
            'cast' => 'int'
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
        'contactId' => [
            'default' => null,
            'alias' => 'contact_id',
            'cast' => 'int'
        ],
        'stageId' => [
            'default' => null,
            'alias' => 'stage_id',
            'cast' => 'int'
        ],
        'responsibleId' => [
            'default' => null,
            'alias' => 'responsible_id',
            'cast' => 'int'
        ],
        'createdById' => [
            'default' => null,
            'alias' => 'created_by_id',
            'cast' => 'int'
        ],
        'agencyId' => [
            'default' => null,
            'alias' => 'agency_id',
            'cast' => 'int'
        ],
        'title' => [
            'default' => null,
            'alias' => 'title',
            'cast' => 'string'
        ],
        'message' => [
            'default' => null,
            'alias' => 'message',
            'cast' => 'string'
        ],
        'value' => [
            'default' => null,
            'alias' => 'value',
            'cast' => 'float'
        ],
        'metadata' => [
            'default' => [],
            'alias' => null,
            'cast' => 'array'
        ]
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->loadDefaults();
        $this->setStageId(
            $this->getDefaultStageId()
        );
        if ($id) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?string $updatedAt): self {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    
    public function getType(): string {
        return $this->type;
    }

    public function setType(string $type): self {
        $this->type = $type;
        return $this;
    }

    public function getContactId(): ?int {
        return $this->contactId;
    }

    public function setContactId(?int $contactId): self {
        $this->contactId = $contactId;
        return $this;
    }

    public function getResponsibleId(): ?int {
        return $this->responsibleId;
    }

    public function setResponsibleId(?int $responsibleId): self {
        $this->responsibleId = $responsibleId;
        return $this;
    }

    public function getCreatedById(): ?int {
        return $this->createdById;
    }

    public function setCreatedById(?int $createdById): self {
        $this->createdById = $createdById;
        return $this;
    }

    public function getAgencyId(): ?int {
        return $this->agencyId;
    }

    public function setAgencyId(?int $agencyId): self {
        $this->agencyId = $agencyId;
        return $this;
    }

    public function getTitle(): ?string {
        return $this->title;
    }

    public function setTitle(?string $title): self {
        $this->title = $title;
        return $this;
    }
	
	public function getValue(): ?string {
        return $this->value;
    }

    public function setValue(?string $value): self {
        $this->value = $value;
        return $this;
    }

    public function getMessage(): ?string {
        return $this->message;
    }

    public function setMessage(?string $message): self {
        $this->message = $message;
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

    public function getAgency(): ?Agency {
        if (!$this->exists || is_null($this->agencyId)) {
            return null;
        }
        $agency = new Agency($this->agencyId);
        return $agency->exists() ? $agency : null;
    }

    public function getResponsible(): ?User {
        if (!$this->exists || is_null($this->responsibleId)) {
            return null;
        }
        $responsible = new User($this->responsibleId);
        return $responsible->exists() ? $responsible : null;
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

        // Default stage
        if (is_null($this->stageId) && !$this->exists) {
            $this->stageId = $this->getDefaultStageId();
        }

        // Creation date
        if (is_null($this->createdAt) && !$this->exists) {
            $this->createdAt = date('Y-m-d H:i:s');
        }

        // Last update
        $this->updatedAt = date('Y-m-d H:i:s');
        
        // Metadata serialization
        $data['metadata'] = json_encode($this->metadata);
    }

    public function canBeManagedByUser(User $user): bool {
        if (!$this->exists || is_null($this->agencyId)) {
            // Non esiste ancora, quindi gestibile da chiunque.
            return true;
        }
        return in_array(
            $this->agencyId, 
            $user->getAuthorizedAgenciesId()
        );
    }

}