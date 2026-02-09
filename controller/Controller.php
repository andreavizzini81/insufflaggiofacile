<?php

abstract class Controller {

    protected App         $app;
    protected Database    $db;
    protected Request     $request;
    protected Response    $response;

    public function __construct(Request &$request) {

        $this->request = $request;
        $this->app = Container::App();
        $this->db =  Container::Database();
        $this->response = new Response();

    }

    

    


}