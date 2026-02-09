<?php

class CalendarLinkToken {

    private const ENTITIES = [
        'user', 
        'agency'
    ];

    private const DEFAULTS = [
        'user'     => null,
        'entityId' => null,
        'entity'   => 'user',
        'error'    => null
    ];

    private ?User   $user;
    private ?int    $entityId;
    private string  $entity;
    private ?string $error;

    public function __construct() {

        foreach(self::DEFAULTS as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function setUserId(int $userId): self {

        $user = new User($userId);
        if (!$user->exists()) {
            throw new Exception('Invalid user reference');
        }

        $this->user = $user;
        return $this;
    }

    public function getUserId(): ?int {
        if (!$this->user || !$this->user->exists()) {
            return null;
        }
        return $this->user->getId();
    }

    public function getEntityId(): ?int {
        return $this->entityId;
    }

    public function setEntityId(?int $entityId): self {
        $this->entityId = $entityId;
        return $this;
    }

    public function getEntity(): string {
        return $this->entity;
    }

    public function setEntity(string $entity): self {
        if (!in_array($entity, self::ENTITIES)) {
            throw new Exception('Invalid entity type');
        }
        $this->entity = $entity;
        return $this;
    }

    public function getError(): ?string {
        return $this->error;
    }

    public function setError(?string $error): self {
        $this->error = $error;
        return $this;
    }

    public function build() {

        $payload = [
            'iss' => $_ENV['SW_PRODUCT_NAME'],
            'act' => $this->entity,
            'aid' => $this->entityId,
            'uid' => $this->user->getId(),
            'dgs' => $this->generateUserHash()
        ];

        return Firebase\JWT\JWT::encode(
            $payload, 
            $_ENV['USER_JWT_KEY'], 
            'HS256'
        );
    }

    public function verify(string $token): bool {
        try {
            $jwtData = Firebase\JWT\JWT::decode(
                $token, 
                new Firebase\JWT\Key($_ENV['USER_JWT_KEY'], 'HS256')
            );
            if (!$jwtData) {
                $this->error = 'Invalid jwt data';
                return false;
            }
            $this->setUserId($jwtData->uid);
            if ($jwtData->dgs != $this->generateUserHash()) {
                $this->error = 'Digest mismatch';
                return false;
            }  
            $this->entity = $jwtData->act;
            $this->entityId = $jwtData->aid;
            return true;
        } catch(Exception $ex) {
            $this->error = $ex->getMessage();
        }
        return false;
    }

    private function generateUserHash(): string {

        if (is_null($this->user)) {
            throw new Exception('User must be set before token generation');
        }

        $userDigest = $this->user->getHashArgument();
        return base64_encode(crc32($userDigest));
    }

}