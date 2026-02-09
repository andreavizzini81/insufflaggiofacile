<?php

class Request extends HttpMessage {

    private string    $scheme;
    private ?string   $host;
    private ?string   $path;
    private ?string   $username;
    private ?string   $password;
    private ?int      $port;
    private ?string   $query;
    private ?string   $fragment;

    public function __construct(?string $url = null) {
        parent::__construct();
        $this->initUrlProps();
        if (!is_null($url)) {
            $this->setUrl($url);
        }
    }

    private function initUrlProps() {
        $this->scheme = 'https';
        $this->host = null;
        $this->path = null;
        $this->username = null;
        $this->password = null;
        $this->port = null;
        $this->query = null;
        $this->fragment = null;
    }

    public function getScheme() :?string {
        return $this->scheme;
    }

    public function setScheme(?string $scheme) {
        $this->scheme = $scheme;
        return $this;
    }

    public function getHost() :?string {
        return $this->host;
    }

    public function setHost(?string $host) {
        $this->host = $host;
        return $this;
    }

    public function getPath() :?string {
        return $this->path;
    }

    public function setPath(?string $path) {
        $this->path = $path;
        return $this;
    }

    public function getQuery() :?string {
        return $this->query;
    }

    public function setQuery(?string $query) {
        $this->query = $query;
        $this->queryParams = Request::unpackQueryString($this->query);
        return $this;
    }

    public function getUsername() :?string {
        return $this->username;
    }

    public function setUsername(?string $username) {
        $this->username = $username;
        return $this;
    }

    public function getPassword() :?string {
        return $this->password;
    }

    public function setPassword(?string $password) {
        $this->password = $password;
        return $this;
    }

    public function getPort() :?int {
        return $this->port;
    }

    public function setPort(?int $port) {
        $this->port = $port;
        return $this;
    }

    public function setUrl(string $url) {
        $this->initUrlProps();
        $this->parseUrl($url);
        return $this;
    }

    public function getUrl() :string {
        $components = [];
        $components[] = $this->scheme.'://';
        if ($this->username) {
            $components[] = $this->username;
            if ($this->password) {
                $components[] = ':'.$this->password;
            }
            $components[] = '@';
        }
        $components[] = $this->host;
        if ($this->port && (
                ($this->scheme == 'http' && $this->port != 80) || 
                ($this->scheme == 'https' && $this->port != 443)
            )
        ) {
            $components[] = ':'.$this->port;
        }
        $components[] = $this->path;
        if (is_array($this->queryParams) && count($this->queryParams) > 0) {
            $components[] = '?'.http_build_query($this->queryParams);
        }
        if ($this->fragment) {
            $components[] = '#'.$this->fragment;
        }
        return implode('', $components);
    }

    private function parseUrl(string $url) :bool {
        $urlInfo = parse_url($url);
        if ($urlInfo === false || !is_array($urlInfo)) {
            throw new Exception('Malformed or invalid url');
        }
        $this->setScheme($urlInfo['scheme'] ?? $this->scheme);
        $this->setHost($urlInfo['host'] ?? $this->host);
        $this->setPath($urlInfo['path'] ?? $this->path);
        $this->setUsername($urlInfo['user'] ?? $this->username);
        $this->setPassword($urlInfo['pass'] ?? $this->password);
        $this->setPort($urlInfo['port'] ?? $this->port);
        $this->setQuery($urlInfo['query'] ?? $this->query);
        $this->fragment = $urlInfo['fragment'] ?? $this->fragment;
        return true;
    }

    public function getAuthorizationType() :?string {
        if (!$this->hasHeader('Authorization') || trim($this->getHeader('Authorization')) == '') {
            return null;
        }
        $authorizationParts = explode(' ', $this->getHeader('Authorization'), 2);
        return strtolower($authorizationParts[0]);
    }

    public function getBasicAuthorization() :?array {
        if ($this->getAuthorizationType() != 'basic') {
            return null;
        }
        $base64Data = trim(substr($this->getHeader('Authorization'), 6));
        $plainData = base64_decode($base64Data, true);
        if ($plainData === false) {
            return null;
        }
        $credentials = explode(':', $plainData, 2);
        return [
            'username' => $credentials[0],
            'password' => $credentials[1] ?? null
        ];
    }

    public function getBearerAuthorization() :?string {
        if ($this->getAuthorizationType() != 'bearer') {
            return null;
        }
        return trim(substr($this->getHeader('Authorization'), 7));
    }

    public function setBasicAuthorization(string $username, $password) {
        $base64 = base64_encode(
            sprintf('%s:%s', $username, $password)
        );
        $this->setHeader('Authorization', sprintf('Basic %s', $base64));
        return $this;
    }    

    public function setBearerToken(string $token) {
        $this->setHeader('Authorization', sprintf('Bearer %s', $token));
        return $this;
    }

    public function setCookie(string|Cookie $nameOrValue, string $value = '') :bool {
        if ($nameOrValue instanceof Cookie) {
            $this->cookies[$nameOrValue->getName()] = $nameOrValue;
            return true;
        }
        $this->cookies[$nameOrValue] = $value;
        return true;
    }

    private static function unpackQueryString(?string $queryString) :array {
        $params = [];
        if (is_string($queryString)) {
            parse_str($queryString, $params);
        }
        return $params;
    }

    public function clone() {
        return clone $this;
    }

    public function send() {
        $response = new Response();
        $ch = curl_init($this->getUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($this->body && $this->method->value != 'GET') {
            $data = null;
            switch(gettype($this->body)) {
                case 'string':
                    $data = ($this->getContentType() === 'application/json') ? json_encode($this->body) : $this->body;
                    break;
                case 'object':
                    $data = (string)(clone $this->body);
                    break;
                default:
                    $data = $this->body;
            }
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            if (is_string($data)) {
                $this->setHeader('Content-Length', strlen($data));
            }
        }
        $requestHeaders = [];
        foreach($this->headers as $key => $value) {
            $requestHeaders[] = sprintf('%s: %s', $key, $value);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeaders);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->method->value);
        curl_setopt($ch, CURLOPT_HEADERFUNCTION, function ($curl, $header) use (&$response) {
            $headerParts = explode(':', $header);
            if (count($headerParts) == 2) {
                $response->setHeader($headerParts[0], trim($headerParts[1]));
            }
            return strlen($header);
        });
        // Da integrare la parte di invio cookie e file
        $result = curl_exec($ch);
        $resultInfo = curl_getinfo($ch);
        curl_close($ch);
        if ($result === false) {
            return false;
        }
        $response->setStatusCode($resultInfo['http_code']);
        $response->setContentType($resultInfo['content_type']);
        $response->setBody($result);
        return $response;
    }

}