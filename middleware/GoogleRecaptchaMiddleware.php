<?php

class GoogleRecaptchaMiddleware extends BaseComponent implements MiddlewareInterface {

    private const RECAPTCHA_PRIVATE_KEY = '6Lcl1_8lAAAAAIp6OtKKbsTTBGtKkZFZl5bbZe_U';

    public function processRequest(Request &$request, Route &$route): Request {

        $recaptchaToken = $request->getInputParam('token');
        $responseError = (object)[
            'status' => 0,
            'message' => ''
        ];
        if (is_null($recaptchaToken)) {
            $responseError->message = 'Parametri della richiesta incompleti.';
            (new Response(
                403,json_encode($responseError), 'application/json')
            )->flush();
        }
        $validation = self::validateRecaptchaToken($recaptchaToken);
        if (!$validation->success) {
            $responseError->message = 'Richiesta non valida.';
            (new Response(
                403,json_encode($responseError), 'application/json')
            )->flush();
        }
        $request->removeInputParam('token');

        return $request;
    }

    private static function validateRecaptchaToken($token) {

        $payload = http_build_query([
            'secret' => self::RECAPTCHA_PRIVATE_KEY,
            'response' => $token
        ]);

        $ch = curl_init('https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded',
            'Content-Length: '.strlen($payload)
        ]);
        $result = curl_exec($ch);
        return json_decode($result);
    }

    public function processResponse(Response &$response): Response {
        return $response;
    }

}


?>