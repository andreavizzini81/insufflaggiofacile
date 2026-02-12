<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class FacebookLeadFormsGatewayController extends RestController {

    private array  $requestData;

    public function __construct(Request &$request, App &$app) {

        parent::__construct($request, $app);

        $this->requestData = $this->request->getInputParams();

    }

    public function registerLeadRequest() {

        try {

            $dealData = $this->requestData;

            $cityInput = $dealData['citta'] ?? $dealData['comune_immobile'] ?? $dealData['comune'] ?? '';

            $stateInput = $dealData['provincia_immobile'] ?? $dealData['provincia'] ?? '';

            $contactDeal = (array)[

                'first_name' => (array_key_exists('nome_cognome', $dealData)) ? $dealData['nome_cognome'] : $dealData['nome'],

                'last_name' => (array_key_exists('cognome', $dealData)) ? $dealData['cognome'] : '',

                'email' => (array_key_exists('email', $dealData)) ? $dealData['email'] : '',

                'phone' => (array_key_exists('telefono', $dealData)) ? $dealData['telefono'] : '',

                'city' => $cityInput,

                'state' => $stateInput,

            ];

            $contact = $this->registerContact($contactDeal);

            $dealMessage = (array_key_exists('descrizione_problema', $dealData)) ? $dealData['descrizione_problema'] : '';
            

            $dealMetadata = [];
			
			$chiaviEscluse = ['nome', 'cognome', 'email', 'telefono', 'comune_immobile', 'provincia_immobile', 'descrizione_problema'];
			
			foreach ($dealData as $key => $value) {
				
				//if (!in_array($key, $chiaviEscluse)) {
					
					$dealMetadata[htmlspecialchars($key)] = htmlspecialchars($value);
					
				//}
				
			}

            /**/

            $dealImportObject = (object)[

                'contact_id' => $contact->getId(),

                'agency_id'  => 1,

                'message'   => $dealMessage,

                'title'      => sprintf("%s %s [%s]", $contactDeal['first_name'], $contactDeal['last_name'], $dealData['piattaforma']),
				
				'metadata'   => json_encode($dealMetadata)

            ];

            $deal = new Deal();

            $deal->import($dealImportObject);            

            $deal->save();
			
			
			$calendarEventImportObject = (object)[

                'subject' => sprintf("%s %s [%s]", $contactDeal['first_name'], $contactDeal['last_name'], $dealData['piattaforma']),

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
            
            /*

            (new BackgroundTask())

                ->setClass('BackgroundMailSender')

                ->setMethod('processAgencyDealNotifications')

                ->setMetadataEntry('dealId', $deal->getId())

                ->save();

            return $this->returnResult(['deal_id' => $deal->getId()]);

            */
			
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
				//$mail->addAddress("andrea.vizzini81@gmail.com");
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
			/**/
            return $this->returnResult(['deal' => $dealData, 'contact' => $contact, 'event' => $calendarEvent, 'contactGoogle' => $contactGoogle, 'mailSend' => $mailsend, 'metadata' => $dealMetadata ]);

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
