<?php
class Dictionary extends BaseComponent {

    protected $map = array();
    protected $properties = array();
    protected $exists = false;

    public function __construct(array $map) {
        parent::__construct();
        $this->map = $map;
        $this->loadProperties();
    }

    protected function loadProperties() {
        foreach($this->map as $name => $info) {
            $this->properties[$name] = array();
            foreach((array)$this->db->getResults($this->buildPropertyQuery($info)) as $propertyEnum) {
                $this->properties[$name][$propertyEnum->id] = $propertyEnum;
            }
        }
    }

    public function propertyExists($name) {
        return array_key_exists($name, $this->properties);
    }

    public function getProperty(string $name, $index) {
        if ($this->propertyExists($name)) {
            if (gettype($index) === 'array') {
                $elements = array();
                foreach($index as $item) {
                    $key = (is_object($item) && isset($item->id)) ? $item->id : (int)$item;
                    if (array_key_exists($key, $this->properties[$name])) {
                        $elements[] = $this->properties[$name][$key] ?? null;
                    }
                }
                return $elements;
            } else {
                return $this->properties[$name][$index] ?? null;
            }
        }
        return false;
    }

    protected function buildPropertyQuery($info) {
        $queryFields = array();
        foreach($info['fields'] as $fieldAlias => $fieldName) {
            $queryFields[] = "{$fieldName} AS {$fieldAlias}";
        }
        $queryParts = array(
            "SELECT ".implode(', ', $queryFields),
            "FROM {$info['table']}",
            "ORDER BY id ASC"
        );
        return implode(' ', $queryParts);
    }
}
?>