<?php

abstract class EntityList {

    protected $db;
    protected $app;
    protected $params;
    protected $conditions;
    protected $recordsCount;
    protected $lastPage;
    protected $lastSize;
    protected $pageCount;
    protected $pageLength = 50;
    protected $key = 'id';
    protected $orderParam = 'id DESC';
    protected $complexOrder = false;
    protected $asClassList = false;
    protected $class;
    
    public const PAGE_SIZES = [1, 2, 3, 5, 10, 12, 15, 18, 24, 25, 50, 100];

    public function __construct(?array $params, bool $asClassList = false, ?string $class = '') {
        $this->db = Container::get('Database');
        $this->app = Container::get('App');
        $this->asClassList = $asClassList;
        $this->class = $class;
        if (is_array($params)) {
            $this->setParams($params);
        }
    }

    public function setParams(array $params) {
        $this->conditions = array();
        foreach($params as $key => $value) {
            $protoFunctionName = sprintf('_%sParam', self::c2Convert($key));
            if (method_exists($this, $protoFunctionName)) {
                $this->conditions[$key] = $this->{$protoFunctionName}($value);
            }
        }
        $this->recordsCount = $this->getRecordsCount();
        $this->pageCount = ceil($this->recordsCount / $this->pageLength);
        return $this;
    }

    public function setPageLength(int $length) {
        if ($length > 0) {
            $this->pageLength = $length;
            $this->pageCount = ceil($this->recordsCount / $this->pageLength);
        }
        return $this;
    }

    public function setOrderParam(string $param) {
        if (trim($param) != '') {
            $this->orderParam = $param;
        }
        return $this;
    }

    public function getPageLength() {
        return $this->pageLength;
    }

    protected function buildConditionsString() {
        $conditions = array_filter($this->conditions, function($condition) {
            return !is_null($condition) && $condition != '';
        });
        if (count($conditions) == 0) {
            return '';
        }
        return sprintf('WHERE %s', implode(' AND ', $conditions));
    }

    public function getPageCount() {
        return $this->pageCount;
    }

    public function getOffset($page) {
        return $this->pageLength * ($page - 1);
    }

    protected function get(?int $page) :array {
        $list = array();
        $orderRule = ($this->orderParam == 'RAND()' || $this->complexOrder) ?
            $this->orderParam :
            static::ENTITY.'.'.$this->orderParam;
        $query = sprintf(
            'SELECT %s.%s FROM %s %s ORDER BY %s', 
            static::ENTITY, 
            $this->key, 
            static::ENTITY, 
            $this->buildConditionsString(),
            $orderRule,
        );
        if ($page !== null && $page > 0) {
            $this->lastPage = $page;
            $query .= sprintf(' LIMIT %d, %d', $this->getOffset($page), $this->pageLength);
        }
        foreach($this->db->getCol($query) as $key) {
            $list[] = ($this->asClassList && $this->class != '' && class_exists($this->class)) ? new $this->class($key) : $key;
        }
        $this->lastSize = (is_countable($list)) ? count($list) : null;
        return $list;
    }

    public function getPage(int $page) {
        return $this->get($page);
    }

    public function getAll() {
        return $this->get(null);
    }

    public function getFirst(): mixed {
        $this->pageLength = 1;
        $result = $this->getPage(1);
        return (empty($result)) ? null : $result[0];
    }

    public function getRecordsCount() {
        return (int)$this->db->getVar(
            sprintf('SELECT COUNT(%s.%s) FROM %s %s;', static::ENTITY, $this->key, static::ENTITY, $this->buildConditionsString())
        );
    }

    public function getCount() {
        return $this->recordsCount;
    }

    public function getPagination() {
        return (object)[
            'current'     => $this->lastPage,
            'currentSize' => $this->lastSize,
            'offset'      => $this->getOffset($this->lastPage ?? 1),
            'results'     => $this->recordsCount,
            'size'        => $this->pageLength,
            'total'       => ($this->recordsCount > 0) ? ceil($this->recordsCount / $this->pageLength) : null
        ];
    }

    protected static function validateIntArray(array $list, int $minReference = 1) {
        return array_filter($list, function($int) use ($minReference) {
            return (is_numeric($int) && $int >= $minReference);
        });
    }

    protected static function c2Convert($string, $capitalizeFirstCharacter = false) {
        $str = str_replace('_', '', ucwords($string, '_'));
        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }
        return $str;
    }

    protected static function normalizeDate($expression) {
        $formats = array(
            "/^([0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4})$/" => array("from" => "d/m/Y", "to" => "Y-m-d"),
            "/^([0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2})$/" => array("from" => "Y-m-d","to" => "Y-m-d")
        );
        foreach($formats as $pattern => $format) {
            if (preg_match($pattern, $expression)) {
                $dtInstance = DateTime::createFromFormat($format['from'], $expression);
                if ($dtInstance !== false && $dtInstance->getTimestamp() > -2208988800) {
                    return $dtInstance->format($format['to']);
                }
            }
        }
        return false;
    }
}