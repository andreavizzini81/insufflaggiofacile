<?php

abstract class CliController {

    protected App       $app;
    protected Database  $db;
    protected Response  $response;

    protected object $arguments;
    protected object $output;
    
    public function __construct(object $arguments, App &$app) {
        mb_internal_encoding('utf-8');
        $this->app = $app;
        $this->arguments = $arguments;
        $this->response = new Response();
        $this->db = Container::Database();
    }

    protected function getResponse(): Response {
        $this->output->execution->endedAt = date('Y-m-d H:i:s');
        $this->response->setBody(json_encode($this->output));
        return $this->response;
    }

}