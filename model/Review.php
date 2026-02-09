<?php 
 
class Review extends BaseComponent implements JsonSerializable {

    use DatabaseObjectMapper;
    private const ENTITY_TABLE = 'review';
    private const PRIMARY_KEY = 'id';

    private ?int    $id;
    private string  $name;
    private string  $city;
    private string  $text;
    private string  $date;
    private int     $channel;
    private int     $score;

    private const PROPERTIES_MAP = [
        'id' => [
            'default' => null,
            'alias' => 'id',
            'cast' => 'int'
        ],
        'name' => [
            'default' => '',
            'alias' => 'name',
            'cast' => 'string'
        ],
        'city' => [
            'default' => '',
            'alias' => 'city',
            'cast' => 'string'
        ],
        'text' => [
            'default' => '',
            'alias' => 'text',
            'cast' => 'string'
        ],
        'date' => [
            'default' => '',
            'alias' => 'date',
            'cast' => 'string'
        ],
        'channel' => [
            'default' => 1,
            'alias' => 'channel',
            'cast' => 'int'
        ],
        'score' => [
            'default' => 5,
            'alias' => 'score',
            'cast' => 'int'
        ]
    ];

    public function __construct(?int $id) {
        parent::__construct();
        $this->loadDefaults();
        if ($id) {
            $this->importFromPrimaryKey($id);
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
        return $this;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
        return $this;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function getChannel() {
        return $this->channel;
    }

    public function setChannel($channel) {
        $this->channel = $channel;
        return $this;
    }

    public function getScore() {
        return $this->score;
    }

    public function setScore($score) {
        $this->score = $score;
        return $this;
    }

}