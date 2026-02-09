<?php

class AdminAuthenticationMiddleware extends BaseComponent implements MiddlewareInterface {

    public function __construct() {
        parent::__construct();
    }

    public function processRequest(Request &$request, Route &$route): Request {

        $token = $request->getCookie('USER_SESSION');
        $userSession = new UserSession($token);

        Container::set('Session', $userSession);

        if ($userSession->isValid()) {
            $user = $userSession->getEntity();
            Container::set('User', $user);
            if ($route->getAccessLevel()->value > $user->getRoleId()) {
                (new Response(401))->flush();
            }
        } else {
            if ($route->getAccessLevel() !== AccessLevel::PUBLIC) {
                (new Response(301))->setHeader('Location', sprintf(
                    '%sadmin/login', Container::App()->path
                ))->flush();
            }
        }
        
        return $request;
    }

    public function processResponse(Response &$response): Response {
        return $response;
    }

}