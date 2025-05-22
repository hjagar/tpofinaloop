<?php

namespace App\Interface\Componentes\Controles;

use App\Interface\Componentes\Enums\Constantes;

class Input
{
    private $name;
    private $label;
    private $required;
    private $value = null;
    private $fillable;
    private $labelLength;

    public function __construct($label, $required = false, $name = null, $fillable = true)
    {
        $this->label = $label;
        $this->required = $required;
        $this->name = $name;
        $this->fillable = $fillable;
        $this->labelLength = Screen::plainLength("    {$label}");
    }

    protected function plainReadlinePromptLength($label, $showRequired)
    {
        $requiredSymbol = Constantes::REQUIRED_SYMBOL;
        $inputIndent = str_repeat(' ', Constantes::INPUT_INDENT);
        $plainRequired = $this->isRequired() && $showRequired ? $requiredSymbol : $inputIndent;
        $plainLabelLength = Screen::plainLength("{$plainRequired} {$label}");

        return $plainLabelLength;
    }

    public function makeReadlinePrompt($labelEnd = null, $color = null, $showRequired = true): string
    {
        $labelBegin = $this->getLabel();
        $resetColor = Constantes::RESET_COLOR;
        $redColor = Constantes::RED_COLOR;
        $requiredSymbol = Constantes::REQUIRED_SYMBOL;
        $inputIndent = str_repeat(' ', Constantes::INPUT_INDENT);
        $required = $this->isRequired() && $showRequired ?  "{$redColor}{$requiredSymbol}{$resetColor} " : $inputIndent;
        $label = $color ? "{$color}{$labelBegin}{$resetColor}" : "{$labelBegin}{$labelEnd}";

        return "{$required}{$label}: ";
    }

    public function isCancelInput($value): bool
    {
        return $value === '/';
    }

    public function show(): bool
    {
        $returnValue = false;
        $label = $this->makeReadlinePrompt();
        $value = readline(Screen::showBottomLine("{$label}", $this->getLabelLength(), true));
        Screen::redrawRightLine();

        if (!$this->isCancelInput($value)) {
            if ($this->isRequired() && empty($value)) {
                $this->showError(Constantes::formatMessage(Constantes::REQUIRED, $this->getLabel()));
                $this->relocateToShow();
                $returnValue = $this->show();
            } else {
                $returnValue = true;
                $this->setValue($value);
            }            
        }

        return $returnValue;
    }

    public function showError($message, $bottom = false): void
    {
        $redColor = Constantes::RED_COLOR;
        $resetColor = Constantes::RESET_COLOR;
        $redMessage = "{$redColor}{$message}{$resetColor}";
        readline(Screen::showBottomLine($redMessage, Screen::plainLength($message), true));
        Screen::cleanLine();              
    }

    protected function relocateToShow()
    {
        Cursor::up(2);
        Cursor::first();
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

    public function getFillable(): bool
    {
        return $this->fillable;
    }

    public function getLabelLength(): int
    {
        return $this->labelLength;
    }
}
