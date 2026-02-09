<?php

class CrmStage extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'crm_stage';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private ?string $label;
    private string  $color;
    private ?string $entity;
    private ?int    $groupId;
    private bool    $isWon;
    private bool    $isLost;
    private bool    $isDefault;
    private int     $position;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' => null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'label' => [
            'default' => null,
            'alias' => 'label',
            'cast' => 'string'
        ],
        'color' => [
            'default' => 'black',
            'alias' => 'color',
            'cast' => 'string'
        ],
        'entity' => [
            'default' => null,
            'alias' => 'entity',
            'cast' => 'string'
        ],
        'groupId' => [
            'default' => null,
            'alias' => 'group_id',
            'cast' => 'int'
        ],
        'isWon' => [
            'default' => false,
            'alias' => 'is_won',
            'cast' => 'bool'
        ],
        'isLost' => [
            'default' => false,
            'alias' => 'is_lost',
            'cast' => 'bool'
        ],
        'isDefault' => [
            'default' => false,
            'alias' => 'is_default',
            'cast' => 'bool'
        ],
        'position' => [
            'default' => 0,
            'alias' => 'position',
            'cast' => 'int'
        ]
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->loadDefaults();
        if (!is_null($id)) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getLabel(): ?string {
        return $this->label;
    }

    public function setLabel(?string $label): self {
        $this->label = $label;
        return $this;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function setColor(string $color): self {
        $this->color = $color;
        return $this;
    }

    public function getEntity(): ?string {
        return $this->entity;
    }

    public function setEntity(?string $entity): self {
        $this->entity = $entity;
        return $this;
    }

    public function getGroupId(): ?int {
        return $this->groupId;
    }

    public function setGroupId(?int $groupId): self {
        $this->groupId = $groupId;
        return $this;
    }

    public function getGroup(): ?CrmStageGroup {
        return $this->groupId ? new CrmStageGroup($this->groupId) : null;
    }

    public function isWon(): bool {
        return $this->isWon;
    }

    public function setIsWon(bool $isWon): self {
        $this->isWon = $isWon;
        return $this;
    }

    public function isLost(): bool {
        return $this->isLost;
    }

    public function setIsLost(bool $isLost): self {
        $this->isLost = $isLost;
        return $this;
    }

    public function isDefault(): bool {
        return $this->isDefault;
    }

    public function setIsDefault(bool $isDefault): self {
        $this->isDefault = $isDefault;
        return $this;
    }

    public function isFinal(): bool {
        return $this->isWon || $this->isLost;
    }

    public function getPosition(): int {
        return $this->position;
    }

    public function setPosition(int $position): self {
        $this->position = $position;
        return $this;
    }

    public function afterExport(array &$data): void {
        $data['isFinal'] = $this->isFinal();
        $data['group'] = $this->getGroup();
    }

}