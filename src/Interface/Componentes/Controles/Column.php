<?php

namespace App\Interface\Componentes\Controles;

use App\Interface\Componentes\Enums\Align;

class Column
{
    private array $properties;

    public function __construct($label, $field, $width = 0, $align = Align::LEFT)
    {
        $this->properties = [
            'label' => $label,
            'field' => $field,
            'width' => $width,
            'align' => $align
        ];
    }

    public function __get($name)
    {
        $returnValue = null;

        if (array_key_exists($name, $this->properties)) {
            $returnValue = $this->properties[$name];
        }

        return $returnValue;
    }

    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->properties)) {
            $this->properties[$name] = $value;
        }
    }

    public function __call($name, $arguments)
    {
        $parsedProperty = $this->parsePropertyName($name);
        $returnValue = null;

        if ($parsedProperty !== null) {
            list($action, $property) = $parsedProperty;
            switch ($action) {
                case 'get':
                    $returnValue = $this->$property;
                    break;

                case 'set':
                    $this->$property = $arguments[0];
                    break;
            }
        }

        if ($returnValue !== null) {
            return $returnValue;
        }
    }

    private function parsePropertyName($name)
    {
        $returnValue = null;

        if (str_starts_with($name, 'set') || str_starts_with($name, 'get')) {
            $action = substr($name, 0, 3);
            $property = strtolower(substr($name, 3));
            $returnValue = [$action, $property];
        }

        return $returnValue;
    }
}
