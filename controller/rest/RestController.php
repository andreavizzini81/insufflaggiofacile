<?php

abstract class RestController {

    protected App       $app;
    protected Database  $db;
    protected Request   $request;
    protected Response  $response;
    protected ?Session  $session;
    protected ?User     $user;

    protected object $handler;
    protected object $output;
    
    public function __construct(Request &$request, App &$app) {
        $this->app = $app;
        $this->request = $request;
        $this->response = new Response();
        $this->response->setContentType('application/json');

        $this->db = Container::Database();
        $this->session = Container::has('Session') ? Container::Session() : null;
        $this->user = Container::has('User') ? Container::User() : null;

        $this->init();
    }

    private function init() {
        $this->output = (object)[
            'status' => 0,
            'execution' => (object)[
                'startedAt' => date('Y-m-d H:i:s')
            ]
        ];
    }

    protected function setErrorMessage(string $message, ?int $statusCode = null) {
        $this->output->message = $message;
        if ($statusCode) {
            $this->setStatusCode($statusCode);
        }
    }

    protected function setStatus(bool $status) {
        $this->output->status = (int)$status;
    }

    protected function setStatusCode(int $statusCode) {
        $this->response->setStatusCode($statusCode);
    }

    protected function getResponse() :Response {
        $this->output->execution->endedAt = date('Y-m-d H:i:s');
        $this->response->setBody(json_encode($this->output));
        return $this->response;
    }

    public function setResult(mixed $output) :void {
        $this->output->result = $output;
    }

    public function returnResult(mixed $output, bool $status = true) :Response {
        if ($output) {
            $this->setResult($output);
        }
        $this->setStatus($status);
        return $this->getResponse();
    }

    public function returnErrorMessage(string $message, ?int $statusCode = null) :Response {
        $this->setErrorMessage($message, $statusCode);
        return $this->getResponse();
    }

}