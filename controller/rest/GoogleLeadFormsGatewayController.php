<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class GoogleLeadFormsGatewayController extends RestController {

    public function registerLeadRequest() { 

        try {

            $rawRequestContent = $this->request->getBody();
            $data = json_decode($rawRequestContent, true);
            if (!is_array($data) || empty($data)) {
                return $this->returnErrorMessage('Invalid payload', 400);
            }

            if (!isset($data['lead_id']) || !isset($data['user_column_data'])) {
                return $this->returnErrorMessage('Invalid payload', 400);
            }

            $user_column_data = $data['user_column_data'];
            
            $googleContactFieldsMap = [
                'FIRST_NAME' => 'first_name',
                'LAST_NAME' => 'last_name',
                'PHONE_NUMBER' => 'phone',
                'EMAIL' => 'email',
                'REGION' => 'state',
                'CITY' => 'city'
            ];
            
            $contactDeal = (array)[
                'registration_channel' => 'Google'
            ];
            
            foreach($user_column_data as $column) {
                
                if (!array_key_exists($column['column_id'], $googleContactFieldsMap)) {
                    continue;
                }
            
                $contactDeal[
                    $googleContactFieldsMap[$column['column_id']]
                ] = $column['string_value'];
                    
            }
            
            $contact = $this->registerContact($contactDeal);
            $dealImportObject = (object)[
                'contact_id' => $contact->getId(),
                'agency_id'  => 1,
                'title'      => sprintf("%s %s [%s]", $contactDeal['first_name'], $contactDeal['last_name'], 'Google'),
				'metadata'   => ''
            ];

            $deal = new Deal();

            $deal->import($dealImportObject);            

            $deal->save();
			
			
			$calendarEventImportObject = (object)[

                'subject' => sprintf("%s %s [%s]", $contactDeal['first_name'], $contactDeal['last_name'], $registration_channel),

                'activity'  => 'Primo appuntamento telefonico',
				
				'entity'  => 'deal',
				
				'entity_id'  => $deal->getId(),
				
				'starts_at' => date('Y-m-d 09:00:00', strtotime('+1 day')),
				
				'ends_at' => date('Y-m-d 20:30:00', strtotime('+1 day')),
				
				'user_id' => 4,
				
				'status' => 'pending'

            ];
			
			$calendarEvent = new CalendarEvent();
			
			$calendarEvent->import($calendarEventImportObject);            

            $calendarEvent->save();
			
			
			$contactGoogle = $this->registerContactGoogle($contactDeal);
			
			$mailsend = "false";
			
			$mailTemplate = file_get_contents(sprintf('%sview/static/CallPhoneNotification.txt', ROOT));
			$mailFields = [
				'{{DEAL_CONTACT_NAME}}' => sprintf('%s %s', $contact->getFirstName(), $contact->getLastName()),
				'{{DEAL_CONTACT_PHONE}}' => str_replace('+39','+39 ',$contact->getPhone()),
			];
			
			$mail = new PHPMailer(true);
			try {
				$mail->isSMTP();
				$mail->SMTPAuth   = true;
				$mail->SMTPSecure = $_ENV['MAIL_ENCRYPTION'];
				$mail->Host       = $_ENV['MAIL_SMTP_HOST'];
				$mail->Username   = $_ENV['MAIL_INFO_USERNAME'];
				$mail->Password   = $_ENV['MAIL_INFO_PASSWORD'];
				$mail->Port       = $_ENV['MAIL_SMTP_PORT'];
				$mail->setFrom($_ENV['MAIL_INFO_USERNAME'], $_ENV['SW_PRODUCT_NAME']);
                $mail->addAddress($contact->getEmail());
				$mail->addAddress("andrea.vizzini81@gmail.com");
				$mail->isHTML(false);
				$mail->Subject = 'Coibenta la Tua Casa con l\'Insufflaggio';
				$mail->CharSet = 'UTF-8';
				$mail->Body    = str_replace(
					array_keys($mailFields),
					array_values($mailFields),
					$mailTemplate
				);
				if ($mail->send()) {
					$mailsend = "true";
				}
			} catch (\Exception $ex) {
				$mailsend = "errore";
			}

            
            return $this->returnResult(['deal' => $dealData, 'event' => $calendarEvent, 'contactGoogle' => $contactGoogle, 'mailSend' => $mailsend ]);


        } catch(Exception $ex) {
            return $this->returnErrorMessage($ex->getMessage());
        }

    }
	
	
	private function registerContactGoogle(array $data){
		
		$_ZAP_ARRAY = json_encode($data) ;

		$ZAPIER_HOOK_URL = "https://hooks.zapier.com/hooks/catch/15316410/3gbhmwj/";

		$ch = curl_init( $ZAPIER_HOOK_URL);
		curl_setopt( $ch, CURLOPT_POST, 1);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $_ZAP_ARRAY);
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt( $ch, CURLOPT_HEADER, 0);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
		
		$response = curl_exec( $ch );
		
		return $response;
		
	}



    private function getState(string $city){

        $row = $this->db->getRow(sprintf("SELECT provincia FROM cappario WHERE nome_provincia LIKE LOWER('%s')", trim(strtolower($city)) ));

        return $row->provincia;

    }



    private function registerContact(array $data): Contact {

        $contact = new Contact();

        $contact->import((object)$data);

        /*

        if (!$contact->exists()) {

            $contact

                ->setType($data['customer_type'])

                ->setRegistrationIp($_SERVER['REMOTE_ADDR']);

        }

        */

        if (!$contact->save()) {

            throw new Exception('Cannot store contact data');

        }

        return $contact;

    }



}