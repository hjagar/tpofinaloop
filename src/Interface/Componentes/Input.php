<?php
namespace App\Interface\Componentes;

class Input
{
    private $name;
    private $label;
    private $required;
    private $value = null;

    public function __construct($label, $required = false, $name = null)
    {
        if ($name === null) {
            $name = $label;
        }
    
        $this->name = $name;
        $this->label = $label;
        $this->required = $required;
    }

    public function show(): void
    {
        $value = readline("{$this->getLabel()}: ");

        if ($this->isRequired() && empty($value)) {
            echo "{$this->getName()} es requerido.\n";
            $this->show();
        } else {
            $this->setValue($value);
        }
    }

    public function getName(): string
    {
        return $this->name;
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