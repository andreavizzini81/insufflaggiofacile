<?php

class Response extends HttpMessage {

    private int $statusCode = 200;

    public function __construct(int $statusCode = 200, string $body = '', $contentType = 'text/html') {
        parent::__construct();
        $this->setStatusCode($statusCode);
        $this->setBody($body);
        $this->setHeader('Content-Type', $contentType);
    }

    public function setStatusCode(int $statusCode) {
        if ($statusCode < 100 || $statusCode > 599) {
            throw new RangeException('Invalid status code. Expected value between 100 and 599');
        }
        $this->statusCode = $statusCode;
        return $this;
    }

    public function getStatuCode() :int {
        return $this->statusCode;
    }

    public function setCookie(Cookie $cookie) {
        $this->cookies[$cookie->getName()] = $cookie;
        return $this;
    }

    public function flush() {
        http_response_code($this->statusCode);
        foreach($this->headers as $headerName => $headerValue) {
            header(sprintf("%s: %s", $headerName, $headerValue));
        }
        foreach($this->cookies as $cookie) {
            if ($cookie instanceof Cookie) {
                $cookie->set();
            }
        }
        echo $this->body;
        exit(0);
    }

}