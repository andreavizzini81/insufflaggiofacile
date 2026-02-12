<?php

class DealController extends RestController {

    private ?int $id;
    private Deal $deal;

    private const PAGINATION_SIZE = 10;

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
        
        $dealId = $this->request->getQueryParam('id');
        $this->deal = new Deal($dealId);

        if (!is_null($dealId) && !$this->deal->exists()) {
            $this->returnErrorMessage('Deal non trovata');
        }

        if (!$this->deal->canBeManagedByUser($this->user)) {
            $this->returnErrorMessage('L&rsquo;utente corrente non dispone dei permessi necessari a gestire la richiesta', 200)->flush();
        }
    }

    public function getAttachments(): Response {

        $attachmentList = new AttachmentList([
            'entity'    => 'Deal',
            'entity_id' => $this->deal->getId()
        ], true, GenericAttachment::class);

        return $this->returnResult([
            'list' => $attachmentList->getAll()
        ]);
    }

    public function uploadAttachment(): Response {

        if (!$this->deal->exists()) {
            return $this->returnErrorMessage('Invalid deal reference');
        }
        $attachments = $this->request->getFile('attachment');

        if (!is_array($attachments) || empty($attachments)) {
            return $this->returnErrorMessage('Nothing to upload');
        }

        $validAttachments = array_filter($attachments, function($attachment) {
            return $attachment->getError() == 0;
        });

        if (empty($validAttachments)) {
            return $this->returnErrorMessage('One or more files are not valid');
        }

        $log = [];

        foreach($validAttachments as $item) {

            try {
                $attachment = new GenericAttachment();
                $attachmentUUID = $attachment
                    ->setEntity('Deal')
                    ->setEntityId($this->deal->getId())
                    ->fromUploadedFile($item)
                    ->save();
                $log[] = sprintf('Upload of file: %s success, UUID: %s', $item->getName(), $attachmentUUID);
            } catch(Exception $ex) {
                $log[] = sprintf('Upload of file: %s failed with error: %s', $item->getName(), $ex->getMessage());
            }

        }

        return $this->returnResult($log);
    }

    public function deleteAttachment(): Response {

        $uuid = $this->request->getQueryParam('uuid');
        if (is_null($uuid)) {
            return $this->returnErrorMessage('Invalid attachment reference');
        }

        $attachment = new GenericAttachment($uuid);
        if (!$attachment->exists()) {
            return $this->returnErrorMessage('Attachment not found');
        }

        $result = $attachment->delete();

        if ($result) {
            return $this->returnResult(null);
        } else {
            return $this->returnErrorMessage('Attachment cannot be deleted');
        }
    }

    public function get(): Response {

        $responseData = $this->request->hasQueryParam('kanban') ? $this->generateKanbanData($this->deal) : $this->deal ;

        return $this->returnResult([
            'deal' => $responseData
        ]);
    }

    public function create(): Response {

        $contactId = $this->request->getInputParam('contact_id');
        if (is_null($contactId)) {
            return $this->returnErrorMessage('Riferimento anagrafica non valido');
        }

        if (is_null($this->user->getDefaultAgencyId())) {
            return $this->returnErrorMessage('L&rsquo;utente correntemente loggato non &egrave; associato ad alcuna agenzia.');
        }

        $deal = new Deal();
        $deal->setCreatedById($this->user->getId())
             ->setContactId($contactId)
             ->setAgencyId($this->user->getDefaultAgencyId())
             ->setResponsibleId($this->user->getId())
             ->setTitle('Richiesta manuale')
             ->setType('GenericDeal');

        if ($deal->save() !== false) {
            return $this->returnResult(['dealId' => $deal->getId()]);
        } else {
            return $this->returnErrorMessage('Si &egrave; verificato un errore durante il salvataggio della deal');
        }
    }

    public function createFromVehicle(): Response {

        $contactId = $this->request->getInputParam('contactId');
        if (is_null($contactId)) {
            return $this->returnErrorMessage('Riferimento anagrafica non valido');
        }

        if (is_null($this->user->getDefaultAgencyId())) {
            return $this->returnErrorMessage('L&rsquo;utente correntemente loggato non &egrave; associato ad alcuna agenzia.');
        }

        $vehicle = new Vehicle($this->request->getQueryParam('vehicleId'));
        if (!$vehicle->exists()) {
            return $this->returnErrorMessage('Riferimento veicolo non valido');
        }

        $deal = new Deal();
        $deal->setCreatedById($this->user->getId())
             ->setContactId($contactId)
             ->setAgencyId($this->user->getDefaultAgencyId())
             ->setResponsibleId($this->user->getId())
             ->setTitle(
                sprintf('Richiesta %s %s', $vehicle->getMake(), $vehicle->getModel())
             )
             ->setType('GenericDeal');

        $deal->setMetadataEntry('vehicle', 
            (object)[
                'id' => $vehicle->getId(),
                'make' => $vehicle->getMake(),
                'model' => $vehicle->getModel(),
                'variant' => $vehicle->getVariant(),
                'makeId' => $vehicle->getMakeId(),
                'modelId' => $vehicle->getModelId(),
                'variantId' => $vehicle->getVariantId()
            ]
        );

        $vehicleOffers = $vehicle->getOffers();
        if (count($vehicleOffers) > 0) {
            $deal->setMetadataEntry('offer', $vehicleOffers[0]);            
        }

        if ($deal->save() !== false) {
            return $this->returnResult(['dealId' => $deal->getId()]);
        } else {
            return $this->returnErrorMessage('Si &egrave; verificato un errore durante il salvataggio della deal');
        }
    }

    public function update(): Response {

        $this->deal->import(
            (object)$this->request->getInputParams()
        )->save();

        return $this->returnResult([]);
    }

    public function delete(): Response {

        if (!$this->deal->exists()) {
            return $this->returnErrorMessage('Riferimento deal non valido', 400);
        }

        return $this->deal->delete() ?
            $this->returnResult(null) :
            $this->returnErrorMessage('Impossibile eliminare la deal');
    }

    public function setStage(?int $stageId = null): Response {

        $stageId ??= $this->request->getQueryParam('stageId');

        $stage = new CrmStage($stageId);
        if (!$stage->exists()) {
            return $this->returnErrorMessage('Stage non valido');
        }

        $result = $this->deal->setStageId($stage->getId())->save();

        if ($result !== false) {
            return $this->returnResult(null);
        } else {
            return $this->returnErrorMessage('Impossibile aggiornare lo stage');
        }
    }

    public function getList(): Response {

        $params = $this->request->getInputParams();

        if (!$this->user->hasAdminRights()) {
            $params['agency_id'] = $this->user->getAuthorizedAgenciesId();
        }

        $page = $this->request->getQueryParam('page');

        $dealList = new DealList($params, true, Deal::class);
        $deals = $dealList->setPageLength(DealController::PAGINATION_SIZE)->getPage($page ?? 1);

        $output = [
            'list' => ($this->request->hasQueryParam('kanban')) ? 
                        array_map([$this, 'generateKanbanData'], $deals) : 
                        $deals
        ];

        if (isset($dealList)) {
            $output['pagination'] = $dealList->getPagination();
        }

        return $this->returnResult($output);
    }

    private function generateKanbanData(Deal $deal): array {
        $responsible = $deal->getResponsible();
        $agency = $deal->getAgency();
		$stageId = $deal->getStageId();
        return [
            ...$deal->export(),
            ...[
                'owner' => $agency ? $agency->getDescription() : null,
                'responsible' => $responsible ? $responsible->getFullName() : null,
                'contact' => new Contact($deal->getContactId()),
                'eventsCount' => $deal->getEventsCount(),
                'noteCount' => $deal->getNoteCount(),
				'stageName' => $this->getStageName($stageId)
            ]
        ];
    }

    public function getKanbanInitData(): Response {

        $skipFinalStages = $this->request->getInputParam('crm_status') === 'open';
        $stageGroups = $this->deal->getStageGroups($skipFinalStages);

        $listParams = [
            ...$this->request->getInputParams()
        ];

        if (!$this->user->hasAdminRights()) {
            $listParams['agency_id'] = $this->user->getAuthorizedAgenciesId();
        }

        foreach($stageGroups as $stageGroup) {
            $listParams['stage_id'] = $stageGroup->stagesId;
            $dealList = new DealList($listParams, true, Deal::class);            
            $stageGroup->data->list = array_map([$this, 'generateKanbanData'], $dealList->setPageLength(DealController::PAGINATION_SIZE)->getPage(1));
            $stageGroup->data->pagination = $dealList->getPagination();
        }

        return $this->returnResult(['data' => $stageGroups]);
    }

    public function createNote(): Response {

        $content = $this->request->getInputParam('content');
        $noteId = $this->deal->createNote($content, $this->user->getId());

        if ($noteId) {
            $output = ['id' => $noteId];
            if ($this->request->hasInputParam('with_updated_list')) {
                $output['list'] = $this->deal->getNotes();
            }
            return $this->returnResult($output);
        } else {
            return $this->returnErrorMessage('Impossibile inserire la nota');
        }
    }

    public function getNote(): Response {
        
        $noteId = $this->request->getQueryParam('noteId');
        $note = $this->deal->getNote($noteId);

        return (is_null($note)) ?
            $this->returnErrorMessage('Nota non trovata') :
            $this->returnResult(['note' => $note]);
    }

    public function getNotes(): Response {

        return $this->returnResult([
            'list' => $this->deal->getNotes()
        ]);
    }

    public function updateNote(): Response {
        
        $noteId = $this->request->getQueryParam('noteId');
        $note = $this->deal->getNote($noteId);

        if (is_null($note)) {
            return $this->returnErrorMessage('Nota non trovata');
        }

        $content = $this->request->getInputParam('content');
        if (is_null($content)) {
            return $this->returnErrorMessage('Contenuto della nota non valido');
        }

        return ($note->setContent($content)->save()) ?
            $this->returnResult(null) :
            $this->returnErrorMessage('Si &egrave; verificato un errore durante il salvataggio della nota');
    }

    public function deleteNote(): Response {
        
        $noteId = $this->request->getQueryParam('noteId');
        $note = $this->deal->getNote($noteId);

        if (is_null($note)) {
            return $this->returnErrorMessage('Nota non trovata');
        }

        return $note->delete() ? 
            $this->returnResult(null) : 
            $this->returnErrorMessage('Si &egrave; verificato un errore durante l&rsquo;eliminazione della nota');  
    }

    public function createEvent(): Response {
        $eventData = $this->request->getInputParams();
        $event = $this->deal->createEvent(
            $eventData, 
            $this->request->getInputParam('user_id') ?? $this->user->getId()
        );        

        if ($event) {
            $output = ['event' => $event];
            if ($this->request->hasInputParam('with_updated_list')) {
                $output['list'] = $this->deal->getEvents();
            }
            return $this->returnResult($output);
        } else {
            return $this->returnErrorMessage('Si &egrave; verificato un errore durante la creazione dell&rsquo;attivit&agrave;');
        }
    }

    public function updateEvent(): Response {
        
        $eventId = $this->request->getQueryParam('eventId');
        $data = $this->request->getInputParams();

        $event = $this->deal->updateEvent($eventId, $data);


        if ($event) {
            $output = ['event' => $event];
            if ($this->request->hasInputParam('with_updated_list')) {
                $output['list'] = $this->deal->getEvents();
            }
            return $this->returnResult($output);
        } else {
            return $this->returnErrorMessage('Si &egrave; verificato un errore durante l&rsquo;aggiornamento dell&rsquo;attivit&agrave;');
        }
    }

    public function getEvent(): Response {
        
        $eventId = $this->request->getQueryParam('eventId');
        $event = $this->deal->getEvent($eventId);

        return (is_null($event)) ?
            $this->returnErrorMessage('Attivit&agrave; non trovata') :
            $this->returnResult(['event' => $event]);
    }

    public function getEvents(): Response {

        return $this->returnResult([
            'list' => $this->deal->getEvents()
        ]);
    }

    public function deleteEvent(): Response {

        $eventId = $this->request->getQueryParam('eventId');

        return $this->deal->deleteEvent($eventId) ? 
            $this->returnResult(null) : 
            $this->returnErrorMessage('Si &egrave; verificato un errore durante l&rsquo;eliminazione dell&rsquo;attivit&agrave;');  
    }

	public function getStageName(int $stageId): string {
        if (is_null($stageId)) {
            return null;
        }
        $stageName = $this->db->getVar(sprintf("SELECT label FROM crm_stage WHERE id = %d",$stageId));
        return $stageName;
    }
	
}
