
<?php

class Faq extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'faq';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private ?int    $faq_categoria_id;
    private ?string $domanda;
    private ?string $risposta;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' =>  null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'faqCategoriaId' => [
            'default' =>  null,
            'alias' => 'faq_categoria_id',
            'cast' => 'int'
        ],
        'domanda' => [
            'default' => '',
            'alias' => 'domanda',
            'cast' => 'string'
        ],
        'risposta' => [
            'default' => '',
            'alias' => 'risposta',
            'cast' => 'string'
        ],
    ];

    public function __construct(?int $id = null) {
        parent::__construct();
        $this->loadDefaults();
        if ($id) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getFaqCategoriaId(){
        return $this->faq_categoria_id;
    }

    public function setFaqCategoriaId($faq_categoria_id){
        $this->faq_categoria_id = $faq_categoria_id;
        return $this;
    }

    public function getDomanda(){
        return $this->domanda;
    }

    public function setDomanda($domanda){
        $this->domanda = $domanda;
        return $this;
    }

    public function getRisposta(){
        return $this->risposta;
    }

    public function setRisposta($risposta){
        $this->risposta = $risposta;
        return $this;
    }

    public function getFaqCategoria(): ?object {
        if (!$this->exists || is_null($this->id)) {
			return null;	
		}
        $TitleCatFaq = $this->db->getResults(sprintf('SELECT titolo FROM faq_categoria WHERE id = %d', $this->faq_categoria_id));
        return $TitleCatFaq;
    }

}