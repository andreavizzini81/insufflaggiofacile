<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class EmailController extends RestController {

    public function sendFromModal(): Response {

        $agencyId = $this->user->getDefaultAgencyId();
        if (is_null($agencyId)) {
            return $this->returnErrorMessage('L&rsquo;utente correntemente loggato non &egrave; associato ad alcuna agenzia.');
        }

        $agency = new Agency($agencyId);
        if (!$agency->exists()) {
            return $this->returnErrorMessage('Riferimento agenzia non valido. ['.$agencyId.']');
        }

        if (!$agency->smtpIsEnabled()) {
            return $this->returnErrorMessage(
                sprintf('L&rsquo;agenzia %s non &egrave; abilitata all&rsquo;invio delle mail.', $agency->getDescription())
            );
        }

        $subject = $this->request->getInputParam('subject');
        if (!is_string($subject) || trim($subject) == '') {
            return $this->returnErrorMessage('L&rsquo;oggetto della mail non pu&ograve; essere vuoto.');
        }

        $body = $this->request->getInputParam('body');
        if (!is_string($body) || trim($body) == '') {
            return $this->returnErrorMessage('Il corpo della mail non pu&ograve; essere vuoto.');
        }

        $recipients = $this->request->getInputParam('recipient');
        if (is_null($recipients) || !is_array($recipients) || empty($recipients)) {
            return $this->returnErrorMessage('Riferimento destinatari non valido.');
        }
        $sanitizedRecipients = array_filter($recipients, function($recipient) {
            return filter_var($recipient, FILTER_VALIDATE_EMAIL);
        });
        if (count($sanitizedRecipients) < count($recipients)) {
            return $this->returnErrorMessage('Uno o pi&ugrave; destinatari non sono validi.');
        }

        $ccs = $this->request->getInputParam('cc');
        if (is_array($ccs) && !empty($ccs)) {
            $sanitizedCcs = array_filter($ccs, function($cc) {
                return filter_var($cc, FILTER_VALIDATE_EMAIL);
            });
            if (count($sanitizedCcs) < count($ccs)) {
                return $this->returnErrorMessage('Uno o pi&ugrave; destinatari in copia non sono validi.');
            }
        }

        $files = $this->request->getFile('attachments');
        if (is_array($files) && !empty($files)) {
            $validFiles = array_filter($files, function($file) {
                return $file->getError() == 0;
            });
            if (count($validFiles) < count($files)) {
                return $this->returnErrorMessage('Uno o pi&ugrave; file non sono validi.');
            }
        }

        $handler = new PHPMailer(true);
        try {
            $handler->isSMTP();
            $handler->SMTPAuth   = true;
            $handler->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
            $handler->Host       = $_ENV['MAIL_SMTP_HOST'];
            $handler->Port       = $_ENV['MAIL_SMTP_PORT'];
            $handler->Username   = $agency->getSmtpUsername();
            $handler->Password   = $agency->getSmtpPassword();
            $handler->CharSet    = 'UTF-8';
            $handler->isHTML(false);
            $handler->Subject = $subject;
            $handler->Body = $body;
            $handler->setFrom(
                $agency->getSmtpUsername(), 
                $agency->getDescription()
            );
            foreach($sanitizedRecipients as $recipient) {
                $handler->addAddress($recipient);
            }
            if (isset($sanitizedCcs)) {
                foreach($sanitizedCcs as $cc) {
                    $handler->addCC($cc);
                }
            }

            if (isset($validFiles)) {
                foreach($validFiles as $file) {
                    $handler->addAttachment(
                        $file->getTmpName(),
                        $file->getName(),
                        PHPMailer::ENCODING_BASE64,
                        $file->getMimeType()
                    );
                }
            }
            
            if ($handler->send()) {
                return $this->returnResult(null);
            }
        } catch (\Exception $ex) {
            error_log($ex->getMessage());
            return $this->returnErrorMessage(
                sprintf("Impossibile inviare la mail.<br>%s", $ex->getMessage())
            );
        }

    }



}