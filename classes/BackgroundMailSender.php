<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class BackgroundMailSender extends BaseComponent {

    public function processAgencyDealNotifications(mixed $data): bool {

        $deal = new Deal($data['dealId']);
        if (!$deal->exists()) {
            return false;
        }
        Cli::print(
            ' BackgroundMailSender::processAgencyDealNotifications ',
            false,
            'white',
            'magenta'
        );
        Cli::print(
            sprintf(' DEAL: %d ', $deal->getId()),
            false,
            'white',
            'cyan'
        );

        $agency = new Agency($deal->getAgencyId());
        if (!$agency->exists()) {
            return false;
        }

        Cli::print(
            sprintf(' AGENCY: %d ', $agency->getId()),
            false,
            'white',
            'yellow'
        );

        $contact = new Contact($deal->getContactId());

        Cli::print(
            sprintf(' CONTACT: %d ', $contact->getId()),
            false,
            'white',
            'blue'
        );

        $mailTemplate = file_get_contents(sprintf('%sview/static/AgencyDealNotification.html', ROOT));
        $mailFields = [
            '{{DEAL_TITLE}}' => $deal->getTitle(),
            '{{DEAL_CONTACT_NAME}}' => sprintf('%s %s', $contact->getFirstName(), $contact->getLastName()),
            '{{DEAL_CONTACT_EMAIL}}' => $contact->getEmail(),
            '{{DEAL_CONTACT_PHONE}}' => $contact->getPhone(),
            '{{DEAL_LINK}}' => sprintf('https://www.rentalness.com/admin/deal/%d', $deal->getId())
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
            $mail->addAddress($agency->getEmail());
            $mail->isHTML(true);
            $mail->Subject = 'Nuova richiesta da sito web';
            $mail->CharSet = 'UTF-8';
            $mail->Body    = str_replace(
                array_keys($mailFields),
                array_values($mailFields),
                $mailTemplate
            );
            if ($mail->send()) {
                Cli::print(' OK ', true, 'white', 'green');
                return true;
            }
        } catch (\Exception $ex) {
            Cli::print(' KO ', true, 'white', 'red');
            error_log($ex->getMessage());
        }
        return false;
    }

}