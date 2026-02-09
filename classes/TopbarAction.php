<?php

class TopbarAction {

    private array   $dataset    = [];
    private array   $classes    = [];
    private array   $attributes = [];
    private string  $tag        = 'a';
    private string  $label      = '';
    private ?string $icon       = null;
    private string  $iconType   = 'duotone';
    private string  $iconColor  = '';

    private const ICON_TYPE_LOOKUP = [
        'solid' => 'fas',
        'light' => 'fal',
        'regular' => 'far',
        'duotone' => 'fad',
        'brands' => 'fab'
    ];

    public function __construct(?array $data = [], ?string $tag = null) {
        if (!is_null($tag)) {
            $this->setTag($tag);
        }
        if (!is_null($data)) {
            $this->init($data);
        }
    }

    private function init($data) {
        if ($this->tag == 'a') {
            $this->setAttribute('href', 'javascript:void(0);');
        }

        if (is_array($data['classes'] ?? null)) {
            foreach($data['classes'] as $class) {
                if (!$this->classExists($class)) {
                    $this->addClass($class);
                }
            }
        }

        if (is_array($data['dataset'] ?? null)) {
            foreach($data['dataset'] as $dataKey => $dataValue) {
                $this->setDataset($dataKey, $dataValue);
            }
        }

        if (is_array($data['attributes'] ?? null)) {
            foreach($data['attributes'] as $attributeKey => $attributeValue) {
                $this->setAttribute($attributeKey, $attributeValue);
            }
        }

        if (is_string($data['label'] ?? null)) {
            $this->setLabel($data['label']);
        }

        if (!is_null($data['icon'] ?? null)) {
            $this->setIcon($data['icon']);
            if (is_string($data['icon_type'] ?? null)) {
                $this->setIconType($data['icon_type']);
            }
            if (is_string($data['icon_color'] ?? null)) {
                $this->setIconColor($data['icon_color']);
            }            
        }

        return $this;
    }

    public function setTag(string $tag): self {
        if (trim($tag) != '') {
            $this->tag = trim($tag);
        }
        return $this;
    }

    public function setDataset($key, $value): self {
        $this->dataset[$key] = $value;
        return $this;
    }

    public function setAttribute($key, $value): self {
        if ($key === 'class') {
            return $this->addClass($value);
        }
        $this->attributes[$key] = $value;
        return $this;
    }

    public function addClass($value): self {
        $this->classes[] = $value;
        return $this;
    }

    public function getDataset($key) {
        return $this->dataset[$key] ?? null;
    }

    public function getAttribute($key) {
        return $this->attributes[$key] ?? null;
    }

    public function getDatasetList() {
        return $this->dataset;
    }

    public function getAttributeList() {
        return $this->attributes;
    }

    public function getClassList() {
        return $this->classes;
    }

    public function datasetExists($key): bool {
        return array_key_exists($key, $this->dataset);
    }

    public function attributeExists($key): bool {
        return array_key_exists($key, $this->attributes);
    }

    public function classExists($key): bool {
        return in_array($key, $this->classes);
    }

    public function setLabel(string $value): self {
        if (trim($value) != '') {
            $this->label = trim($value);
        }
        return $this;
    }

    public function setIcon(string $value): self {
        if (trim($value) != '') {
            $this->icon = trim($value);
        }
        return $this;
    }

    public function setIconColor(string $value): self {
        if (trim($value) != '') {
            $this->iconColor = trim($value);
        }
        return $this;
    }
    
    public function setIconType(string $value): self {
        if (array_key_exists($value, self::ICON_TYPE_LOOKUP)) {
            $this->iconType = $value;
        }
        return $this;
    }

    public function render() {
        $this->addClass('action');
        $domDocument = new DOMDocument();
        $action = $domDocument->createElement($this->tag);
        $action->setAttribute('class', implode(' ', $this->classes));
        foreach($this->dataset as $key => $value) {
            $action->setAttribute('data-'.$key, $value);
        }
        foreach($this->attributes as $key => $value) {
            $action->setAttribute($key, $value);
        }
        if (!is_null($this->icon)) {
            $iconClassPrefix = self::ICON_TYPE_LOOKUP[$this->iconType];
            $span = $domDocument->createElement('span');
            $span->setAttribute('class', "{$iconClassPrefix} fa-{$this->icon} {$this->iconColor}");
            $action->appendChild($span);            
        }
        $action->appendChild($domDocument->createElement('label', $this->label));
        $domDocument->appendChild($action);
        return $domDocument->saveHTML();
    }
}