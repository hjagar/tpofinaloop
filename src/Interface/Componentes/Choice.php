<?php

namespace App\Interface\Componentes;

use App\Interface\Componentes\Input;
use App\Interface\Componentes\Direction;
use App\Interface\Componentes\Separator;
use App\Interface\Constantes;

class Choice extends Input
{
    private $options = [];
    private $direction;
    private bool $showRequired;
    private $color;

    public function __construct($label, array $options, $required = false, $name = null, $direction = Direction::VERTICAL, 
        $showRequired = true, $color = null)  
    {
        parent::__construct($label, $required, $name);
        $this->options = $options;
        $this->direction = $direction;
        $this->showRequired = $showRequired;
        $this->color = $color;
    }

    public function show(): bool
    {
        $returnValue = false;
        $label = $this->makeReadlinePrompt(color: Constantes::BLUE_COLOR, showRequired: $this->getShowRequired());
        $options = $this->makeOptionsString();
        $choicePrompt = $this->makeChoicePrompt();
        $prompt = $this->createReadlinePrompt($label, $options, $choicePrompt);
        $value = readline("{$prompt}");

        if (!$this->isCancelInput($value)) {
            if ($this->isRequired() && !array_key_exists($value, $this->options)) {
                $this->showError(Constantes::formatMessage(Constantes::REQUIRED, $this->getLabel()));
                $this->show();
            } else {
                $this->setValue($value);
            }

            $returnValue = true;
        }

        return $returnValue;
    }
    
    private function createReadlinePrompt($label, $options, $choice){
        $promptFirstElements = [$label, $options];
        $labelSeparator = $this->getLabelSeparator();
        $selectionSeparator = $this->getSelectionSeparator();
        $promptElements = implode($labelSeparator, $promptFirstElements);
        $promptFinalElements = [$promptElements, $choice];      

        return implode($selectionSeparator, $promptFinalElements);
    }

    private function makeOptionsString(): string
    {
        $options = $this->getOptions();
        $optionsToShowArray = [];
        $color = $this->getColor() ?? Constantes::GREY_COLOR;
        $resetColor = Constantes::RESET_COLOR;

        foreach ($options as $key => $option) {
            $optionsToShowArray[] = "{$color}{$key}. {$option}{$resetColor}";
        }

        return implode($this->getOptionSeparator(), $optionsToShowArray);
    }

    private function makeChoicePrompt(): string
    {
        $color = $this->getColor() ?? Constantes::GREY_COLOR;
        $resetColor = Constantes::RESET_COLOR;
        $choicePrompt = Constantes::CHOICE_MESSAGE;

        return "{$color}{$choicePrompt}{$resetColor} ";
    }

    private function getOptionSeparator(): string
    {
        return $this->getDirection() === Direction::HORIZONTAL ? Separator::PIPE->value() : Separator::NEWLINE->value();
    }

    private function getLabelSeparator(): string
    {
        return $this->getDirection() === Direction::HORIZONTAL ? Separator::SPACE->value() : Separator::NEWLINE->value();
    }
    
    private function getSelectionSeparator(): string
    {
        return $this->getDirection() === Direction::HORIZONTAL ? Separator::DASH->value() : Separator::NEWLINE->value();
    }
    
    private function getDirection(): Direction
    {
        return $this->direction;
    }

    private function getOptions(): array
    {
        return $this->options;
    }

    private function getShowRequired(): bool
    {
        return $this->showRequired;
    }

    private function getColor(): ?string
    {
        return $this->color;
    }
}
