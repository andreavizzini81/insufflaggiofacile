<?php

class Cookie {

    private string   $name;
    private string   $value;
    private string   $path;
    private string   $domain;
    private DateTime $expiresAt;
    private bool     $isSecure;
    private bool     $isHttpOnly;
    private bool     $isRaw;

    public function __construct(array $params = []) {
        $this->name = $params['name'] ?? '';
        $this->value = $params['value'] ?? '';
        $this->path = $params['path'] ?? '/';
        $this->domain = $params['domain'] ?? '';
        $this->isSecure = $params['is_secure'] ?? false;
        $this->isHttpOnly = $params['is_http_only'] ?? false;
        $this->isRaw = $params['is_raw'] ?? false;
        if (isset($params['expires_at'])) {
            $this->expiresAt = self::evaluateDateTime($params['expires_at']);
        }
        if (!isset($this->expiresAt)) {
            $this->expiresAt = (new DateTime('now'))->add(new DateInterval('PT1H'));
        }
    }

    private static function evaluateDateTime(string|DateTime $expression) {
        if ($expression instanceof DateTime) {
            return $expression;
        } else {
            if (strtotime($expression)) {
                return new DateTime($expression);
            }
        }
        return false;
    }

    public function setName(string $name) :self {
        $this->name = trim($name);
        return $this;
    }

    public function setValue(string $value) :self {
        $this->value = $value;
        return $this;
    }

    public function setPath(string $path) :self {
        $this->path = $path;
        return $this;
    }

    public function setDomain(string $domain) :self {
        $this->domain = $domain;
        return $this;
    }

    public function setExpiresAt(string|DateTime $expiresAt) :self {
        $value = self::evaluateDateTime($expiresAt);
        if ($value !== false) {
            $this->expiresAt = $value;
        }
        return $this;
    }

    public function setIsSecure(bool $isSecure) :self {
        $this->isSecure = $isSecure;
        return $this;
    }

    public function setIsHttpOnly(bool $isHttpOnly) :self {
        $this->isHttpOnly = $isHttpOnly;
        return $this;
    }

    public function setIsRaw(bool $isRaw) :self {
        $this->isRaw = $isRaw;
        return $this;
    }

    public function getName() :string {
        return $this->name;
    }

    public function getValue() :string {
        return $this->value;
    }

    public function getPath() :string {
        return $this->path;
    }

    public function getDomain() :string {
        return $this->domain;
    }

    public function getExpiresAt() :DateTime {
        return $this->expiresAt;
    }

    public function getIsSecure() :bool {
        return $this->isSecure;
    }

    public function getIsHttpOnly() :bool {
        return $this->isHttpOnly;
    }

    public function getIsRaw() :bool {
        return $this->isRaw;
    }

    public function set() :bool {
        if (trim($this->name) == '') {
            return false;
        }
        $cookieSetFn = ($this->isRaw) ? 'setrawcookie' : 'setcookie';
        return $cookieSetFn(
            $this->name,
            $this->value,
            $this->expiresAt->getTimestamp(),
            $this->path,
            $this->domain,
            $this->isSecure,
            $this->isHttpOnly
        );
    }

}

?>