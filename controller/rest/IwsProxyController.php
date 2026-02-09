<?php

class IwsProxyController extends RestController {

    private string $apiKey;

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
        $this->apiKey = $_ENV['IWS_API_KEY'];
    }

    public function __invoke() {
        $query = $this->request->getQueryParam('query');
        if(is_null($query)) {
            return $this->returnErrorMessage('Richiesta non valida', 400);
        }
        $request = clone $this->request;
        $request->setHost('iws.privacar.com')
                ->setPath(sprintf('/%s', $this->request->getQueryParam('query')))
                ->removeQueryParam('query');
                //->setBearerToken($this->apiKey);
        echo $request->getUrl();
        $response = $request->send();
        Utils::varDebug($response->getBody());
        //return $this->returnResult();
    }


}