<?php

class Agency extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'agency';
    private const PRIMARY_KEY = 'id';

    public const TYPES = [
        'broker' => 'Broker',
        'agency' => 'Agenzia'
    ];

    private ?int    $id;
    private string  $type;
    private string  $description;
    private ?string $subdomain;
    private string  $email;
    private string  $phone;
    private string  $fixedPhone;
    private string  $businessName;
    private string  $businessAddress;
    private string  $businessCity;
    private string  $businessState;
	private string  $businessRegion;
    private string  $businessZipcode;
    private string  $openingInfo;
    private string  $pec;
    private string  $sdi;
    private string  $vatNumber;
    private string  $address;
    private string  $city;
    private string  $zipcode;
    private string  $state;
    private string  $region;
    private string  $latitude;
    private string  $longitude;
    private ?int    $holderUserId;
    private ?int    $defaultResponsibleId;
    private bool    $smtpIsEnabled;
    private ?string $smtpUsername;
    private ?string $smtpPassword;
    private ?string $createdAt;
    private ?string $updatedAt;
    private bool    $exportHolderUser;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' =>  null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'type' => [
            'default' => 'broker',
            'alias' => 'type',
            'cast' => 'string'
        ],
        'description' => [
            'default' =>  '',
            'alias' => 'description',
            'cast' => 'string'
        ],
        'subdomain' => [
            'default' => null,
            'alias' => 'subdomain',
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
        'fixedPhone' => [
            'default' => '',
            'alias' => 'fixed_phone',
            'cast' => 'string'
        ],
        'businessName' => [
            'default' => '',
            'alias' => 'business_name',
            'cast' => 'string'
        ],
		'businessAddress' => [
            'default' =>  '',
            'alias' => 'business_address',
            'cast' => 'string'
        ],
        'businessCity' => [
            'default' =>  '',
            'alias' => 'business_city',
            'cast' => 'string'
        ],
        'businessZipcode' => [
            'default' => '',
            'alias' => 'business_zipcode',
            'cast' => 'string'
        ],
        'businessState' => [
            'default' => '',
            'alias' => 'business_state',
            'cast' => 'string'
        ],
		'businessRegion' => [
            'default' => '',
            'alias' => 'business_region',
            'cast' => 'string'
        ],
        'openingInfo' => [
            'default' => '',
            'alias' => 'opening_info',
            'cast' => 'string'
        ],
        'pec' => [
            'default' => '',
            'alias' => 'pec',
            'cast' => 'string'
        ],
        'sdi' => [
            'default' => '',
            'alias' => 'sdi',
            'cast' => 'string'
        ],
        'vatNumber' => [
            'default' => '',
            'alias' => 'vat_number',
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
        'region' => [
            'default' => '',
            'alias' => 'region',
            'cast' => 'string'
        ],
        'latitude' => [
            'default' => '',
            'alias' => 'latitude',
            'cast' => 'string'
        ],
        'longitude' => [
            'default' => '',
            'alias' => 'longitude',
            'cast' => 'string'
        ],
        'holderUserId' => [
            'default' => null,
            'alias' => 'holder_user_id',
            'cast' => 'int'
        ],
        'defaultResponsibleId' => [
            'default' => null,
            'alias' => 'default_responsible_id',
            'cast' => 'int'
        ],
        'smtpIsEnabled' => [
            'default' => false,
            'alias' => 'smtp_enabled',
            'cast' => 'bool'
        ],
        'smtpUsername' => [
            'default' => null,
            'alias' => 'smtp_username',
            'cast' => 'string'
        ],
        'smtpPassword' => [
            'default' => null,
            'alias' => 'smtp_password',
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
        $this->exportHolderUser = false;
        if (!is_null($id)) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId() {
        return $this->id;
    }
    
    public function getType(): string {
        return $this->type;
    }

    public function setType(string $type): self {
        $this->type = $type;
        return $this;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

	public function getSubdomain(): ?string {
		return $this->subdomain;
	}
	
	public function setSubdomain(?string $subdomain): self {
        if (is_string($subdomain) && trim($subdomain) != '') {
            $this->subdomain = $subdomain;
        }
		return $this;
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

    public function getBusinessName() {
        return $this->businessName;
    }

    public function setBusinessName($businessName) {
        $this->businessName = $businessName;
        return $this;
    }

    public function getOpeningInfo(): string {
        return $this->openingInfo;
    }

    public function setOpeningInfo(string $openingInfo): self {
        $this->openingInfo = $openingInfo;
        return $this;
    }

    public function getPec() {
        return $this->pec;
    }

    public function setPec($pec) {
        $this->pec = $pec;
        return $this;
    }

    public function getSdi() {
        return $this->sdi;
    }

    public function setSdi($sdi) {
        $this->sdi = $sdi;
        return $this;
    }

    public function getVatNumber() {
        return $this->vatNumber;
    }

    public function setVatNumber($vatNumber) {
        $this->vatNumber = $vatNumber;
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

    public function getRegion() {
        return $this->region;
    }

    public function setRegion($state) {
        $this->region = $state;
        return $this;
    }

    public function getLatitude() {
        return $this->latitude;
    }

    public function setLatitude($latitude) {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude() {
        return $this->longitude;
    }

    public function setLongitude($longitude){
        $this->longitude = $longitude;
        return $this;
    }

    public function getFixedPhone() {
        return $this->fixedPhone;
    }

    public function setFixedPhone($fixedPhone) {
        $this->fixedPhone = $fixedPhone;
        return $this;
    }

    public function getBusinessAddress() {
        return $this->businessAddress;
    }

    public function setBusinessAddress($businessAddress) {
        $this->businessAddress = $businessAddress;
        return $this;
    }

    public function getBusinessCity() {
        return $this->businessCity;
    }

    public function setBusinessCity($businessCity) {
        $this->businessCity = $businessCity;
        return $this;
    }

    public function getBusinessState() {
        return $this->businessState;
    }

    public function setBusinessState($businessState) {
        $this->businessState = $businessState;
        return $this;
    }
	
	public function getBusinessRegion() {
        return $this->businessRegion;
    }

    public function setBusinessRegion($businessRegion) {
        $this->businessRegion = $businessRegion;
        return $this;
    }

    public function getBusinessZipcode() {
        return $this->businessZipcode;
    }

    public function setBusinessZipcode($businessZipcode) {
        $this->businessZipcode = $businessZipcode;
        return $this;
    }

    public function getHolderUserId(): ?int {
        return $this->holderUserId;
    }

    public function setHolderUserId(?int $holderUserId): self {
        $this->holderUserId = $holderUserId;
        return $this;
    }

    public function getDefaultResponsibleId(): ?int {
        return $this->defaultResponsibleId;
    }

    public function setDefaultResponsibleId(?int $defaultResponsibleId): self {
        $this->defaultResponsibleId = $defaultResponsibleId;
        return $this;
    }

    public function smtpIsEnabled(): bool {
        return $this->smtpIsEnabled;
    }

    public function setSmtpIsEnabled(bool $smtpIsEnabled): self {
        $this->smtpIsEnabled = $smtpIsEnabled;
        return $this;
    }

    public function getSmtpUsername(): ?string {
        return $this->smtpUsername;
    }

    public function setSmtpUsername(?string $smtpUsername): self {
        if (is_string($smtpUsername) && trim($smtpUsername) != '') {
            $this->smtpUsername = $smtpUsername;
        }
        return $this;
    }

    public function getSmtpPassword(): ?string {
        return $this->smtpPassword;
    }

    public function setSmtpPassword(?string $smtpPassword): self {
        if (is_string($smtpPassword) && trim($smtpPassword) != '') {
            $this->smtpPassword = $smtpPassword;
        }
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

    public function withHolderUser(bool $flag) {
        $this->exportHolderUser = $flag;
        return $this;
    }
    
    public function getHolderUser(string $class = User::class): ?PublicUser {
        if ($this->holderUserId) {
            return new $class($this->holderUserId);
        }
    }

    public function getUsers(?int $websiteRoleId = null): ?array {
        if (!$this->exists) {
            return [];
        }
        $params = ['agency_id' => $this->id];
        if ($websiteRoleId && array_key_exists($websiteRoleId, User::WEBSITE_ROLES)) {
            $params['website_role_id'] = $websiteRoleId;
        }
        $userList = (new UserList($params, true, PublicUser::class))->setOrderParam('website_role_id ASC');
        return $userList->getAll();
    }

    private function beforeSave() {
        $this->updatedAt = date('Y-m-d H:i:s');
        if (!$this->exists) {
            $this->createdAt = date('Y-m-d H:i:s');
        }
    }

    private function afterImport() {
        if (!is_null($this->subdomain) && trim($this->subdomain) === '') {
            $this->subdomain = null;
        }
        if (!is_null($this->smtpUsername) && trim($this->smtpUsername) === '') {
            $this->smtpUsername = null;
        }
        if (!is_null($this->smtpPassword) && trim($this->smtpPassword) === '') {
            $this->smtpPassword = null;
        }
    }

    private function afterExport(&$data) {
        $data['stateName'] = $this->db->getVar(
            sprintf(
                'SELECT DISTINCT 
                    nome_provincia 
                FROM 
                    cappario 
                WHERE 
                    TRIM(provincia) = LOWER(TRIM(\'%s\')) 
                ORDER BY 
                    nome_provincia ASC', 
                $this->getState()
            )
        );
        if ($this->exportHolderUser) {
            $data['holderUser'] = $this->getHolderUser(PublicUser::class);
        }
    }

}