<?php

class UserSession extends Session implements JsonSerializable {

    protected ?User $entity = null;

    public function __construct(?string $token = null) {
        if (!isset($_ENV['USER_JWT_KEY'])) {
            throw new Exception('User session JWT key not found. Please check your environment configuration!');
        }
        $this->jwtKey = $_ENV['USER_JWT_KEY'];
        $this->entityName = User::class;
        $this->autoRefresh = true;
        parent::__construct($token);
    }

    public function setUser(User $user) {
        $this->entity = $user;
        return $this;
    }

}

?>