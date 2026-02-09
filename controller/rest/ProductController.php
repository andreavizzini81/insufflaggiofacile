<?php

class ProductController extends RestController {

    private Product $product;

    public function __construct(Request &$request, App &$app) {
        parent::__construct($request, $app);
        
        $productId = $this->request->getQueryParam('id');
        $this->product = new Product($productId);

        if (!is_null($productId) && !$this->product->exists()) {
            $this->returnErrorMessage('Prodotto non trovato');
        }

    }

    public function getData(): Response {

        $product = new Product($this->request->getQueryParam('id'));
        if (!$product->exists()) {
            return $this->returnErrorMessage('Contatto non trovato', 401);
        }

        return $this->returnResult($product);
    }
    

    public function setData(): Response {

        $productData = $this->request->getInputParams();
        
        $product = new Product($productData['id'] ?? null);
        $product->import((object)$productData);
        $productId = $product->save();
        if ($productId === false) {
            return $this->returnErrorMessage('Impossibile salvare il contatto');
        }
        return $this->returnResult([
            'id' => $productId,
            'product' => $this->request->getInputParam('file')
        ]);

    }

    public function delete(): Response {
        $id = $this->request->getQueryParam('id');
        if (is_null($id)) {
            return $this->returnErrorMessage('Riferimento anagrafica non valido', 400);
        }
        $product = new Product($id);
        if (!$product->exists()) {
            return $this->returnErrorMessage('Anagrafica non trovata', 404);
        }
        $result = $product->delete();
        if ($result) {
            return $this->returnResult(null);
        } else {
            return $this->returnErrorMessage('Impossibile eliminare l\'anagrafica.');
        }
    }

    public function getAttachments(): Response {

        $attachmentList = new AttachmentList([
            'entity'    => 'Product',
            'entity_id' => $this->product->getId()
        ], true, GenericAttachment::class);

        return $this->returnResult([
            'list' => $attachmentList->getAll()
        ]);
    }

    public function uploadAttachment(): Response {

        if (!$this->product->exists()) {
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

        $logDelete = $this->deleteAttachmentEntityId($this->product->getId());

        $log = [];

        foreach($validAttachments as $item) {

            try {
                $attachment = new GenericAttachment();
                $attachmentUUID = $attachment
                    ->setEntity('Product')
                    ->setEntityId($this->product->getId())
                    ->fromUploadedFile($item)
                    ->save();
                $log[] = sprintf('Upload of file: %s success, UUID: %s', $item->getName(), $attachmentUUID);
            } catch(Exception $ex) {
                $log[] = sprintf('Upload of file: %s failed with error: %s', $item->getName(), $ex->getMessage());
            }

            $imgSquare = new Zebra_Image();
            $imgSquare->source_path = $attachment->getPath();
            $imgSquare->target_path = $attachment->getPath();
            //$imgSquare->crop(0, 0, 600, 640);
            $imgSquare->enlarge_smaller_images = TRUE;
            $imgSquare->preserve_aspect_ratio = TRUE;
            $imgSquare->resize(600, 640, ZEBRA_IMAGE_CROP_CENTER, '#FFF');

        }

        return $this->returnResult(['log' => $log, 'logDelete' => $logDelete]);
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

    private function deleteAttachmentEntityId(int $id): array {

        if (is_null($id)) {
            return $this->returnErrorMessage('Invalid attachment reference');
        }

        $deleteItems =$this->db->getResults(sprintf('SELECT uuid FROM attachment WHERE entity_id = %d',$id));

        $log = [];

        foreach($deleteItems as $item) {

            $attachment = new GenericAttachment($item->uuid);
            if (!$attachment->exists()) {
                return $this->returnErrorMessage('Attachment not found');
            }

            $result = $attachment->delete();

            if ($result) {
                $log[] = sprintf('Delete file success: UUID: %s', $item->uuid);
            } else {
                $log[] = sprintf('Delete file error: UUID: %s', $item->uuid);
            }

        }
        return $log;
    }

}