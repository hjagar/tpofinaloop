<?php
namespace App\Interface\Componentes;

class Input
{
    private $field;
    private $label;
    private $required;
    private $value = null;

    public function __construct($label, $required = false, $field = null)
    {
        if ($field === null) {
            $field = $label;
        }
    
        $this->field = $field;
        $this->label = $label;
        $this->required = $required;
    }

    public function show(): void
    {
        $label = "{$this->getLabel()}: ";
        $value = readline($label);

        if ($this->isRequired() && empty($value)) {
            echo "{$this->getLabel()} es requerido.\n";
            $this->show();
        } else {
            $this->setValue($value);
        }
    }

    public function getField(): string
    {
        return $this->field;
    }
    
    public function getLabel(): string
    {
        return $this->label;
    }

    public function isRequired(): bool
    {
        return $this->required;
    }

    public function setValue($value): void
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}