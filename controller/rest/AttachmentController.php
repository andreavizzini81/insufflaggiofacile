<?php

class AttachmentController extends RestController {

    private object  $attachment; 
    private array       $data; 
    private object      $file;
    private int         $isLocalFile;
    private string      $uuid;

    //private const VALID_MIME_TYPES = ['image/png', 'image/jpeg', 'image/webp'];

    public function setData() :Response {
        $this->data = $this->request->getInputParams();
        $this->file = $this->request->getFiles()['attachment'] ?? null;
        $this->isLocalFile = $this->request->getInputParam('is_local_file') ?? null;
        $this->attachment = new AttachmentGeneric(null, $this->data, $this->file);
        $this->uuid = $this->attachment->getUuid();
        if($this->attachment->saveDbAttachment($this->uuid) !== true) {
            return $this->returnErrorMessage('Impossibile salvare il file nel database.');
        }
        if ($this->attachment->saveFile($this->uuid) !== true) {
            return $this->returnErrorMessage('Impossibile salvare il file sul server.');
        }
        return $this->returnResult([
            'data' => $this->data,
            'uuid' => $this->uuid,
            'files' => $this->request->getFiles()
        ]);
    }

    public function delete() :Response {
        $this->uuid = $this->request->getQueryParam('uuid');
        if (is_null($this->uuid)) {
            return $this->returnErrorMessage('Riferimento file non valido', 400);
        }
        $this->attachment = new AttachmentGeneric($this->uuid);
        $this->attachment->deleteDbAttachment($this->uuid);
        if ($this->attachment->deleteDbAttachment($this->uuid)) {
            return $this->returnErrorMessage('File non trovato', 404);
        }
        if (!$this->attachment->deleteFile($this->uuid)) {
            return $this->returnErrorMessage('Impossibile eliminare il file.');
        }
        return $this->returnResult(null); 
    } 

    public function sortByEntityId() {
        $entityId = $this->request->getInputParam('entity_id');
        $entity = $this->request->getInputParam('entity'); 
        $order = $this->request->getInputParam('order');
        foreach($order as $key => $value) {
            $this->db->update('attachment', ['sort' => $key], sprintf('entity = \'%s\' AND entity_id = %d AND uuid = \'%s\'', $entity, $entityId, $value));
        }
        return $this->returnResult([
            'entity_id' => $entityId,
            'entity' => $entity,
            'order' => $order
        ]);
    }

}