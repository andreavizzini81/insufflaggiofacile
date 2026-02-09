<?php

class NotAuthorizedController {

    private App     $app;
    private Request $request;

    public function __construct(Request &$request, App &$app) {
        $this->app = $app;
        $this->request = $request;
        $this->response = new Response();
        $this->response->setContentType('application/json');
    }

    public function render() :Response {
        return new Response(401);
    }
    
}

?>