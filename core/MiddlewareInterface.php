<?php

interface MiddlewareInterface {

    public function processRequest(Request &$request, Route &$route) :Request;
    public function processResponse(Response &$response) :Response;

}

?>