<?php

class Bitrix24Contact extends Bitrix24Entity {

    protected Bitrix24Gateway $gateway;

    protected ?int    $id;
    protected string  $firstName;
    protected string  $lastName;
    protected array   $email;
    protected array   $phone;
    protected string  $address;
    protected string  $typeId;
    protected ?int    $responsibleId;
    protected bool    $isOpen;
    protected bool    $regSonetEvent;
 
    protected const CUSTOM_FIELDS_ID = 'contact';

    protected array $propertiesMap = [
        'id' => [
            'alias' => 'ID', 
            'cast' => 'int', 
            'default' => null, 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'firstName' => [
            'alias' => 'NAME', 
            'cast' => 'string', 
            'default' => '', 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'lastName' => [
            'alias' => 'LAST_NAME', 
            'cast' => 'string', 
            'default' => '', 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'email' => [
            'alias' => 'EMAIL', 
            'cast' => Bitrix24ContactInfo::class, 
            'default' => [], 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'phone' => [
            'alias' => 'PHONE', 
            'cast' => Bitrix24ContactInfo::class, 
            'default' => [], 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'address' => [
            'alias' => 'ADDRESS', 
            'cast' => 'string', 
            'default' => '', 
            'isArray' => false, 
            'group' => 'fields', 
            'isCustomField' => false
        ],
        'typeId' => [
            'alias' => 'TYPE_ID', 
            'cast' => 'string', 
            'default' => 'CLIENT', 
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

    public function setFirstName(string $firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function setBusinessName(?string $businessName): self {
        $this->businessName = $businessName;
        return $this;
    }

    public function addEmail(Bitrix24ContactInfo $email) {
        if ($email->getType() != 'EMAIL') {
            throw new Exception('Invalid BitrixContactInfo::type for email field');
        }
        $this->email[] = $email;
        return $this;
    }

    public function addPhone(Bitrix24ContactInfo $phone) {
        if ($phone->getType() != 'PHONE') {
            throw new Exception('Invalid BitrixContactInfo::type for phone field');
        }
        $this->phone[] = $phone;
        return $this;
    }

    public function removeEmails() {
        $this->email = [];
        return $this;
    }

    public function removePhones() {
        $this->phone = [];
        return $this;
    }

    public function setResponsibleId(int $id) {
        $this->responsibleId = $id;
        return $this;
    }

	public function setAddress(string $address): self {
		$this->address = $address;
		return $this;
	}

    public function setTypeId(int $id) {
        $this->typeId = $id;
        return $this;
    }

    public function isOpen(bool $flag) {
        $this->isOpen = $flag;
        return $this;
    }

    public function setPrivacy($privacy) {
        $this->privacy = $privacy;
        return $this;
    }

    public function setRegSonetEvent(bool $flag) {
        $this->regSonetEvent = $flag;
        return $this;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getBusinessName() {
        return $this->businessName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

	public function getAddress(): string {
		return $this->address;
	}

    public function getTypeId() {
        return $this->typeId;
    }    

    public function getResponsibleId() {
        return $this->responsibleId;
    }

    public function getIsOpen() {
        return $this->isOpen;
    }

    public function getPrivacy() {
        return $this->privacy;
    }

    public function getRegSonetEvent() {
        return $this->regSonetEvent;
    }

    private function loadFromApi() {
        $response = $this->gateway->invokeApi(
            'GET', 
            sprintf('crm.contact.get?ID=%d', $this->id) 
        );
        if ($response->statusCode < 200 || $response->statusCode > 299) {
            throw new Error($response->body->error_description);
        }
        $this->import($response->body->result);
    }

    public function save() {
        $payload = $this->buildPayload();
        $action = is_null($this->id) ? 'crm.contact.add' : sprintf('crm.contact.update?ID=%d', $this->id);
        $response = $this->gateway->invokeApi(
            'POST',
            $action,
            $payload
        );
        if ($response->statusCode < 200 || $response->statusCode > 299) {
            throw new Error($response->body->error_description);
        }
        if ($action == 'crm.contact.add' && $response->body->result > 0) {
            $this->id = $response->body->result;
        }
        return $this->id;
    }

}