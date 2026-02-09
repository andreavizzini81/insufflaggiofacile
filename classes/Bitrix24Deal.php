<?php

class Bitrix24Deal extends Bitrix24Entity {

    protected ?int    $id;
    protected ?int    $contactId;
    protected string  $title;
    protected ?string $stageId;
    protected string  $sourceId;
    protected float   $value;
    protected string  $notes;
    protected ?int    $responsibleId;
    protected ?int    $pipelineId;
    protected string  $typeId;
    protected string  $currency;
    protected bool    $isOpen;
    protected bool    $regSonetEvent;
    protected Bitrix24Gateway $gateway;

    protected const CUSTOM_FIELDS_ID = 'deal';

    protected array $propertiesMap = [
        'id' => [
            'alias' => 'ID', 
            'cast' => 'int', 
            'default' => null, 
            'isArray' => false, 
            'group' => null, 
            'isCustomField' => false
        ],
        'contactId' => [
            'alias' => 'CONTACT_ID', 
            'cast' => 'int', 
            'default' => null, 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'title' => [
            'alias' => 'TITLE', 
            'cast' => 'string', 
            'default' => '', 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'stageId' => [
            'alias' => 'STAGE_ID', 
            'cast' => 'string', 
            'default' => null, 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'sourceId' => [
            'alias' => 'SOURCE_ID', 
            'cast' => 'string', 
            'default' => 'WEB', 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'value' => [
            'alias' => 'OPPORTUNITY', 
            'cast' => 'float', 
            'default' => 0, 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false],
        'currency' => [
            'alias' => 'CURRENCY_ID', 
            'cast' => 'string', 
            'default' => 'EUR', 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'notes' => [
            'alias' => 'COMMENTS', 
            'cast' => 'string', 
            'default' => '', 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'responsibleId' => [
            'alias' => 'ASSIGNED_BY_ID', 
            'cast' => 'int', 
            'default' => null, 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'pipelineId' => [
            'alias' => 'CATEGORY_ID', 
            'cast' => 'string', 
            'default' => null, 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'typeId' => [
            'alias' => 'TYPE_ID', 
            'cast' => 'string', 
            'default' => 'SALE', 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'isOpen' => [
            'alias' => 'OPENED', 
            'cast' => 'bool', 
            'default' => true, 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'regSonetEvent' => [
            'alias' => 'REGISTER_SONET_EVENT', 
            'cast' => 'bool', 
            'default' => true, 
            'isArray' => false, 
            'group' => 'params', 
            'isCustomField' => false
        ]
    ];

    public function __construct(Bitrix24Gateway &$gateway, ?int $id = null) {
        $this->gateway = $gateway;
        $this->importCustomFields();
        $this->loadDefaults();
        if (!is_null($id) && $id > 0) {
            $this->id = $id;
            $this->loadFromApi();
        }
    }

    public function setId(int $id) {
        $this->loadDefaults();
        if ($id > 0) {
            $this->id = $id;
            $this->loadFromApi();
        }
        return $this;
    }

    public function setContactId(int $id) {
        $this->contactId = $id;
        return $this;
    }

    public function setTitle(string $title) {
        $this->title = $title;
        return $this;
    }

    public function setStageId(string $id) {
        $this->stageId = $id;
        return $this;
    }

    public function setSourceId(string $id) {
        $this->sourceId = $id;
        return $this;
    }
    
    public function setValue(float $value) {
        $this->value = $value;
        return $this;
    }

    public function setNotes(string $notes) {
        $this->notes = $notes;
        return $this;
    }

    public function setResponsibleId(int $id) {
        $this->responsibleId = $id;
        return $this;
    }

    public function setPipelineId(int $id) {
        $this->pipelineId = $id;
        return $this;
    }

    public function setTypeId(string $id) {
        $this->typeId = $id;
        return $this;
    }

    public function setCurrency(string $currency) {
        $this->currency = $currency;
        return $this;
    }

    public function isOpen(bool $flag) {
        $this->isOpen = $flag;
        return $this;
    }

    public function setRegSonetEvent(bool $flag) {
        $this->regSonetEvent = $flag;
        return $this;
    }

    public function getContactId() {
        return $this->contactId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getStageId() {
        return $this->stageId;
    }

    public function getSourceId() {
        return $this->sourceId;
    }
    
    public function getValue() {
        return $this->value;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function getResponsibleId() {
        return $this->responsibleId;
    }

    public function getPipelineId() {
        return $this->pipelineId;
    }

    public function getTypeId() {
        return $this->typeId;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function getIsOpen() {
        return $this->isOpen;
    }

    public function getRegSonetEvent() {
        return $this->regSonetEvent;
    }

    private function loadFromApi() {
        $response = $this->gateway->invokeApi(
            'GET', 
            sprintf('crm.deal.get?ID=%d', $this->id)
        );
        if ($response->statusCode < 200 || $response->statusCode > 299) {
            throw new Error($response->body->error_description);
        }
        $this->import($response->body->result);
    }

    public function save() {
        $payload = $this->buildPayload();
        $action = is_null($this->id) ? 'crm.deal.add' : sprintf('crm.deal.update?ID=%d', $this->id);
        $response = $this->gateway->invokeApi(
            'POST',
            $action,
            $payload
        );
        if ($response->statusCode < 200 || $response->statusCode > 299) {
            throw new Error($response->body->error_description);
        }
        if ($action == 'crm.deal.add' && $response->body->result > 0) {
            $this->id = $response->body->result;
        }
        return $this->id;
    }

}