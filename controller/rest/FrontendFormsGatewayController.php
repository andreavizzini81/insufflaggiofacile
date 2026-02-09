<?php

class FrontendFormsGatewayController extends RestController {

    private object $bitrix24Config;
    private array  $requestData;
    private Bitrix24Gateway $gateway;

    private const LEAD_REQ_IDENTIFIERS = [
        'delivery_time_req' => 'Richiesta tempi consegna',
        'franchising_req'   => 'Richiesta informazioni franchising Rentalness',
        'generic_lead'      => 'Richiesta generica',
        'appointment_req'   => 'Richiesta appuntamento'
    ];

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
        $this->initializeGateway();
        $this->requestData = $this->request->getInputParams();
    }

    private function initializeGateway() {
        $this->bitrix24Config = (new Setting('bitrix24_config'))->getValue();
        $this->gateway = new Bitrix24Gateway(
            $this->bitrix24Config
        );
    }

    public function registerRentCustomRequest(): Response {

        try {
    
            $contact = $this->registerContact($this->request->getInputParam('contact'));
            $requestData = $this->request->getInputParam('request');

            $dealImportObject = (object)[
                'contact_id' => $contact->getId(),
                'agency_id'  => $this->request->getInputParam('agency_id'),
                'title'      => 'Richiesta personalizzata'
            ];

            $deal = new Deal();
            $deal->import($dealImportObject);

            // Referer della pagina
            if ($this->request->hasInputParam('url')) {
                $deal->setMetadataEntry('referer', $this->request->getInputParam('url'));
            }
            
            // Riferimento al veicolo
            if ($this->request->hasInputParam('vehicleId')) {
                $vehicle = new Vehicle($this->request->getInputParam('vehicleId'));
                if ($vehicle->exists()) {
                    $deal->setMetadataEntry('vehicle', (object)[
                        'id' => $vehicle->getId(),
                        'make' => $vehicle->getMake(),
                        'model' => $vehicle->getModel(),
                        'variant' => $vehicle->getVariant(),
                        'makeId' => $vehicle->getMakeId(),
                        'modelId' => $vehicle->getModelId(),
                        'variantId' => $vehicle->getVariantId()   
                    ]);
                    $deal->setTitle(
                        sprintf('%s %s %s', $deal->getTitle(), $vehicle->getMake(), $vehicle->getModel())
                    );
                }
            }

            // Informazioni richiesta personalizzata
            $deal->setMetadataEntry('customRequest', $requestData);
            
            $deal->save();

            return $this->returnResult(['deal_id' => $deal->getId()]);

        } catch(Exception $ex) {
            return $this->returnErrorMessage($ex->getMessage());
        }

    }

    public function registerLeadRequest() {

        try {

            $requestIdentifier = $this->request->getInputParam('identifier');
            if (is_null($requestIdentifier) || !array_key_exists($requestIdentifier, self::LEAD_REQ_IDENTIFIERS)) {
                throw new Exception('Tipologia richiesta non valida');
            }

            $contact = $this->registerContact($this->request->getInputParam('contact'));

            $dealData = $this->request->getInputParam('data');

            $dealImportObject = (object)[
                'contact_id' => $contact->getId(),
                'agency_id'  => (int)$dealData['agency_id'],
                'message'    => $dealData['message'],
                'title'      => self::LEAD_REQ_IDENTIFIERS[$requestIdentifier]
            ];

            $deal = new Deal();
            $deal->import($dealImportObject);

            // Referer della pagina
            if ($this->request->hasInputParam('url')) {
                $deal->setMetadataEntry('referer', $this->request->getInputParam('url'));
            }
            
            // Riferimento all'offerta'
            if ($this->request->hasInputParam('offerId')) {
                $offerId = (int)$this->request->getInputParam('offerId');
                $offer = new Offer($offerId);
                $vehicle = new Vehicle($offer->getVehicleId());

                $deal->setMetadataEntry('vehicle', (object)[
                    'id' => $vehicle->getId(),
                    'make' => $vehicle->getMake(),
                    'model' => $vehicle->getModel(),
                    'variant' => $vehicle->getVariant(),
                    'makeId' => $vehicle->getMakeId(),
                    'modelId' => $vehicle->getModelId(),
                    'variantId' => $vehicle->getVariantId()   
                ]);

                $deal->setMetadataEntry('offer', $offer);

                $deal->setTitle(
                    sprintf('%s %s %s', $deal->getTitle(), $vehicle->getMake(), $vehicle->getModel())
                );
            }
            
            $deal->save();

            (new BackgroundTask())
                ->setClass('BackgroundMailSender')
                ->setMethod('processAgencyDealNotifications')
                ->setMetadataEntry('dealId', $deal->getId())
                ->save();

            return $this->returnResult(['deal_id' => $deal->getId()]);

        } catch(Exception $ex) {
            return $this->returnErrorMessage($ex->getMessage());
        }

    }

    private function registerContact(array $data): Contact {

        $contact = new Contact();
        $contact->import((object)$data);

        if (!$contact->exists()) {
            $contact
                ->setType($data['customer_type'])
                ->setRegistrationIp($_SERVER['REMOTE_ADDR']);
        }

        if (!$contact->save()) {
            throw new Exception('Cannot store contact data');
        }

        return $contact;
    }


    private function registerBitrix24Contact(array $data): int {
        $contact = new Bitrix24Contact($this->gateway);
        $contact
            ->setFirstName($data['first_name'] ?? $data['contact_person'] ?? '')
            ->setLastName($data['last_name'] ?? '')
            ->setCustomField('taxCode', $data['tax_code'] ?? '')
            ->addPhone(
                (new Bitrix24ContactInfo())->setValue($data['phone'] ?? '')->setType('PHONE')
            )
            ->addEmail(
                (new Bitrix24ContactInfo())->setValue($data['email'] ?? '')->setType('EMAIL')
            )
            ->setCustomField(
                'privacy', 
                array_map(fn($id) => (int)$id, $data['privacy'] ?? [])
            )
            ->setResponsibleId($this->bitrix24Config->defaultResponsibleId);
        
        if (isset($data['address'])) {
            $complexAddress = implode(' - ', [
                $data['state'] ?? '',
                $data['city'] ?? '',
                $data['address']
            ]);
            $contact->setAddress($complexAddress);
        }

        if ($data['customer_type'] == 'business') {
            $contact
                ->setCustomField('businessName', $data['business_name'] ?? 'Non disponibile')
                ->setCustomField('vatNumber', $data['vat_number'] ?? '');
        }
        $contactId = $contact->save();
        return $contactId;
    }

}