<?php

class SessionController extends RestController {

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
    }

    public function login() :Response {
        $username = $this->request->getInputParam('username');
        $password = $this->request->getInputParam('password');
        try {
            if (is_null($username) || is_null($password)) {
                throw new Exception('Parametri di autenticazione mancanti', 403);
            }
            $user = new User();
            $user->importFromKey('email', $username);
            if (!$user->exists() || !$user->verifyPassword($password)) {
                throw new Exception('Login fallito: nome utente o password errati.', 401);
            }
            if (!$user->getIsActive()) {
                throw new Exception('Utenza non abilitata, contattare il servizio commerciale.', 401);
            }
            if (!$user->isSubscriptionActive()) {
                throw new Exception('Abbonamento scaduto. Per rinnovarlo contattare il servizio commerciale.', 401);
            }
            if (!$this->session->setUser($user)->persist()) {
                throw new Exception('Impossibile registrare la sessione.', 500);
            }
            $this->response->setCookie(
                (new Cookie())
                    ->setName('USER_SESSION')
                    ->setValue($this->session->getToken())
                    ->setDomain($this->request->getHost())
                    ->setExpiresAt(
                        (new DateTime())->add(new DateInterval('PT86400S'))
                    )
            );
            $this->setResult($this->session);
            $this->setStatus(true);
        } catch (Exception $ex) {
            $this->setErrorMessage($ex->getMessage(), $ex->getCode());
        }
        return $this->getResponse();
    }

    public function logout() :Response {
        $this->session->destroy();
        $this->setStatus(true);
        return $this->getResponse();
    }

    public function getInfo() :Response {
        $this->setResult($this->session);
        $this->setStatus(true);
        return $this->getResponse();
    }

}

?>