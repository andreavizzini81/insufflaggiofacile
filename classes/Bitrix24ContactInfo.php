<?php

class Bitrix24ContactInfo extends Bitrix24Entity implements JsonSerializable {

    protected ?int    $id;
    protected string  $value;
    protected string  $kind;
    protected string  $type;

    private const TYPE_ENUM = [
        'PHONE', 'EMAIL', 'WEB', 'IM'
    ];

    private const KIND_ENUM = [
        'PHONE' => [
            'WORK', 
            'HOME', 
            'PAGER', 
            'FAX', 
            'MOBILE', 
            'MAILING', 
            'OTHER'
        ],
        'EMAIL' => [
            'WORK', 
            'HOME', 
            'MAILING', 
            'OTHER'
        ],
        'WEB' => [
            'WORK', 
            'HOME', 
            'FACEBOOK', 
            'VK', 
            'LIVEJOURNAL', 
            'TWITTER', 
            'OTHER'
        ],
        'IM' => [
            'FACEBOOK', 
            'TELEGRAM', 
            'VK', 
            'SKYPE', 
            'VIBER', 
            'INSTAGRAM', 
            'BITRIX24', 
            'OPENLINE', 
            'IMOL', 
            'ICQ', 
            'MSN', 
            'JABBER', 
            'OTHER'
        ]
    ];
    
    protected array $propertiesMap = [
        'id' => [
            'alias' => 'ID',
            'cast' => 'int',
            'default' => null,
            'isArray' => false,
            'type' => 'fields'
        ],
        'value' => [
            'alias' => 'VALUE',
            'cast' => 'string', 
            'default' => '', 
            'isArray' => false, 
            'type' => 'fields'
        ],
        'kind'  => [
            'alias' => 'VALUE_TYPE', 
            'cast' => 'string', 
            'default' => 'WORK', 
            'isArray' => false, 
            'type' => 'fields'
        ],
        'type'  => [
            'alias' => 'TYPE_ID', 
            'cast' => 'string', 
            'default' => 'EMAIL', 
            'isArray' => false, 
            'type' => 'fields'
        ]
    ];

    public function __construct(?object $data = null) {
        $this->loadDefaults();
        if (!is_null($data)) {
            $this->import($data);
        }
    }

    public function setId(?int $id) {
        if (!is_null($id) && $id <= 0) {
            throw new UnexpectedValueException('ID must be numeric');
        }
        $this->id = $id;
        return $this;
    }

    public function setValue(string $value) {
        $this->value = $value;
        return $this;
    }

    public function setType(string $type) {
        if (!in_array($type, self::TYPE_ENUM)) {
            throw new UnexpectedValueException('Invalid type');
        }
        $this->type = $type;
        return $this;
    }

    public function setKind(string $kind) {
        if (!in_array($kind, self::KIND_ENUM[$this->type])) {
            throw new UnexpectedValueException('Invalid kind');
        }
        $this->kind = $kind;
        return $this;
    }

    public function getId() {
        return $this->id;
    }

    public function getValue() {
        return $this->value;
    }

    public function getType() {
        return $this->type;
    }

    public function getKind() {
        return $this->kind;
    }

    public function export(bool $forBitrix24 = false) {
        $data = new stdClass();
        foreach($this->propertiesMap as $propertyName => $propertyData) {
            if ($forBitrix24 && is_null($this->{$propertyName})) {
                continue;
            }
            $key = $forBitrix24 ? $this->propertiesMap[$propertyName]['alias'] : $propertyName;
            $data->{$key} = $this->{$propertyName};
        }
        return $data;
    }

    public function jsonSerialize(): mixed {
        return $this->export();
    }

}