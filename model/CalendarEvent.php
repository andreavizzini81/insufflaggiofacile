<?php

class CalendarEvent extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'calendar_event';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private string  $subject;
    private string  $activity;
    private ?int    $userId;
    private ?string $startsAt;
    private ?string $endsAt;
    private bool    $wholeDay;
    private ?string $entity;
    private ?int    $entityId;
    private string  $status;
    private string  $color;
    private ?string $note;
    private ?string $googleCalendarEventId;
    private ?string $createdAt;
    private ?string $updatedAt;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' => null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'subject' => [
            'default' => '',
            'alias' => 'subject',
            'cast' => 'string'
        ],
        'activity' => [
            'default' => '',
            'alias' => 'activity',
            'cast' => 'string'
        ],
        'userId' => [
            'default' => null,
            'alias' => 'user_id',
            'cast' => 'int'
        ],
        'startsAt' => [
            'default' => null,
            'alias' => 'starts_at',
            'cast' => 'string'
        ],
        'endsAt' => [
            'default' => null,
            'alias' => 'ends_at',
            'cast' => 'string'
        ],
        'wholeDay' => [
            'default' => false,
            'alias' => 'whole_day',
            'cast' => 'bool'
        ],
        'entity' => [
            'default' => null,
            'alias' => 'entity',
            'cast' => 'string'
        ],
        'entityId' => [
            'default' => null,
            'alias' => 'entity_id',
            'cast' => 'int'
        ],
        'status' => [
            'default' => 'pending',
            'alias' => 'status',
            'cast' => 'string'
        ],
        'color' => [
            'default' => 'blue',
            'alias' => 'color',
            'cast' => 'string'
        ],
        'note' => [
            'default' => null,
            'alias' => 'note',
            'cast' => 'string'
        ],
        'googleCalendarEventId' => [
            'default' => null,
            'alias' => 'google_calendar_event_id',
            'cast' => 'string'
        ],
        'createdAt' => [
            'default' => null,
            'alias' => 'created_at',
            'cast' => 'string'
        ],
        'updatedAt' => [
            'default' => null,
            'alias' => 'updated_at',
            'cast' => 'string'
        ]
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->loadDefaults();
        if ($id) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getSubject(): string {
        return $this->subject;
    }

    public function setSubject(string $subject): self {
        $this->subject = $subject;
        return $this;
    }

    public function getActivity(): string {
        return $this->activity;
    }

    public function setActivity(string $activity): self {
        $this->activity = $activity;
        return $this;
    }

    public function getUserId(): ?int {
        return $this->userId;
    }

    public function setUserId(?int $userId): self {
        $this->userId = $userId;
        return $this;
    }

    public function getStartsAt(): ?string {
        return $this->startsAt;
    }

    public function setStartsAt(?string $startsAt): self {
        $this->startsAt = $startsAt;
        return $this;
    }

    public function getEndsAt(): ?string {
        return $this->endsAt;
    }

    public function setEndsAt(?string $endsAt): self {
        $this->endsAt = $endsAt;
        return $this;
    }

    public function isWholeDay(): bool {
        return $this->wholeDay;
    }

    public function setWholeDay(bool $wholeDay): self {
        $this->wholeDay = $wholeDay;
        return $this;
    }

    public function getEntity(): ?string {
        return $this->entity;
    }

    public function setEntity(?string $entity): self {
        $this->entity = $entity;
        return $this;
    }

    public function getEntityId(): ?int {
        return $this->entityId;
    }

    public function setEntityId(?int $entityId): self {
        $this->entityId = $entityId;
        return $this;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): self {
        $this->status = $status;
        return $this;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function setColor(string $color): self {
        $this->color = $color;
        return $this;
    }

    public function getNote(): ?string {
        return $this->note;
    }

    public function setNote(?string $note): self {
        $this->note = $note;
        return $this;
    }

    public function getGoogleCalendarEventId(): ?string {
        return $this->googleCalendarEventId;
    }

    public function setGoogleCalendarEventId(?string $googleCalendarEventId): self {
        $this->googleCalendarEventId = $googleCalendarEventId;
        return $this;
    }

    public function getEndpoint(): ?string {
        if (!$this->exists() && $this->entity && $this->entityId) {
            return null;
        }
        return sprintf(
            '%sapi/%s/%d/event', 
            $this->app->path, 
            $this->entity, 
            $this->entityId
        );
    }

    public function getEntityLink(): ?string {
        if (!$this->exists() && $this->entity && $this->entityId) {
            return null;
        }
        return sprintf(
            '%sadmin/%s/%d', 
            $this->app->path, 
            $this->entity, 
            $this->entityId
        );
    }

    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }

    public function setCreatedAt(?string $createdAt): self {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getUpdatedAt(): ?string {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?string $updatedAt): self { 
        $this->updatedAt = $updatedAt;
        return $this;
    }
	
	public function getEntityContact(): ?Contact {
		if (!$this->exists || is_null($this->entityId)) {
			return null;	
		}
		
		$contactId = $this->db->getVar(
			sprintf(
				'SELECT contact_id FROM %s WHERE id = %d',
				$this->entity,
				$this->entityId
			)			
		);
		
		if (!$contactId) {
			return null;	
		}
		
		$contact = new Contact($contactId);
		
		if (!$contact->exists()) {
			return null;
		}
		
		return $contact;
	}
	
	public function getEventUserName(): ?string {
		if (!$this->exists || is_null($this->userId)) {
			return null;	
		}
		
		return (new User($this->userId))->getFullName();
	}
	
	public function getEmailAgency(): ?bool {
		if (!$this->exists || is_null($this->entityId)) {
			return false;	
		}
		
		$agencyId = $this->db->getVar(
			sprintf(
				'SELECT agency_id FROM %s WHERE id = %d',
				$this->entity,
				$this->entityId
			)			
		);
		
		$agency = new Agency($agencyId);
		
		if (!$agency->exists() || !$agency->smtpIsEnabled()) {
			return false;
		}
		
		return true;
		
	}

    private function beforeSave(array &$data) {

        // Creation date
        if (is_null($this->createdAt) && !$this->exists) {
            $this->createdAt = date('Y-m-d H:i:s');
        }

        // Last update
        $this->updatedAt = date('Y-m-d H:i:s');

    }
	
	

    private function beforeExport(array &$data){
        if ($this->userId) {
            $data['userName'] = (new User($this->userId))->getFullName();
        }
    }

}