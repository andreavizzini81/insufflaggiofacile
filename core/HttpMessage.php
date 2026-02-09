<?php

class HttpMessage {

    protected mixed     $body;
    protected array     $headers;
    protected array     $cookies;
    protected array     $queryParams;
    protected array     $inputParams;
    protected array     $files;

    protected ?HttpMethodEnum $method;

    public function __construct() {
        $this->init();
    }

    protected function init() {
        $this->body = '';
        $this->headers = [];
        $this->cookies = [];
        $this->queryParams = [];
        $this->inputParams = [];
        $this->files = [];
        $this->method = HttpMethodEnum::GET;
    }

    public function setBody(mixed $body) {
        $this->body = $body;
        return $this;
    }

    public function getBody() :mixed {
        return $this->body;
    }

    public function getJsonBody() :mixed {
        return json_decode($this->body);
    }

    public function getHeaders() :?array {
        return $this->headers;
    }

    public function getHeader(string $name) :?string {
        return ($this->hasHeader($name)) ? $this->headers[$name] : null;
    }

    public function hasHeader(string $name) :bool {
        return (array_key_exists($name, $this->headers));
    }

    public function setHeader(string $name, string $value) {
        $normalizedHeaderName = Request::normalizeHeaderName($name);
        $this->headers[$normalizedHeaderName] = $value;
        return $this;
    }

    public function getCookies(): ?array {
        return $this->cookies;
    }

    public function getCookie(string $name): mixed {
        return ($this->hasCookie($name)) ? $this->cookies[$name] : null;
    }

    public function hasCookie(string $name): bool {
        return (array_key_exists($name, $this->cookies));
    }

    public function setMethod(?HttpMethodEnum $method) {
        $this->method = $method;
        return $this;
    }

    public function getMethod(): ?HttpMethodEnum {
        return $this->method;
    }

    public function getQueryParams(): array {
        return $this->queryParams;
    }

    public function getQueryParam(string $name) :mixed {
        return ($this->hasQueryParam($name)) ? $this->queryParams[$name] : null;
    }

    public function hasQueryParam(string $name) :bool {
        return (array_key_exists($name, $this->queryParams));
    }

    public function setQueryParam(string $name, array|string $value) {
        $this->queryParams[$name] = $value;
        return $this;
    }

    public function removeQueryParam(string $name) {
        if ($this->hasQueryParam($name)) {
            unset($this->queryParams[$name]);
        }
        return $this;
    }

    public function getInputParams() :array {
        return $this->inputParams;
    }

    public function getInputParam(string $name) :mixed {
        return ($this->hasInputParam($name)) ? $this->inputParams[$name] : null;
    }

    public function hasInputParam(string $name) :bool {
        return (array_key_exists($name, $this->inputParams));
    }

    public function removeInputParam(string $name) {
        if ($this->hasInputParam($name)) {
            unset($this->inputParams[$name]);
        }
        return $this;
    }

    public function setInputParam(string $name, mixed $value) {
        $this->inputParams[$name] = $value;
        return $this;
    }

    public function setFile(string $name, mixed $content) {
        $this->files[$name] = $content;
        return $this;
    }

    public function getFile(string $name) :mixed {
        return ($this->hasFile($name)) ? $this->files[$name] : null;
    }

    public function hasFile(string $name) :bool {
        return (array_key_exists($name, $this->files));
    }

    public function getFiles() {
        return $this->files;
    }

    protected static function normalizeHeaderName(string $name) :string {
        $headerParts = explode('-', strtolower($name));
        array_walk($headerParts, function(&$item) {
            $item = ucfirst($item);
        });
        return implode('-', $headerParts);
    }

    public function getContentType() {
        return $this->hasHeader('Content-Type') ? $this->getHeader('Content-Type') : 'text/plain';
    }

    public function setContentType(string $contentType) {
        $this->setHeader('Content-Type', $contentType);
        return $this;
    }
    
}