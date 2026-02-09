<?php

class CrmStageGroup extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'crm_stage_group';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private ?string $label;
    private string  $color;

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

}