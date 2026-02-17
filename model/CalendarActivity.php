<?php

class CalendarActivity extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;

    private const ENTITY_TABLE = 'calendar_activity';
    private const PRIMARY_KEY = 'id';

    private ?int $id;
    private string $activity;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' => null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'activity' => [
            'default' => '',
            'alias' => 'activity',
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

    public function getActivity(): string {
        return $this->activity;
    }

    public function setActivity(string $activity): self {
        $this->activity = $activity;
        return $this;
    }

}
