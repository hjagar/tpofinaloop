<?php

namespace App\Interface\Componentes\Controles;

use App\Interface\Componentes\Controles\Input;
use App\Interface\Componentes\Enums\Constantes;

class UpdateInput extends Input
{
    private $oldValue = null;

    public function __construct($label, $required = false, $name = null, $oldValue = null)
    {
        parent::__construct($label, $required, $name);
        $this->oldValue = $oldValue;
    }

    public function show(): bool
    {
        $returnValue = false;
        $labelEnd = " (actual: {$this->getOldValue()})";
        $labelEndLength = Screen::plainLength($labelEnd) + 1;
        $label = $this->makeReadlinePrompt($labelEnd);
        $value = readline(Screen::showBottomLine("{$label}", $labelEndLength + $this->getLabelLength(), true));
        Screen::redrawRightLine();

        if (!$this->isCancelInput($value)) {
            $returnValue = true;

            if (empty($value)) {
                $this->setValue($this->getOldValue());
            } elseif (trim($value) === '-') {
                if ($this->isRequired()) {
                    $this->showError(Constantes::formatMessage(Constantes::REQUIRED, $this->getLabel()));
                    $this->relocateToShow();
                    $returnValue = $this->show();
                } else {
                    $this->setValue(null);
                }
            } else {
                $this->setValue($value);
            }
        }

        return $returnValue;
    }

    public function getOldValue()
    {
        return $this->oldValue;
    }

    public function setOldValue($oldValue): void
    {
        $this->oldValue = $oldValue;
    }
}
