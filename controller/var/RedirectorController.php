<?php

class RedirectorController {

    protected App         $app;
    protected Request     $request;
    protected Response    $response;

    public function __construct(Request &$request, App &$app) {
        $this->app = $app;
        $this->request = $request;
        $this->response = new Response();
    }

    public function __invoke() {
        $destination = $this->request->getQueryParam('destination');
        $destinationUri = sprintf('%s%s', $this->app->path, $destination ?? '');
        $this->response->setHeader('Location', $destinationUri)->setStatusCode(301)->flush();
    }
}






?>