<?php
namespace App\Interface\Componentes;
use App\Interface\Componentes\Input;
use App\Interface\Componentes\Direction;
use App\Interface\Componentes\Separator;

class Choice extends Input
{
    private $options = [];
    private $direction;

    public function __construct($label, array $options, $required = false, $name = null, $direction = Direction::VERTICAL)
    {    
        parent::__construct($label, $required, $name);
        $this->options = $options;
        $this->direction = $direction;
    }

    public function show(): void
    {
        echo "\e[1;34m{$this->getLabel()}: \e[0m";
        $separator = $this->getSeparator();
        $optionsToShowArray = [];

        foreach ($this->options as $key => $option) {
            $optionsToShowArray[] = "\e[1;34m{$key}. {$option}\e[0m";
        }
        
        $optionsToShowStr = implode($separator, $optionsToShowArray);
        echo "{$optionsToShowStr}\n";
        $value = readline("Seleccione una opción: ");

        if ($this->isRequired() && !array_key_exists($value, $this->options)) {
            echo "{$this->getName()} es requerido.\n";
            $this->show();
        } else {
            $this->setValue($value);
        }
    }

    private function getSeparator(): string
    {
        return $this->direction === Direction::HORIZONTAL ? Separator::DASH : Separator::NEWLINE;
    }
}
