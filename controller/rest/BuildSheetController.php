<?php

class BuildSheetController extends RestController {

    private ?int $id;
    private Deal $deal;


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
	
	public function update(): Response {
		
		$dealId = $this->request->getQueryParam('id');
		
		$metadata = json_decode($this->db->getVar(sprintf("SELECT metadata FROM deal WHERE id = %d", $dealId)));

        $params = (object) $this->request->getInputParams();
		
        if(empty($metadata)) {
            $metadata['immobile'] = $params;
        } else {
            $metadata->immobile = $params;
        }
		
		$this->db->update('deal', ['metadata' => json_encode($metadata)], sprintf('id = %d', $dealId));

        return $this->returnResult([$metadata]);
    }

}