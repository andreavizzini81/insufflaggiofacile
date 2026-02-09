<?php

trait AnnotableEntity {

    public function getNoteCount(): int {
        if (!$this->exists()) {
            return 0;
        }

        $list = new CrmNoteList([
            'entity' => self::ENTITY_TABLE,
            'entity_id' => $this->id
        ]);
        return $list->getRecordsCount();
    }

    public function hasNotes(): bool {
        return $this->getNoteCount() > 0;
    }

    public function getNotes(): array {
        if (!$this->exists()) {
            return [];
        }

        $list = new CrmNoteList([
            'entity' => self::ENTITY_TABLE,
            'entity_id' => $this->id
        ], true, CrmNote::class);

        return $list->getAll();
    }

    public function getNote(int $id): ?CrmNote {
        $note = new CrmNote($id);

        return ($note->exists() && $note->getEntityId() == $this->id && $note->getEntity() == self::ENTITY_TABLE) ? $note : null;
    }

    public function createNote(string $content, int $createdById): ?int {

        $note = (new CrmNote())->setEntity(self::ENTITY_TABLE)
                ->setEntityId($this->id)
                ->setContent($content)
                ->setCreatedById($createdById);

        $noteId = $note->save();
        return $noteId !== false ? $note->getId() : null;
    }

}