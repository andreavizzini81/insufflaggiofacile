<?php

class Setting extends BaseComponent {

    use DatabaseObjectMapper;
	private const ENTITY_TABLE = 'setting';
    private const PRIMARY_KEY  = 'name';

    private ?string $name;
    private mixed   $value;
    private ?string $label;
    private ?string $category;
    private ?string $parseAs;

    private const VALID_PARSE_TYPE = [
        'int',
        'float',
        'string',
        'bool',
        'json'
    ];

    private const PROPERTIES_MAP = [
        'name' => [
            'default' => null, 
            'alias' => 'name', 
            'cast' => 'string'
        ],
		'value' => [
            'default' => null, 
            'alias' => 'value', 
            'cast' => 'string'
        ],
		'label' => [
            'default' => null, 
            'alias' => 'label', 
            'cast' => 'string'
        ],
        'category' => [
            'default' => null, 
            'alias' => 'category', 
            'cast' => 'string'
        ],
		'parseAs' => [
            'default' => null, 
            'alias' => 'parse_as', 
            'cast' => 'string'
        ]
    ];

    public function __construct(?string $key = null) {
        parent::__construct();
        $this->loadDefaults();
        if (!is_null($key) && trim($key) != '') {
            $this->importFromPrimaryKey($key);
        }
    }

    public function setName(string $name) {
        if (trim($name) == '') {
            throw new Exception('Setting name cannot be empty');
        }
        $this->name = $name;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value) :self {
        $this->value = $value;
        return $this;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setLabel($label) :self {
        $this->label = $label;
        return $this;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategory($category) :self {
        $this->category = $category;
        return $this;
    }

    public function getParseAs() {
        return $this->parseAs;
    }

    public function setParseAs(string $parseAs) :self {
        if (!in_array($parseAs, self::VALID_PARSE_TYPE)) {
            throw new InvalidArgumentException('Parse type is not valid');
        }
        $this->parseAs = $parseAs;
        return $this;
    }

    private function afterImport() {
        $this->value = self::parseValue($this->parseAs, $this->value);
    }

    private function beforeSave() {
        $this->value = self::prepareValue($this->parseAs, $this->value);
    }

    private static function parseValue(string $parseAs, string $value) :mixed {
        switch($parseAs) {
            case 'integer':
                return (int)$value;
            case 'string':
                return $value;
            case 'float':
                return (float)$value;
            case 'boolean':
                return (bool)$value;
            case 'json':
                return json_decode($value);
            default:
                return null;
        }
    }

    private static function prepareValue(string $parseAs, mixed $value) :?string {
        switch($parseAs) {
            case 'integer':
            case 'string':
            case 'float':
                return (string)$value;
            case 'boolean':
                return ($value) ? '1' : '0';
            case 'json':
                return json_encode($value);
            default:
                return null;
        }
    }
}

?>