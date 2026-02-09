<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class UserController extends RestController {

    public function setData(): Response {

        $userData = $this->request->getInputParams();

        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            return $this->returnErrorMessage('Indirizzo email formalmente non valido', 400);
        }

        if (!$this->validateKeyParams($userData['id'] ?? null, $userData['email'])) {
            return $this->returnErrorMessage('L\'indirizzo email specificato risulta gi&agrave; registrato.', 400);
        }

        $user = new User($userData['id'] ?? null);

        if (isset($userData['password']) && $userData['password'] != '') {

            if ($userData['password'] != $userData['password_confirm'] ?? null) {
                return $this->returnErrorMessage('La password e la conferma non coincidono', 400);
            }

            if (!User::checkPasswordComplexity($userData['password'])) {
                return $this->returnErrorMessage('La password specificata non &egrave; abbastanza sicura', 400);
            }

            $userData['password'] = User::hashPassword($userData['password']);
        } else {
            unset($userData['password']);
        }

        if (isset($userData['default_agency_id']) && $userData['default_agency_id'] == '') {
            $userData['default_agency_id'] = null;
        }

        $user->import((object)$userData);
        
        $inboundAuthorizedAgenciesId = $userData['authorized_agency_id'] ?? [];
        is_array($inboundAuthorizedAgenciesId) && $user->setAuthorizedAgenciesId($inboundAuthorizedAgenciesId);

        $userId = $user->save();
        if ($userId === false) {
            return $this->returnErrorMessage('Impossibile salvare l&rsquo;utente.');
        }

        return $this->returnResult(['id' => $userId]);
    }

    public function delete(): Response {

        $id = $this->request->getQueryParam('id');
        if (is_null($id)) {
            return $this->returnErrorMessage('Riferimento utente non valido', 400);
        }
        $user = new User($id);
        if (!$user->exists()) {
            return $this->returnErrorMessage('Utente non trovato', 404);
        }

        return $user->delete() ?
            $this->returnResult(null) :
            $this->returnErrorMessage('Impossibile eliminare l\'utente.');
    }

    public function checkUniqueness(): Response {
        $id = $this->request->getInputParam('id');
        $email = $this->request->getInputParam('email');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->returnErrorMessage('Indirizzo email formalmente non valido');
        }
        if ($this->validateKeyParams($id, $email)) {
            return $this->returnResult(null);
        } else {
            return $this->returnErrorMessage('L\'indirizzo email specificato risulta gi&agrave; registrato.');
        }
    }

    private function validateKeyParams($id, $email) {
        $userId = $this->getUserIdByMail($email);
        if (is_null($userId) || $userId == $id) {
            return true;
        }
        return false;
    }

    private function getUserIdByMail($email) {
        return $this->db->selectOne(
            'user', 
            ['id'], 
            sprintf('email = \'%s\'', $this->db->escape(strtolower(trim($email))))
        );
    }

    public function sendPasswordRestoreToken(): Response {
        $email = $this->request->getInputParam('email');
        if (is_null($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $this->returnErrorMessage('L\'indirizzo email specificato non &egrave; valido.');
        }
        $userId = $this->getUserIdByMail($email);
        /* If no user available for the provided mail will still return success in order to prevent mail spoofing */
        if (is_null($userId)) {
            return $this->returnResult(null);
        }
        $user = new User($userId);
        if (!$user->getIsActive()) {
            return $this->returnErrorMessage('Utenza non attiva.<br>Non &egrave; possibile ripristinare la password.');
        }
        if (!$user->isSubscriptionActive()) {
            return $this->returnErrorMessage('Abbonamento scaduto.<br>Non &egrave; possibile ripristinare la password.');
        }
        $this->cleanupPreviousPasswordRestoreRequests($userId);
        $tokenExpiration = (new DateTime())->add(new DateInterval('PT3600S'));
        $payload = [
            'iss' => $_ENV['SW_PRODUCT_NAME'],
            'uid' => $userId,
            'exp' => $tokenExpiration->getTimestamp()
        ];
        $token = Firebase\JWT\JWT::encode(
            $payload, 
            $_ENV['USER_JWT_KEY'], 
            'HS256'
        );
        $requestStoreResult = $this->db->insert(
            'user_password_restore', [
                'user_id' => $userId,
                'token' => $token,
                'created_at' => date('Y-m-d H:i:s'),
                'expires_at' => $tokenExpiration->format('Y-m-d H:i:s')
            ]
        );
        if ($requestStoreResult === false) {
            return $this->returnErrorMessage('Impossibile elaborare la richiesta di ripristino della password');
        }
        $restoreUrl = sprintf('%sadmin/password-restore-form?token=%s', $this->app->path, $token);
        $mailTemplate = file_get_contents(sprintf('%sview/static/PasswordRestore.html', ROOT));
        $mailFields = [
            '{{SW_PRODUCT_NAME}}' => $_ENV['SW_PRODUCT_NAME'],
            '{{EMAIL}}' => $email,
            '{{TOKEN_URL}}' => $restoreUrl,
            '{{VALID_UNTIL}}' => $tokenExpiration->format('d/m/Y H:i:s')
        ];
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
            $mail->Host       = $_ENV['MAIL_SMTP_HOST'];
            $mail->Username   = $_ENV['MAIL_NOREPLY_USERNAME'];
            $mail->Password   = $_ENV['MAIL_NOREPLY_PASSWORD'];
            $mail->Port       = $_ENV['MAIL_SMTP_PORT'];
            $mail->setFrom($_ENV['MAIL_NOREPLY_USERNAME'], $_ENV['SW_PRODUCT_NAME']);
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Ripristino della password';
            $mail->CharSet = 'UTF-8';
            $mail->Body    = str_replace(
                array_keys($mailFields),
                array_values($mailFields),
                $mailTemplate
            );
            if ($mail->send()) {
                return $this->returnResult(null);
            }
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return $this->returnErrorMessage('Impossibile inviare la mail');
        }
    }

    private function cleanupPreviousPasswordRestoreRequests(int $userId) {
        return $this->db->delete(
            'user_password_restore',
            sprintf('user_id = %s', $userId)
        ) !== false;
    }

    public function setNewPassword(): Response {
        $params = $this->request->getInputParams();
        if (!isset($params['new_password']) || !isset($params['new_password_confirm']) || !isset($params['token'])) {
            return $this->returnErrorMessage('Parametri incompleti.');
        }
        try {
            $jwtData = Firebase\JWT\JWT::decode(
                $params['token'], 
                new Firebase\JWT\Key($_ENV['USER_JWT_KEY'], 'HS256')
            );
            $request = $this->db->selectRow(
                'user_password_restore',
                '*',
                sprintf('user_id = %d AND token = \'%s\'', $jwtData->uid, $this->db->escape($params['token']))
            );
            if (!$request) {
                return $this->returnErrorMessage('Richiesta di recupero della password non trovata.<br>Verificare di aver usato il link di ripristino contenuto nella mail pi&ugrave; recente.');
            }
            if ($params['new_password'] !== $params['new_password_confirm']) {
                return $this->returnErrorMessage('La conferma della password non corrisponde. Verificare che entrambi i campi siano uguali.');
            }
            if (!preg_match(User::PASSWORD_REGEX, $params['new_password'])) {
                return $this->returnErrorMessage('La nuova password non &egrave; valida oppure non &egrave; sufficientemente complessa.');
            }
            $user = new User($request->user_id);
            if (!$user->setPassword($params['new_password'])->save()) {
                return $this->returnErrorMessage('Si &egrave; verificato un errore durante l&rsquo;impostazione della nuova password.');
            }
            $this->db->delete(
                'user_password_restore',
                sprintf('token = \'%s\'', $this->db->escape($params['token']))
            );
            return $this->returnResult(null);
        } catch(\Firebase\JWT\ExpiredException $ex) {
            return $this->returnErrorMessage('Il link utilizzato &egrave; scaduto. Effettuare una nuova richiesta di ripristino della password.<br>I link di ripristino hanno una durata massima di 1 ora.');
        } catch(\Exception $ex) {
            return $this->returnErrorMessage('Token della richiesta non valido.');
        }
    }

    public function getSiblingsUsers(): Response {

        return $this->returnResult([
            'list' => $this->user->getSiblings(),
            'selfId' => $this->user->getId()
        ]);
    }

    public function getAuthorizedAgencies(): Response {

        return $this->returnResult([
            'list' => array_map(
                function($agencyId) {
                    return new Agency($agencyId);
                }, $this->user->getAuthorizedAgenciesId()
            )
        ]);
    }

}