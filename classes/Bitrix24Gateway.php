<?php

class Bitrix24Gateway {

    private int    $userId;
    private string $token;
    private string $host;
    private string $endpoint;
    private object $customFields;

    private const METHODS = ['GET', 'POST', 'PUT', 'PATCH'];
    
    public function __construct(object $config) {
        $this->userId = $config->userId;
        $this->token = $config->token;
        $this->host = $config->host;
        $this->customFields = $config->customFields;
        $this->endpoint = sprintf('%s/rest/%d/%s/', $this->host, $this->userId, $this->token);
    }

    public function getCustomFields() {
        return $this->customFields;
    }

    public function getEndpoint() {
        return $this->endpoint;
    }

    public function invokeApi(string $method, string $action, array $data = [], array $options = []) {
    
        if (!in_array($method, self::METHODS)) {
            throw new Exception('Request method is not valid');
        }

        $url = sprintf('%s%s', $this->endpoint, $action);
        
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new Exception('Supplied URL is not valid');
        }
    
        $ch = curl_init($url);
    
        $headers = [];
    
        if ($method != 'GET') {
            $payload = json_encode($data, JSON_INVALID_UTF8_IGNORE);
            $headers[] = 'Content-Type: application/json';
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        }

        if (isset($options['headers']) && is_array($options['headers']) && count($options['headers']) > 0) {
            $headers = array_unique(array_merge($headers, $options['headers']));
        }
    
        $output = new stdClass();
        
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = curl_exec($ch);
        $output->body = json_decode($result);
        
        $output->statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $output->headers = curl_getinfo($ch);
        curl_close($ch);
        return $output;
    }

}