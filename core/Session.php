<?php

abstract class Session implements JsonSerializable {

    protected Database $db;
    protected ?string  $token = null;
    protected ?string  $jwtKey = null;
    protected ?int     $duration = 86400;
    protected ?string  $createdAt = null;
    protected ?string  $expiresAt = null;
    protected bool     $autoRefresh = false;
    protected bool     $isValid = false;
    protected ?string  $entityName = null;
    protected ?string  $error = null;

    public function __construct(?string $token = null) {
        if (is_null($this->jwtKey)) {
            throw new Exception('Invalid session initialization');
        }
        $this->db = Container::Database();
        $this->createdAt = date('Y-m-d H:i:s');
        if (is_null($token)) {
            $this->calculateNewExpiration();
        } else {
            $this->token = $token;
            $this->verify();
        }
    }

    public function persist() {
        if (is_null($this->entity)) {
            throw new Exception('Entity has not been set');
        }
        $this->generateToken();
        $this->calculateNewExpiration();
        $result = $this->db->insert(
            'session', 
            [
                'entity'     => $this->entityName,
                'entity_id'  => $this->entity->getId(),
                'token'      => $this->token,
                'created_at' => $this->createdAt,
                'updated_at' => date('Y-m-d H:i:s'),
                'expires_at' => $this->expiresAt
            ],
            true
        );
        if ($result === false) {
            throw new Exception('Cannot persist session. Unexpected failure.');
        }
        $this->isValid = true;
        return $this;
    }

    public function destroy() {
        if (is_null($this->token)) {
            return false;
        }
        $result = $this->db->delete(
            'session',
            sprintf('token = \'%s\'', $this->db->escape($this->token))
        );
        return $result !== false;
    }

    protected function calculateHash() {
        return base64_encode(crc32($this->entity->getHashArgument()));
    }

    protected function calculateNewExpiration() {
        $this->expiresAt = (new DateTime())->add(new DateInterval(sprintf('PT%dS', $this->duration)))->format('Y-m-d H:i:s');
    }

    protected function generateToken() :string {
        $payload = [
            'iss' => $_ENV['SW_PRODUCT_NAME'],
            'iat' => strtotime($this->createdAt),
            'act' => $this->entityName,
            'aid' => $this->entity->getId(),
            'dgs' => $this->calculateHash()
        ];

        $this->token = Firebase\JWT\JWT::encode(
            $payload, 
            $this->jwtKey, 
            'HS256'
        );
        return $this->token;
    }

    protected function verify() {
        try {
            $jwtData = Firebase\JWT\JWT::decode(
                $this->token, 
                new Firebase\JWT\Key($this->jwtKey, 'HS256')
            );
        } catch(Exception $ex) {
            $this->error = $ex->getMessage();
            return false;
        }
        if (!isset($jwtData->dgs) || !isset($jwtData->act) || !isset($jwtData->aid)) {
            $this->error = 'Invalid JWT claim';
            return false;
        }
        if ($jwtData->act !== $this->entityName) {
            $this->error = 'Token entity mismatch';
            return false;
        }
        $this->entity = new $this->entityName($jwtData->aid);
        if (!$this->entity->exists()) {
            $this->error = 'Invalid entity reference';
            return false;
        }
        $dbData = $this->db->selectRow('session', '*', sprintf('token = \'%s\'', $this->db->escape($this->token)));
        if (is_null($dbData)) {
            $this->error = 'Session not found';
            return false;
        }
        if ($jwtData->dgs != $this->calculateHash()) {
            $this->error = 'Hash mismatch, session has been invalidated';
            $this->destroy();
            return false;
        }
        if (strtotime($dbData->expires_at) < time()) {
            $this->error = 'Session has expired';
            $this->destroy();
            return false;
        }
        $this->createdAt = $dbData->created_at;
        $this->expiresAt = $dbData->expires_at;
        $this->isValid = true;
        if ($this->autoRefresh) {
            $this->persist();
        }
        return true;
    }

    public function getError() {
        return $this->error;
    }

    public function isValid() {
        return $this->isValid;
    }

    public function getToken() {
        return $this->token;
    }

    public function getExpiresAt() {
        return $this->expiresAt;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getEntity() {
        return $this->entity;
    }

    public function export() {
        return (object)[
            'entity'    => $this->entityName,
            'entityId'  => !is_null($this->entity) ? $this->entity->getId() : null,
            'token'     => $this->token,
            'duration'  => $this->duration,
            'valid'     => $this->isValid,
            'createdAt' => $this->createdAt,
            'expiresAt' => $this->expiresAt
        ];
    }

    public function jsonSerialize() :mixed {
        return $this->export();
    }
}

?>