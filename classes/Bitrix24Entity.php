<?php

abstract class Bitrix24Entity {

    protected function loadDefaults() {
        foreach($this->propertiesMap as $propertyName => $propertyData) {
            $this->{$propertyName} = $propertyData['default'];
        }
        return true;
    }

    protected function import(object $data) {
        foreach($this->propertiesMap as $propertyName => $propertyData) {
            $bitrix24PropertyName = $propertyData['alias'];
            if (!isset($data->{$bitrix24PropertyName})) {
                continue;
            }
            $this->{$propertyName} = self::castValueFromBitrix24(
                $data->{$bitrix24PropertyName}, 
                $propertyData['cast'], 
                $propertyData['isArray']
            );
        }
        return true;
    }

    protected function importCustomFields() {
        $customFields = $this->gateway->getCustomFields();
        if (!isset($customFields->{static::CUSTOM_FIELDS_ID})) {
            return false;
        }
        foreach($customFields->{static::CUSTOM_FIELDS_ID} as $customField) {
            $this->propertiesMap[$customField->name] = [
                'alias'         => $customField->alias,
                'default'       => $customField->default,
                'cast'          => $customField->cast,
                'isArray'       => $customField->isArray,
                'group'         => 'fields',
                'isCustomField' => true
            ];
        }
    }

    public function setCustomField($name, $value) {
        if (array_key_exists($name, $this->propertiesMap) && $this->propertiesMap[$name]['isCustomField']) {
            $this->{$name} = $value;
        }
        return $this;
    }

    protected static function sanitizePhoneNumber($phone) {
        $phone = str_replace([' ', '/', '-', '_'], '', trim($phone));
        return preg_replace([
            "/^(0039)/",
            "/^(\+39)/"
        ], '', $phone);
    }

    protected static function sanitizeEmail($email) {
        return filter_var(trim(strtolower($email)), FILTER_SANITIZE_EMAIL);
    }

    protected static function castValueFromBitrix24(mixed $value, string $type, bool $isArray) {
        if (is_null($value)) {
            return null;
        }
        /*if ($isArray && is_array($value)) {
            return array_map(function($arrayItemValue) use($type) {
                return self::castValueFromBitrix24($arrayItemValue, $type, false);
            }, $value);
        }*/
        switch($type) {
            case 'int':
                return (int)$value;
            case 'float':
                return (float)$value;
            case 'bool':
                return ($value == 'Y') ? true : false;
            case 'string':
                return (string)$value;
            case 'array':
                return (array)$value;
            case 'Bitrix24ContactInfo':
                return array_map(fn($item) => new Bitrix24ContactInfo($item), $value);
            default:
                return null;
        }
    }

    protected static function castValueToBitrix24($value, $type) {
        if (is_null($value)) {
            return null;
        }
        switch($type) {
            case 'int':
            case 'float':
            case 'string':
                return $value;
            case 'bool':
                return ($value) ? 'Y' : 'N';
            case 'array':
                return $value;
            case 'Bitrix24ContactInfo':
                return array_map(fn($i) => $i->export(true), $value);
            default:
                return '';
        }
    }

    public function buildPayload() {
        $payload = [
            'fields' => [],
            'params' => []
        ];
        foreach($this->propertiesMap as $propertyName => $propertyData) {
            if (!isset($propertyData['group']) || !in_array($propertyData['group'], ['fields', 'params'])) {
                continue;
            }
            if (is_null($propertyData['alias'])) {
                continue;
            }
            $payload[$propertyData['group']][$propertyData['alias']] = self::castValueToBitrix24($this->{$propertyName}, $propertyData['cast']);
        }
        return $payload;
    }

}