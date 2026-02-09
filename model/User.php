<?php

class User extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'user';
    private const PRIMARY_KEY  = 'id';

    private ?int    $id;
    private string  $firstName;
    private string  $lastName;
    private string  $email;
    private ?string $password;
    private string  $phone;
    private string  $businessName;
    private int     $roleId;
    private int     $websiteRoleId;
    private bool    $canInsertOffers;
    private ?int    $defaultAgencyId;
    private bool    $isActive;
    private ?string $subscriptionExpiration;
    private ?string $createdAt;
    private ?string $updatedAt;

    private array   $authorizedAgenciesId;

    public const ROLES = [
        200 => 'Sviluppatore',
        100 => 'Amministratore',
        20  => 'Agente',
    ];

    public const WEBSITE_ROLES = [
        1 => 'Titolare di agenzia',
        10 => 'Venditore',
    ];

    private const PROPERTIES_MAP = [
        'id' => [
            'default' =>  null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'roleId' => [
            'default' => 10,
            'alias' => 'role_id',
            'cast' => 'int'
        ],
        'websiteRoleId' => [
            'default' => 254,
            'alias' => 'website_role_id',
            'cast' => 'int'
        ],
        'defaultAgencyId' => [
            'default' => null,
            'alias' => 'default_agency_id',
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
        'password' => [
            'default' =>  null,
            'alias' => 'password',
            'cast' => 'string'
        ],
        'phone' => [
            'default' => '',
            'alias' => 'phone',
            'cast' => 'string'
        ],
        'businessName' => [
            'default' => '',
            'alias' => 'business_name',
            'cast' => 'string'
        ],
        'canInsertOffers' => [
            'default' => false,
            'alias' => 'can_insert_offers',
            'cast' => 'bool'
        ],
        'isActive' => [
            'default' => true,
            'alias' => 'is_active',
            'cast' =>'bool'
        ],
        'subscriptionExpiration' => [
            'default' => null,
            'alias' => 'subscription_expiration',
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
        ],
        'authorizedAgenciesId' => [
            'default' => [],
            'alias' => null,
            'cast' => 'array'
        ]
    ];

    public const PASSWORD_REGEX = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

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

    public function getFullName(): string {
        return sprintf('%s %s', $this->firstName, $this->lastName);
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

    public function getRoleId() {
        return $this->roleId;
    }

    public function setRoleId($roleId) {
        $this->roleId = $roleId;
        return $this;
    }

    public function getRoleDescription(): string {
        if (!array_key_exists($this->roleId, User::ROLES)) {
            return 'Non definito';
        }
        return User::ROLES[$this->roleId];
    }

    public function getWebsiteRoleId() {
        return $this->websiteRoleId;
    }

    public function setWebsiteRoleId($websiteRoleId) {
        $this->websiteRoleId = $websiteRoleId;
        return $this;
    }

    public function getCanInsertOffers() {
        return $this->canInsertOffers;
    }

    public function setCanInsertOffers($canInsertOffers) {
        $this->canInsertOffers = $canInsertOffers;
        return $this;
    }

    public function getDefaultAgencyId(): ?int {
        return $this->defaultAgencyId;
    }

    public function setDefaultAgencyId(?int $agencyId) {
        $this->defaultAgencyId = $agencyId;
        return $this;
    }

    public function getIsActive() {
        return $this->isActive;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
        return $this;
    }

    public function getSubscriptionExpiration() {
        return $this->subscriptionExpiration;
    }

    public function setSubscriptionExpiration($subscriptionExpiration) {
        $this->subscriptionExpiration = $subscriptionExpiration;
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

    public function isSubscriptionActive() {
        if (!$this->exists) {
            return false;
        }
        $expirationDateObj = Utils::normalizeDate($this->subscriptionExpiration, true);
        if ($expirationDateObj == '') {
            return false;
        }
        return $expirationDateObj > (new DateTime());
    }

    public function hasPassword() {
        return !is_null($this->password);
    }    

    public static function hashPassword(string $password) {
        return password_hash(
            sprintf('%s@%s', 'User', $password), 
            PASSWORD_BCRYPT
        );
    }

    public function verifyPassword(string $password) :bool {
        return password_verify(
            sprintf('%s@%s', 'User', $password),
            $this->password
        );
    }

    public function setPassword(string $password) {
        $this->password = User::hashPassword($password);
        return $this;
    }

    public static function checkPasswordComplexity(string $password) :bool {
        return preg_match(User::PASSWORD_REGEX, $password) > 0;
    }

    private function beforeSave() {
        if (Utils::normalizeDate($this->subscriptionExpiration) == '') {
            $this->subscriptionExpiration = null;
        }
        $this->updatedAt = date('Y-m-d H:i:s');
        if (!$this->exists) {
            $this->createdAt = date('Y-m-d H:i:s');
            if (is_null($this->password)) {
                throw new Exception('Missing password');
            }
        }
    }

    public function getHashArgument() :string {
        if (!$this->exists) {
            throw new Exception('Cannot generate hash on nonexistent User');
        }
        return sprintf(
            '%s%s%s%s', $this->email, $this->password, $this->isActive, $this->subscriptionExpiration
        );
    }

    public function isAgent() {
        return $this->roleId == 8;
    }

    public function isAdmin() {
        return $this->roleId == 100;
    }

    public function isDeveloper() {
        return $this->roleId == 200;
    }
    
    public function hasAdminRights() {
        return $this->roleId >= 100;
    }

    public function ownsOffer(Offer $offer) :bool {
        return $this->hasAdminRights() || $offer->getUserId() == $this->id;
    }

    public function getAuthorizedAgenciesId(): array {
        return $this->authorizedAgenciesId;
    }

    public function addAuthorizedAgencyid(int $agencyId): self {

        if ($agencyId > 0) {
            $this->authorizedAgenciesId[] = $agencyId;
            $this->authorizedAgenciesId = array_unique($this->authorizedAgenciesId);
        }
        
        return $this;
    }

    public function setAuthorizedAgenciesId(array $agenciesId): self {

        $this->authorizedAgenciesId = array_filter($agenciesId, function(&$entry) {
            return is_numeric($entry) && (int)$entry > 0;
        });

        return $this;
    }

    public function getSiblings(bool $asObject = true): array {
        return (new UserList([
            'agency_id' => $this->authorizedAgenciesId
        ], $asObject, PublicUser::class))->setOrderParam('first_name ASC')->getAll();
    }

    private function afterImport() {
        if (!$this->exists) {
            return;
        }

        $agencyListParams = [];
        if (!$this->hasAdminRights()) {
            $agencyListParams['authorized_to'] = $this->id;
        }

        $this->authorizedAgenciesId = (new AgencyList($agencyListParams))->getAll();
    }

    private function afterSave() {

        if ($this->exists) {
            $this->db->query(
                sprintf('DELETE FROM user_agency WHERE user_id = %d', $this->id)
            );
            if (!empty($this->authorizedAgenciesId)) {
                
                $fragments = array_map(function($agencyId) {
                    return sprintf('(%d, %d)', $this->id, $agencyId);
                }, $this->authorizedAgenciesId);

                $this->db->query(
                    sprintf(
                        'INSERT INTO user_agency (user_id, agency_id) VALUES %s;',
                        implode(', ', $fragments)
                    )
                );
            }
        }

    }

    public function importFromKey(string $key, mixed $value) :bool {
        $data = $this->db->selectRow(
            self::ENTITY_TABLE, 
            '*',
            sprintf('%s = \'%s\'', $this->db->escape($key), $this->db->escape($value))
        );
        if (is_null($data)) {
            $this->id = null;
            $this->exists = false;
            return false;
        }
        $this->exists = true;
        $this->import($data);
        return true;
    }

}