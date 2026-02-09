<?php
class Database {

    private $connectionInfo;
    private $conn;
    private $charset;
    private $lastError;
    private $tablesCache = array();

    private const SELECT_METHODS_LOOKUP = array(
        'all' => 'getResults',
        'one' => 'getVar',
        'col' => 'getCol',
        'row' => 'getRow'
    );
    private const SELECT_METHODS_TRANSL = array(
        'selectAll' => 'all',
        'selectOne' => 'one',
        'selectCol' => 'col',
        'selectRow' => 'row'
    );
    private const MYSQL_DATETIME_FUNCTIONS = ['ADDDATE','ADDTIME','CONVERT_TZ','CURDATE','CURRENT_DATE','CURRENT_TIME','CURRENT_TIMESTAMP','CURTIME','DATE','DATE_ADD','DATE_FORMAT','DATE_SUB','DATEDIFF','DAY','DAYNAME','DAYOFMONTH','DAYOFWEEK','DAYOFYEAR','EXTRACT','FROM_DAYS','FROM_UNIXTIME','GET_FORMAT','HOUR','LAST_DAY','LOCALTIME','LOCALTIMESTAMP','MAKEDATE','MAKETIME','MICROSECOND','MINUTE','MONTH','MONTHNAME','NOW','PERIOD_ADD','PERIOD_DIFF','QUARTER','SEC_TO_TIME','SECOND','STR_TO_DATE','SUBDATE','SUBTIME','SYSDATE','TIME','TIME_FORMAT','TIME_TO_SEC','TIMEDIFF','TIMESTAMP','TIMESTAMPADD','TIMESTAMPDIFF','TO_DAYS','TO_SECONDS','UNIX_TIMESTAMP','UTC_DATE','UTC_TIME','UTC_TIMESTAMP','WEEK','WEEKDAY','WEEKOFYEAR','YEAR','YEARWEEK'];

    public const WOR = ' OR ';
    public const WAND = ' AND ';

    public function __construct($connInfo) {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $this->connectionInfo = $connInfo;
        $this->conn = new mysqli();
        $this->conn->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, true);
        $this->charset = (isset($connInfo->charset)) ? $connInfo->charset : 'utf8mb4';
        if ($this->connect() !== false) {
            $this->conn->set_charset($this->charset);
            $this->_getTables();
        }
    }

    private function connect() {
        try {
            return $this->conn->real_connect(
                $this->connectionInfo->hostname, 
                $this->connectionInfo->username, 
                $this->connectionInfo->password, 
                $this->connectionInfo->database, 
                $this->connectionInfo->port ?? 3306
            );
        } catch(Exception $ex) {
            $this->logException($ex);
            return false;
        }
    }

    public function __call($name, $arguments) {
        if ($this->conn === null) {
            return false;
        }
        switch(true) {
            case (array_key_exists($name, self::SELECT_METHODS_TRANSL)):
                if (count($arguments) === 0) {
                    throw new Exception('Too few arguments for function Database::select()', 1006);
                }
                if (!$this->_tableExists($arguments[0])) {
                    throw new Exception("Table '{$arguments[0]}' doesn't exists");
                }
                $selectArgs = array(
                    'table' => $arguments[0],
                    'fields' => $arguments[1] ?? '*',
                    'where' => $arguments[2] ?? null,
                    'options' => $arguments[3] ?? array(),
                    'method' => self::SELECT_METHODS_TRANSL[$name]
                );
                $arguments = $selectArgs;
                $method = 'select';
                break;
            default:
                $method = '_'.$name;
        }
        if (!method_exists($this, $method)) {
            throw new Exception("Method Database::{$method} does not exists");
        }
        return call_user_func_array(array($this, $method), $arguments);
    }

    private function _query($query) {
        try {
            return $this->conn->query($query);
        } catch(\Exception $ex) {
            $this->logException($ex, array('query' => $query));
            return false;
        }
        return false;
    }

    private function _getResults($query) {
        $result = $this->query($query);
        if ($result === false) {
            return false;
        }
        if ($result->num_rows == 0) {
            return null;
        }
        $output = array();
        while($row = $result->fetch_object()) {
            $output[] = $row;
        }
        return $output;
    }

    private function _getCol($query) {
        $result = $this->query($query);
        if ($result === false) {
            return false;
        }
        $output = array();
        if ($result->num_rows > 0) {
            while($row = $result->fetch_row()) {
                $output[] = $row[0];
            }            
        }
        return $output;
    }

    private function _getRow($query) {
        $result = $this->query($query);
        if ($result === false) {
            return false;
        }
        if ($result->num_rows == 0) {
            return null;
        }
        return $result->fetch_object();
    }

    private function _getVar($query) {
        $result = $this->query($query);
        if ($result === false) {
            return false;
        }
        if ($result->num_rows == 0 || $result->field_count == 0) {
            return null;
        }
        return $result->fetch_row()[0];
    }

    private function _getTableColumns($tableName) {
        if (array_key_exists($tableName, $this->tablesCache) && $this->tablesCache[$tableName] !== null) {
            return $this->tablesCache[$tableName];
        }
        if ($this->_tableExists($tableName)) {
            $columns = $this->_query("SHOW COLUMNS FROM {$tableName};")->fetch_all(MYSQLI_ASSOC);
            $this->tablesCache[$tableName] = array();
            foreach($columns as $column) {
                $this->tablesCache[$tableName][$column['Field']] = (object)$column;
            }
            return $this->tablesCache[$tableName];
        } else {
            throw new Exception('The request table does not exists: '.$tableName, 1002);
        }
        return false;
    }

    private function _getTableColumn($table, $column) {
        $columns = $this->_getTableColumns($table);
        if ($columns !== false && array_key_exists($column, $columns)) {
            return $columns[$column];
        }
        return false;
    }

    private function _getTableDefaultValues($table, $asObject = true) {
        $tableInfo = $this->_getTableColumns($table);
        if (!$tableInfo) {
            return false;
        }
        $output = [];
        foreach($tableInfo as $fieldName => $fieldInfo) {
            $output[$fieldName] = $fieldInfo->Default ?? '';
        }
        return ($asObject) ? (object)$output : $output;
    }

    private function _getTables() {
        if ($this->conn !== null) {
            $results = $this->_query("SHOW TABLES");
            while($table = $results->fetch_row()) {
                $this->tablesCache[$table[0]] = null;
            }
            return array_keys($this->tablesCache);
        }
        return false;
    }

    private function _tableExists($tableName) {
        return array_key_exists($tableName, $this->tablesCache);
    }

    public function getLastError() {
        return $this->lastError;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function getInsertId() {
        return $this->conn->insert_id;
    }

    public function getAffectedRows() {
        return $this->conn->affected_rows;
    }

    private function logException($exception, $additionalInfo = array()) {
        $logData = array(
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => $exception->getTraceAsString()
        );
        if (is_array($additionalInfo) && count($additionalInfo) > 0) {
            $logData['additional_info'] = $additionalInfo;
        }
        $this->lastError = $exception->__toString();
        error_log(json_encode($logData));
    }

    private function normalizeTimestamp($datetime) {
        $formats = array(
            "/^([0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4})$/" => array("from" => "d/m/Y", "to" => "Y-m-d"),
            "/^([0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2})$/" => array("from" => "Y-m-d","to" => "Y-m-d"),
            "/^([0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4} [0-9]{1,2}\:[0-9]{1,2}\:[0-9]{1,2})$/" => array("from" => "d/m/Y H:i:s", "to" => "Y-m-d H:i:s"),
            "/^([0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2} [0-9]{1,2}\:[0-9]{1,2}\:[0-9]{1,2})$/" => array("from" => "Y-m-d H:i:s", "to" => "Y-m-d H:i:s")
        );
        foreach($formats as $pattern => $format) {
            if (preg_match($pattern, $datetime)) {
                $dtInstance = DateTime::createFromFormat($format['from'], $datetime);
                return $dtInstance->format($format['to']);
            }
        }
        return '0000-00-00 00:00:00';
    }

    private function prepareField($table, $colName, $value) {
        $column = $this->_getTableColumn($table, $colName);
        if ($column === false) {
            return false;
        }
        if (is_null($value) && $column->Null === 'YES') {
            return 'NULL';
        }
        switch (true) {
            case (preg_match("/^int\([0-9]+\)$/", $column->Type) ? true : false) :
            case (preg_match("/^tinyint\([0-9]+\)$/", $column->Type) ? true : false):
            case (preg_match("/^smallint\([0-9]+\)$/", $column->Type) ? true : false):
            case (preg_match("/^mediumint\([0-9]+\)$/", $column->Type) ? true : false):
            case (preg_match("/^bigint\([0-9]+\)$/", $column->Type) ? true : false):	
                return (int)$value;
            case (preg_match("/^int\([0-9]+\)\ unsigned$/", $column->Type) ? true : false) :
            case (preg_match("/^tinyint\([0-9]+\)\ unsigned$/", $column->Type) ? true : false):
            case (preg_match("/^smallint\([0-9]+\)\ unsigned$/", $column->Type) ? true : false):
            case (preg_match("/^mediumint\([0-9]+\)\ unsigned$/", $column->Type) ? true : false):
            case (preg_match("/^bigint\([0-9]+\)\ unsigned$/", $column->Type) ? true : false):
                return abs((int)$value);
            case (preg_match("/^float\([0-9]+,[0-9]+\)$/", $column->Type) ? true : false):
            case (preg_match("/^decimal\([0-9]+,[0-9]+\)$/", $column->Type) ? true : false):	
            case (preg_match("/^double\([0-9]+,[0-9]+\)$/", $column->Type) ? true : false):
                return (float)$value;
            case (preg_match("/^float unsigned$/", $column->Type) ? true : false):
            case (preg_match("/^float\([0-9]+,[0-9]+\) unsigned$/", $column->Type) ? true : false):
            case (preg_match("/^decimal\([0-9]+,[0-9]+\) unsigned$/", $column->Type) ? true : false):	
            case (preg_match("/^double\([0-9]+,[0-9]+\) unsigned$/", $column->Type) ? true : false):
                    return abs((float)$value);
            case (preg_match("/^char\([0-9]+\)$/", $column->Type) ? true : false):
            case (preg_match("/^varchar\([0-9]+\)$/", $column->Type) ? true : false):								
            case (in_array($column->Type, array('tinytext', 'text', 'mediumtext', 'longtext'))):
                return sprintf("'%s'", $this->_escape((string)$value));
            case ($column->Type == 'datetime'):
            case ($column->Type == 'date'):
                if (Database::isMysqlDatetimeFunction($value)) {
                    return $value;
                }
                return sprintf("'%s'", $this->normalizeTimestamp($value));
            default:
                throw new Exception('Field type mismatch in Database::prepareField function', 1003);
        }
        return false;
    }

    private function prepareFieldNew($table, $colName, $value) {

        $column = $this->_getTableColumn($table, $colName);
        if ($column === false) {
            return false;
        }

        if (is_null($value) && $column->Null === 'YES') {
            return 'NULL';
        }

        $type = (explode('(', $column->Type))[0];
        
        $output = match($type) {
            'int', 'tinyint', 'smallint', 'mediumint', 'bigint' => (int)$value,
            'float', 'decimal', 'double' => (float)$value,
            'char', 'varchar', 'tinytext', 'text', 'mediumtext', 'longtext' => sprintf("'%s'", $this->_escape((string)$value)),
            'datetime', 'date' => Database::isMysqlDatetimeFunction($value) ? $value : sprintf("'%s'", $this->normalizeTimestamp($value)),
            default => throw new Exception('Field type mismatch in Database::prepareField function', 1003)
        };
        
        if ((is_int($output) || is_float($output)) && strpos($column->Type, 'unsigned') !== false) {
            $output = abs($output);
        }
        
        return $output;
    }

    private function _escape($string) {
        return $this->conn->real_escape_string($string);
    }

    private function prepareFields($table, $fields) {
        if (!is_array($fields) || count($fields) == 0) {
            return null;
        }
        $fieldParts = [];
        foreach($fields as $fieldName => $fieldValue) {
            $fieldParts[$fieldName] = $this->prepareField($table, $fieldName, $fieldValue);
        }
        return array_filter($fieldParts, function($value) {
            return ($value !== false);
        });
    }

    private function prepareUpdateString($fields) {
        if (!is_array($fields) || count($fields) == 0) {
            return null;
        }
        $updateArr = array();
        foreach((array)$fields as $fieldName => $fieldValue) {
            $updateArr[] = $fieldName.' = '.$fieldValue;
        }
        return (count($updateArr) > 0) ? implode(', ', $updateArr) : null;
    }

    private function select($table, string|array $fields = '*', $where = null, $options = array(), $method = 'getResults') {
        if (is_null($table) || trim($table) === '') {
            throw new Exception('Table name cannot be empty', 1001);
        }
        if (!$this->_getTableColumns($table)) {
            return false;
        }
        $queryParts = array();
        $queryParts[] = 'SELECT';
        switch(true) {
            case ($fields === '*' || $fields == null || $fields == ''):
                $queryParts[] = '*';
                break;
            case (is_array($fields)):
                $fieldParts = array();
                foreach($fields as $field) {
                    $fieldToCheck = (is_array($field)) ? $field[0] : $field;
                    if ($this->_getTableColumn($table, $fieldToCheck) !== false || (isset($options['skip_col_validation']) && $options['skip_col_validation'] === true)) {
                        $fieldParts[] = (is_array($field)) ? $field[0].' AS '.$field[1] : $field;
                    } else {
                        throw new Exception('The specified column does not exists for table:'.$table.'.'.$fieldToCheck, 1004);
                    }
                }
                if (count($fieldParts) > 0) {
                    $queryParts[] = implode(', ', $fieldParts);
                } else {
                    throw new Exception('The specified columns does not exists for table:'.$table, 1005);
                }
                break;
        }
        $queryParts[] = 'FROM '.$table;
        if ($where instanceof DatabaseWhere) {
            $queryParts[] = $where->build();
        }
        if (is_string($where) && $where != '') {
            $queryParts[] = "WHERE {$where}";
        }
        if (isset($options['group']) && is_string($options['group'])) {
            $queryParts[] = 'GROUP BY '.$options['group'];
            if (isset($options['with_rollup']) && $options['with_rollup'] === true) {
                $queryParts[] = 'WITH ROLLUP';
            }
        }
        if (isset($options['order']) && is_string($options['order'])) {
            $queryParts[] = 'ORDER BY '.$options['order'];
        }
        if (isset($options['limit']) && is_int($options['limit']) && $options['limit'] > 0) {
            $queryParts[] = 'LIMIT '.((isset($options['offset']) && is_int($options['offset'])) ? $options['offset'] : '0').','.$options['limit'];
        }
        $query = implode(' ', $queryParts);
        if (isset($options['only_query']) && $options['only_query'] === true) {
            return $query;
        }
        $method = (array_key_exists($method, self::SELECT_METHODS_LOOKUP)) ? self::SELECT_METHODS_LOOKUP[$method] : 'getResults';
        return call_user_func(array($this, $method), $query);
    }

    private function _insert($table, $fields, $updateOnDuplicateKey = false, $updateFields = null, $onlyQuery = false) {
        $queryParts = array();
        $queryParts[] = 'INSERT INTO';
        $queryParts[] = $table;
        $fieldParts = $this->prepareFields($table, $fields);
        if ($fieldParts === null || count($fieldParts) == 0) {
            throw new Exception('Insert fields are not valid', 1006);
        }
        $queryParts[] = '('.implode(', ', array_keys($fieldParts)).')';
        $queryParts[] = 'VALUES';
        $queryParts[] = '('.implode(', ', $fieldParts).')';
        if ($updateOnDuplicateKey === true) {
            $queryParts[] = 'ON DUPLICATE KEY UPDATE';
            $updateArray = (is_array($updateFields) && count($updateFields) > 0) ? $this->prepareFields($table, $updateFields) : $fieldParts;
            $updateString = $this->prepareUpdateString($updateArray);
            if ($updateString === null) {
                throw new Exception('Update fields are not valid', 1007);
            }
            $queryParts[] = $updateString;
        }
        $query = implode(' ', $queryParts);
        if ($onlyQuery === true) {
            return $query;
        }
        return $this->_query($query);
    }

    private function _update($table, $fields, $where = null, $options = array()) {
        if (!$this->_tableExists($table)) {
            throw new Exception("Table '{$table}' doesn't exists");
        }
        $queryParts = array();
        $queryParts[] = 'UPDATE';
        $queryParts[] = $table;
        $queryParts[] = 'SET';
        $fieldParts = $this->prepareFields($table, $fields);
        if ($fieldParts === null || count($fieldParts) == 0) {
            throw new Exception('Insert fields are not valid', 1006);
        }
        $updateString = $this->prepareUpdateString($fieldParts);
        if ($updateString === null) {
            throw new Exception('Update fields are not valid', 1007);
        }
        $queryParts[] = $updateString;
        if ($where instanceof DatabaseWhere) {
            $queryParts[] = $where->build();
        }
        if (is_string($where) && $where != '') {
            $queryParts[] = "WHERE {$where}";
        }
        if (isset($options['order']) && is_string($options['order'])) {
            $queryParts[] = 'ORDER BY '.$options['order'];
        }
        if (isset($options['limit']) && is_int($options['limit']) && $options['limit'] > 0) {
            $queryParts[] = 'LIMIT '.$options['limit'];
        }
        $query = implode(' ', $queryParts);
        if (isset($options['only_query']) && $options['only_query'] === true) {
            return $query;
        }
        return $this->_query($query);
    }

    private function _delete($table, $where = null, $options = array()) {
        if (!$this->_tableExists($table)) {
            throw new Exception("Table '{$table}' doesn't exists");
        }
        $queryParts = array();
        $queryParts[] = 'DELETE FROM';
        $queryParts[] = $table;
        if ($where instanceof DatabaseWhere) {
            $queryParts[] = $where->build();
        }
        if (is_string($where) && $where != '') {
            $queryParts[] = "WHERE {$where}";
        }
        if (isset($options['order']) && is_string($options['order'])) {
            $queryParts[] = 'ORDER BY '.$options['order'];
        }
        if (isset($options['limit']) && is_int($options['limit']) && $options['limit'] > 0) {
            $queryParts[] = 'LIMIT '.$options['limit'];
        }
        $query = implode(' ', $queryParts);
        if (isset($options['only_query']) && $options['only_query'] === true) {
            return $query;
        }
        return $this->_query($query);
    }
    
    public function getDatabaseName() {
        return $this->connectionInfo->database;
    }

    public static function isMysqlDatetimeFunction(?string $string) :bool {
        foreach(Database::MYSQL_DATETIME_FUNCTIONS as $functionName) {
            if (str_starts_with($string, "{$functionName}(")) {
                return true;
            }
        }
        return false;
    }

    public function getTableDefaults($table, $asArray = false) {
        $outData = new stdClass();
        $fields = $this->_getTableColumns($table);
        if ($fields !== false) {
            foreach($fields as $field) {
                $outData->{$field->Field} = ($field->Default !== null) ? $field->Default : '';
            }
        }
        return ($asArray === true) ? (array)$outData : $outData;
    }
}

class DatabaseWhere {

    private $type;
    private $conditions = array();
    private const STRING_ITEM_TYPE = 0;
    private const OBJECT_ITEM_TYPE = 1;

    public function __construct($conditions = null, String $type = 'AND') {
        switch(gettype($conditions)) {
            case 'null':
                break;
            case 'object':
            case 'string':
                $this->add($conditions);
                break;
            case 'array':
                foreach($conditions as $condition) {
                    $this->add($condition);
                }
                break;
        }
        if (!($this->type = ' '.strtoupper(trim($type)).' ') || !in_array($this->type, array(' OR ', ' AND '))) {
            throw new Exception('Where type not supported', 2001);
        }
        return $this;
    }

    public function add($condition) {
        $conditionInfo = new stdClass();
        if (gettype($condition) === 'string' && ($condition = trim($condition)) && $condition != '') {
            $conditionInfo->type = self::STRING_ITEM_TYPE;
        }
        if (gettype($condition) == 'object' && $condition instanceof DatabaseWhere) {
            $conditionInfo->type = self::OBJECT_ITEM_TYPE;
        }
        if (isset($conditionInfo->type)) {
            $conditionInfo->data = $condition;
            $this->conditions[] = $conditionInfo;
            return $this;                        
        }
        return false;
    }

    public function addSub($conditions = null, String $type = 'AND') {
        $sub = new DatabaseWhere($conditions, $type);
        $this->add($sub);
        return $this;
    }

    public function getConditions() {
        var_dump($this->conditions);
    }

    public function build($isRoot = true) {
        if (empty($this->conditions)) {
            return '';
        }
        $whereParts = array();
        foreach($this->conditions as $condition) {
            if ($condition->type === self::STRING_ITEM_TYPE) {
                $whereParts[] = $condition->data;
            } else {
                $whereParts[] = '('.$condition->data->build(false).')';
            }
        }
        return ($isRoot ? 'WHERE ' : '').implode($this->type, $whereParts);
    }
}