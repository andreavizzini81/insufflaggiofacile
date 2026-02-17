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

            $cityInput = $this->getFirstAvailableValue($dealData, ['citta', 'comune_immobile', 'comune', 'city']);

            $provinceInput = $this->getFirstAvailableValue($dealData, ['provincia_immobile', 'provincia', 'state']);
            $normalizedPhone = $this->normalizePhone((string)$this->getFirstAvailableValue($dealData, ['telefono', 'phone']));
            if (!$this->isPhoneValid($normalizedPhone)) {
                throw new Exception('Numero di telefono non valido');
            }
            $dealData['telefono'] = $normalizedPhone;

            $normalizedLocation = $this->normalizeLocationFromCappario($cityInput, $provinceInput);

            $firstName = $this->getFirstAvailableValue($dealData, ['first_name', 'nome_cognome', 'nome']);
            $lastName = $this->getFirstAvailableValue($dealData, ['last_name', 'cognome']);
            $email = $this->getFirstAvailableValue($dealData, ['email']);

            $contactDeal = (array)[

                'first_name' => $firstName,

                'last_name' => $lastName,

                'email' => $email,

                'phone' => $normalizedPhone,

                'city' => $normalizedLocation['city'],

                'state' => $normalizedLocation['state'],

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

            $platform = $this->getFirstAvailableValue($dealData, ['piattaforma', 'platform'], 'Facebook');

            $dealImportObject = (object)[

                'contact_id' => $contact->getId(),

                'agency_id'  => 1,

                'message'   => $dealMessage,

                'title'      => sprintf("%s %s [%s]", $contactDeal['first_name'], $contactDeal['last_name'], $platform),
				
				'metadata'   => json_encode($dealMetadata)

            ];

            $deal = new Deal();

            $deal->import($dealImportObject);            

            $deal->save();
			
			
			$calendarEventImportObject = (object)[

                'subject' => sprintf("%s %s [%s]", $contactDeal['first_name'], $contactDeal['last_name'], $platform),

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
			$mailErrorCode = null;
			
			$mailTemplate = file_get_contents(sprintf('%sview/static/CallPhoneNotification.txt', ROOT));
			$mailFields = [
				'{{DEAL_CONTACT_NAME}}' => sprintf('%s %s', $contact->getFirstName(), $contact->getLastName()),
				'{{DEAL_CONTACT_PHONE}}' => str_replace('+39','+39 ',$contact->getPhone()),
			];

			$this->validateRequiredMailEnvConfiguration();
			
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
				$contactEmail = trim((string)$contact->getEmail());
				if (filter_var($contactEmail, FILTER_VALIDATE_EMAIL) !== false) {
					$mail->addAddress($contactEmail);
				} else {
					error_log(sprintf('[FacebookLeadFormsGatewayController] Invalid contact email skipped: "%s"', $contactEmail));
				}
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
				$mailErrorCode = 'MAIL_SEND_ERROR';

				error_log(json_encode([
					'context' => 'FacebookLeadFormsGatewayController::registerLeadRequest',
					'error' => [
						'code' => $mailErrorCode,
						'message' => $ex->getMessage(),
						'stack' => $ex->getTraceAsString()
					],
					'smtp' => [
						'host' => $_ENV['MAIL_SMTP_HOST'] ?? null,
						'port' => $_ENV['MAIL_SMTP_PORT'] ?? null,
						'recipients' => [
							$contact->getEmail(),
							'andrea.vizzini81@gmail.com'
						]
					]
				], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));

				if (defined('DEBUG') && DEBUG) {
					$mailsend = $mailErrorCode;
				}
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


	private function validateRequiredMailEnvConfiguration(): void {

		$requiredEnvKeys = [
			'MAIL_ENCRYPTION',
			'MAIL_SMTP_HOST',
			'MAIL_INFO_USERNAME',
			'MAIL_INFO_PASSWORD',
			'MAIL_SMTP_PORT',
		];

		$missingKeys = [];
		foreach ($requiredEnvKeys as $envKey) {
			$value = $_ENV[$envKey] ?? null;
			if ($value === null || trim((string)$value) === '') {
				$missingKeys[] = $envKey;
			}
		}

		if (!empty($missingKeys)) {
			error_log(sprintf(
				'[FacebookLeadFormsGatewayController] Configurazione SMTP incompleta. Chiavi mancanti/vuote: %s. Stato chiavi richieste: %s',
				implode(', ', $missingKeys),
				json_encode($this->buildMailEnvSnapshot($requiredEnvKeys))
			));

			throw new Exception(sprintf(
				'Errore di configurazione email: variabili ENV mancanti o vuote (%s)',
				implode(', ', $missingKeys)
			));
		}

	}


	private function buildMailEnvSnapshot(array $requiredEnvKeys): array {

		$snapshot = [];
		foreach ($requiredEnvKeys as $envKey) {
			$value = $_ENV[$envKey] ?? null;
			$snapshot[$envKey] = ($value === null || trim((string)$value) === '')
				? 'missing_or_empty'
				: 'configured';
		}

		return $snapshot;

	}




    private function normalizePhone(string $phone): string {

        $phone = trim($phone);

        if ($phone === '') {
            return '';
        }

        $hasLeadingPlus = str_starts_with($phone, '+');
        $digits = preg_replace('/\D+/', '', $phone);

        return sprintf('%s%s', $hasLeadingPlus ? '+' : '', $digits);

    }


    private function isPhoneValid(string $phone): bool {

        $digitsCount = strlen(preg_replace('/\D+/', '', $phone));

        return $digitsCount >= 6 && $digitsCount <= 15;

    }


    private function getProvinceCode(string $provinceInput): string {

        $provinceInput = trim($provinceInput);

        if ($provinceInput === '') {
            return '';
        }

        if (strlen($provinceInput) === 2) {
            $row = $this->db->getRow(sprintf(
                "SELECT provincia FROM cappario WHERE LOWER(provincia) = '%s' LIMIT 1",
                $this->db->escape(strtolower($provinceInput))
            ));

            return ($row && isset($row->provincia)) ? strtoupper(trim($row->provincia)) : strtoupper($provinceInput);
        }

        $row = $this->db->getRow(sprintf(
            "SELECT provincia FROM cappario WHERE LOWER(nome_provincia) = '%s' LIMIT 1",
            $this->db->escape(strtolower($provinceInput))
        ));

        if ($row && isset($row->provincia)) {
            return strtoupper(trim($row->provincia));
        }

        $candidateRows = $this->db->getResults("SELECT DISTINCT provincia, nome_provincia FROM cappario");

        if (!$candidateRows || !is_array($candidateRows)) {
            return '';
        }

        $searchTerm = $this->normalizeStringForSimilarity($provinceInput);
        $bestDistance = null;
        $bestProvince = '';

        foreach ($candidateRows as $candidateRow) {
            if (!isset($candidateRow->provincia, $candidateRow->nome_provincia)) {
                continue;
            }

            $candidateNames = [
                $candidateRow->provincia,
                $candidateRow->nome_provincia,
            ];

            foreach ($candidateNames as $candidateName) {
                $candidateTerm = $this->normalizeStringForSimilarity((string)$candidateName);

                if ($candidateTerm === '') {
                    continue;
                }

                $distance = levenshtein($searchTerm, $candidateTerm);

                if ($bestDistance === null || $distance < $bestDistance) {
                    $bestDistance = $distance;
                    $bestProvince = strtoupper(trim((string)$candidateRow->provincia));
                }
            }
        }

        return $bestProvince;

    }


    private function normalizeLocationFromCappario(string $cityInput, string $stateInput): array {

        $cityInput = trim($cityInput);
        $stateInput = trim($stateInput);

        $stateCode = $this->getProvinceCode($stateInput);

        if ($cityInput === '') {
            return ['city' => '', 'state' => $stateCode];
        }

        $exactWhere = sprintf("LOWER(localita) = '%s'", $this->db->escape(strtolower($cityInput)));

        if ($stateCode !== '') {
            $exactWhere .= sprintf(" AND LOWER(provincia) = '%s'", $this->db->escape(strtolower($stateCode)));
        }

        $exactMatch = $this->db->getRow(sprintf(
            "SELECT localita, provincia FROM cappario WHERE %s LIMIT 1",
            $exactWhere
        ));

        if ($exactMatch && isset($exactMatch->localita, $exactMatch->provincia)) {
            return [
                'city' => trim((string)$exactMatch->localita),
                'state' => strtoupper(trim((string)$exactMatch->provincia)),
            ];
        }

        $candidateWhere = '';
        if ($stateCode !== '') {
            $candidateWhere = sprintf("WHERE LOWER(provincia) = '%s'", $this->db->escape(strtolower($stateCode)));
        }

        $candidateRows = $this->db->getResults(sprintf(
            "SELECT localita, provincia FROM cappario %s GROUP BY localita, provincia",
            $candidateWhere
        ));

        if (!$candidateRows || !is_array($candidateRows)) {
            return ['city' => $cityInput, 'state' => $stateCode];
        }

        $searchTerm = $this->normalizeStringForSimilarity($cityInput);
        $bestDistance = null;
        $bestCity = $cityInput;
        $bestState = $stateCode;

        foreach ($candidateRows as $candidateRow) {
            if (!isset($candidateRow->localita, $candidateRow->provincia)) {
                continue;
            }

            $candidateCity = trim((string)$candidateRow->localita);
            $candidateTerm = $this->normalizeStringForSimilarity($candidateCity);

            if ($candidateTerm === '') {
                continue;
            }

            $distance = levenshtein($searchTerm, $candidateTerm);

            if ($bestDistance === null || $distance < $bestDistance) {
                $bestDistance = $distance;
                $bestCity = $candidateCity;
                $bestState = strtoupper(trim((string)$candidateRow->provincia));
            }
        }

        return ['city' => $bestCity, 'state' => $bestState];

    }


    private function normalizeStringForSimilarity(string $value): string {

        $normalized = strtolower(trim($value));
        $transliterated = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $normalized);

        if ($transliterated !== false) {
            $normalized = $transliterated;
        }

        return preg_replace('/[^a-z0-9]/', '', $normalized) ?? '';

    }


    private function getFirstAvailableValue(array $data, array $keys, string $default = ''): string {

        foreach ($keys as $key) {
            if (!array_key_exists($key, $data)) {
                continue;
            }

            $value = trim((string)$data[$key]);
            if ($value !== '') {
                return $value;
            }
        }

        return $default;

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
