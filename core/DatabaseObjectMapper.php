<?php

trait DatabaseObjectMapper {

    private array $scalarTypes = [
        'bool', 'int', 'float', 'double', 'string', 'null', 'array'
    ];
    protected bool  $exists = false;

    private function loadDefaults() {
        foreach(self::PROPERTIES_MAP as $propertyName => $propertyValue) {
            $this->{$propertyName} = $propertyValue['default'];
        }
        if (in_array('TranslatableEntity', class_uses($this))) {
            $this->initTranslationServices();
        }
        if (method_exists($this, 'afterLoadDefaults')) {
            $this->afterLoadDefaults();
        }
    }

    public function importFromPrimaryKey($key): bool {
        $data = $this->db->selectRow(
            self::ENTITY_TABLE, 
            '*',
            sprintf(
                "%s = '%s'",
                self::PRIMARY_KEY, 
                $this->db->escape($key)
            )
        );
        if (is_null($data)) {
            $this->{self::PRIMARY_KEY} = null;
            $this->exists = false;
            return false;
        }
        $this->exists = true;
        if (method_exists($this, 'afterDatabaseFetch')) {
            $this->afterDatabaseFetch($data);
        }
        $this->import($data);
        return true;
    }

    public function importFromDump(object $data): self {
        $clone = clone $data;
        foreach(self::PROPERTIES_MAP as $propertyName => $propertyValue) {
            // Skip if the current property does not exists in dump
            if (!property_exists($clone, $propertyName)) {
                continue;
            }
            // Set to null if value to be imported is null and default is null
            if (is_null($clone->{$propertyName}) && array_key_exists('default', $propertyValue) && is_null($propertyValue['default'])) {
                $this->{$propertyName} = null;
                continue;
            }
            $cast = $propertyValue['cast'] ?? null;
            // Cast to scalar type
            if ($cast != 'array' && in_array($cast, $this->scalarTypes, true)) {
                settype($clone->{$propertyName}, $cast);
                $this->{$propertyName} = $clone->{$propertyName};
                continue;
            }
            // If setter is available, try to set by value
            $setter = sprintf('set%s', ucfirst($propertyName));
            if (method_exists($this, $setter)) {
                $this->{$setter}($clone->{$propertyName});
                continue;
            }            
            // Finally, if property type is not a scalar then instantiate 
            // the class passing value as parameter in the constructor
            if (class_exists($cast)) {
                $this->{$propertyName} = new $cast($clone->{$propertyName});
            }
        }
        if (method_exists($this, 'afterImportDump')) {
            $this->afterImportDump($clone);
        }
        return $this;
    }

    public function import(object $data): self {
        $clone = clone $data;
        if (method_exists($this, 'beforeImport')) {
            $this->beforeImport($clone);
        }
        foreach(self::PROPERTIES_MAP as $propertyName => $propertyValue) {
            $alias = $propertyValue['alias'] ?? null;
            if (!is_null($alias) && property_exists($clone, $alias)) {
                // Set to null if value to be imported is null and default is null
                if (is_null($clone->{$alias}) && array_key_exists('default', $propertyValue) && is_null($propertyValue['default'])) {
                    $this->{$propertyName} = null;
                    continue;
                }
                $cast = $propertyValue['cast'] ?? null;
                // Cast to scalar type
                if (in_array($cast, $this->scalarTypes)) {
                    settype($clone->{$alias}, $cast);
                    $this->{$propertyName} = $clone->{$alias};
                    continue;
                }
                // Instantiate class passing value to constructor
                if (class_exists($cast)) {
                    $this->{$propertyName} = new $cast($clone->{$alias});
                    continue;
                }
            }
        }
        if (method_exists($this, 'afterImport')) {
            $this->afterImport($clone);
        }
        return $this;
    }

    public function save(bool $debug = false): mixed {
        $data = [];
        if (method_exists($this, 'beforeSave')) {
            $this->beforeSave($data);
        }
        foreach(self::PROPERTIES_MAP as $propertyName => $propertyValue) {
            if (is_null($propertyValue['alias'])) {
                continue;
            }
            if ($propertyName == self::PRIMARY_KEY && is_null($this->{self::PRIMARY_KEY})) {
                continue;
            }
            $data[$propertyValue['alias']] = $this->{$propertyName};
        }
        if ($debug) {
            Utils::varDebug($data);
            Utils::varDebug(
                $this->db->insert(self::ENTITY_TABLE, $data, true, null, true)
            );
            return false;
        }
        $result = $this->db->insert(self::ENTITY_TABLE, $data, true);
        if ($result === false) {
            return false;
        }
        
        if (self::PRIMARY_KEY == 'id') {
            $this->id ??= $this->db->getInsertId();
        } else {
            $this->{self::PRIMARY_KEY} = $data[self::PRIMARY_KEY];
        }
        
        $this->exists = true;
        if (method_exists($this, 'afterSave')) {
            $this->afterSave($this->{self::PRIMARY_KEY});
        }
        return $this->{self::PRIMARY_KEY};
    }

    private function getPropertiesType() {
        $types = [];
        foreach(self::PROPERTIES_MAP as $propertyName => $propertyValue) {
            $types[$propertyName] = gettype($this->{$propertyName});
        }
        return $types;
    }

    public function export(): array {
        $output = [];
        if (method_exists($this, 'beforeExport')) {
            $this->beforeExport($output);
        }
        foreach(self::PROPERTIES_MAP as $propertyName => $propertyValue) {
            $output[$propertyName] = $this->{$propertyName};
        }
        if (method_exists($this, 'afterExport')) {
            $this->afterExport($output);
        }
        return $output;
    }

    public function delete(): bool {
        if ($this->{self::PRIMARY_KEY} === null) {
            return false;
        }
        if (method_exists($this, 'beforeDelete')) {
            $this->beforeDelete();
        }
        $result = $this->db->delete(
            self::ENTITY_TABLE,
            sprintf(
                "%s = '%s'",
                self::PRIMARY_KEY,
                $this->db->escape($this->{self::PRIMARY_KEY})
            )
        );
        if (method_exists($this, 'afterDelete')) {
            $this->afterDelete($result);
        }
        return ($result !== false);
    }

    public function jsonSerialize(): mixed {
        return $this->export();
    }

    public function exists(): bool {
        return $this->exists;
    }

    public static function getListClassName(): string {
        return sprintf('%sList', self::class);
    }

}