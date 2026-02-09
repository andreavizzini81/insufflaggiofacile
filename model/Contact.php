<?php

class Contact extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'contact';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private int     $typeId;
    private string  $firstName;
    private string  $lastName;
    private string  $email;
    private string  $phone;
    private ?string $taxCode;
    private string  $address;
    private string  $city;
    private string  $zipcode;
    private string  $state;
    private string  $country;
    private ?string $birthDate;
    private ?string $birthPlace;
    private ?string $businessName;
    private ?string $pec;
    private ?string $contactPerson;
    private ?string $vatNumber;
    private string  $note;
    private bool    $privacyStandard;
    private bool    $privacyMarketing;
    private bool    $privacyAnalysis;
    private string  $registrationChannel;
    private string  $registrationIp;
    private ?string $createdAt;
    private ?string $updatedAt;

    public  const TYPES = [
        0 => 'individual',
        1 => 'business'
    ];

    private const PROPERTIES_MAP = [
        'id' => [
            'default' =>  null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'typeId' => [
            'default' => 0,
            'alias' => 'contact_type_id',
            'cast' => 'int'
        ],
        'firstName' => [
            'default' => '',
            'alias' => 'first_name',
            'cast' => 'string'
        ],
        'lastName' => [
            'default' => '',
            'alias' => 'last_name',
            'cast' => 'string'
        ],
        'email' => [
            'default' =>  '',
            'alias' => 'email',
            'cast' => 'string'
        ],
        'phone' => [
            'default' => '',
            'alias' => 'phone',
            'cast' => 'string'
        ],
        'taxCode' => [
            'default' => null,
            'alias' => 'tax_code',
            'cast' => 'string'
        ],
        'address' => [
            'default' => '',
            'alias' => 'address',
            'cast' => 'string'
        ],
        'city' => [
            'default' =>  '',
            'alias' => 'city',
            'cast' => 'string'
        ],
        'zipcode' => [
            'default' => '',
            'alias' => 'zipcode',
            'cast' => 'string'
        ],
        'state' => [
            'default' => '',
            'alias' => 'state',
            'cast' => 'string'
        ],
        'country' => [
            'default' => 'IT',
            'alias' => 'country',
            'cast' => 'string'
        ],
        'birthDate' => [
            'default' => null,
            'alias' => 'birth_date',
            'cast' => 'string'
        ],
        'birthPlace' => [
            'default' => null,
            'alias' => 'birth_place',
            'cast' => 'string'
        ],
        'businessName' => [
            'default' => null,
            'alias' => 'business_name',
            'cast' => 'string'
        ],
        'pec' => [
            'default' => null,
            'alias' => 'pec',
            'cast' => 'string'
        ],
        'contactPerson' => [
            'default' => null,
            'alias' => 'contact_person',
            'cast' => 'string'
        ],
        'vatNumber' => [
            'default' => null,
            'alias' => 'vat_number',
            'cast' => 'string'
        ],
        'note' => [
            'default' => '',
            'alias' => 'note',
            'cast' => 'string'
        ],
        'privacyStandard' => [
            'default' => true,
            'alias' => 'privacy_standard',
            'cast' => 'bool'
        ],
        'privacyMarketing' => [
            'default' => false,
            'alias' => 'privacy_marketing',
            'cast' =>'bool'
        ],
        'privacyAnalysis' => [
            'default' => false,
            'alias' => 'privacy_analysis',
            'cast' =>'bool'
        ],
        'registrationChannel' => [
            'default' => '',
            'alias' => 'registration_channel',
            'cast' => 'string'
        ],
        'registrationIp' => [
            'default' => '',
            'alias' => 'registration_ip',
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
        ]
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->loadDefaults();
        if (!is_null($id)) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getTypeId() {
        return $this->typeId;
    }

    public function setTypeId(int $typeId) {

        if (!array_key_exists($typeId, Contact::TYPES)) {
            throw new Exception('Invalid contact type id');
        }

        $this->typeId = $typeId;
        return $this;
    }

    public function getType(): string {
        
        if (!array_key_exists($this->typeId, Contact::TYPES)) {
            return 'individual';
        }

        return Contact::TYPES[$this->typeId];
    }

    public function setType(string $type): self {

        $key = array_search($type, Contact::TYPES);
        if ($key === false) {
            throw new Exception('Invalid contact type');
        }

        $this->typeId = $key;
        return $this;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function getFullName() {
        return sprintf("%s %s", $this->firstName, $this->lastName);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
        return $this;
    }

    public function getTaxCode() {
        return $this->taxCode;
    }

    public function setTaxCode($taxCode) {
        $this->taxCode = $taxCode;
        return $this;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
        return $this;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    public function getZipcode() {
        return $this->zipcode;
    }

    public function setZipcode($zipcode) {
        $this->zipcode = $zipcode;
        return $this;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
        return $this;
    }

    public function getCountry(): string {
        return $this->country;
    }

    public function setCountry(string $country): self {
        $this->country = $country;
        return $this;
    }

    public function getBirthDate() {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getBirthPlace(): ?string {
        return $this->birthPlace;
    }

    public function setBirthPlace(?string $birthPlace): self {
        $this->birthPlace = $birthPlace;
        return $this;
    }

    public function getBusinessName() {
        return $this->businessName;
    }

    public function setBusinessName($businessName) {
        $this->businessName = $businessName;
        return $this;
    }

    public function getPec() {
        return $this->pec;
    }

    public function setPec($pec) {
        $this->pec = $pec;
        return $this;
    }

    public function getContactPerson() {
        return $this->contactPerson;
    }

    public function setContactPerson($contactPerson) {
        $this->contactPerson = $contactPerson;
        return $this;
    }

    public function getVatNumber() {
        return $this->vatNumber;
    }

    public function setVatNumber($vatNumber) {
        $this->vatNumber = $vatNumber;
        return $this;
    }

    public function getNote(): string {
        return $this->note;
    }

    public function setNote(string $note): self {
        $this->note = $note;
        return $this;
    }

    public function getPrivacyStandard() {
        return $this->privacyStandard;
    }

    public function setPrivacyStandard($privacyStandard) {
        $this->privacyStandard = $privacyStandard;
        return $this;
    }

    public function getPrivacyMarketing() {
        return $this->privacyMarketing;
    }

    public function setPrivacyMarketing($privacyMarketing) {
        $this->privacyMarketing = $privacyMarketing;
        return $this;
    }

    public function getPrivacyAnalysis() {
        return $this->privacyAnalysis;
    }

    public function setPrivacyAnalysis($privacyAnalysis) {
        $this->privacyAnalysis = $privacyAnalysis;
        return $this;
    }

    public function getRegistrationChannel() {
        return $this->registrationChannel;
    }

    public function setRegistrationChannel($registrationChannel) {
        $this->registrationChannel = $registrationChannel;
        return $this;
    }

    public function getRegistrationIp() {
        return $this->registrationIp;
    }

    public function setRegistrationIp($registrationIp) {
        $this->registrationIp = $registrationIp;
        return $this;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
        return $this;
    }

	public function getDeals(): ?array {
		if (!$this->exists) {
			return false;	
		}
		
		$deals = $this->db->getResults(
			sprintf( 'SELECT crm_stage.label AS label, deal.id AS id FROM deal JOIN crm_stage ON deal.stage_id = crm_stage.id WHERE deal.contact_id = %d', $this->id )	
		);
		
		return $deals;
	}
	
	public function getCountDeals(): ?int {
		if (!$this->exists) {
			return false;	
		}
		
		$dealsCount = $this->db->getVar(
			sprintf( 'SELECT COUNT(*) FROM deal JOIN crm_stage ON deal.stage_id = crm_stage.id WHERE deal.contact_id = %d', $this->id )	
		);
		
		return $dealsCount;
	}
	
    private function beforeSave() {
        if (Utils::normalizeDate($this->birthDate) == '') {
            $this->birthDate = null;
        }
        $this->updatedAt = date('Y-m-d H:i:s');
        if (!$this->exists) {
            $this->createdAt = date('Y-m-d H:i:s');
            $this->registrationIp = $_SERVER['REMOTE_ADDR'];
        }
    }

}