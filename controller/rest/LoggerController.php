<?php

class LoggerController extends RestController {

    public function __invoke(): Response {
        $logData = [
            'method'      => $this->request->getMethod(),
            'queryParams' => $this->request->getQueryParams(),
            'inputParams' => $this->request->getInputParams()
        ];

        error_log(
            json_encode($logData, 128)
        );

        return $this->returnResult(null);
    }



}