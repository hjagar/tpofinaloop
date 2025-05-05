<?php

namespace App\Interface\Componentes;

use App\Interface\Componentes\Input;
use App\Interface\Constantes;

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
        $label = $this->makeReadlinePrompt(" (actual: {$this->getOldValue()})");
        $value = readline("{$label} ");

        if (!$this->isCancelInput($value)) {
            if (empty($value)) {
                $this->setValue($this->getOldValue());
            } elseif (trim($value) === '-') {
                if ($this->isRequired()) {
                    $this->showError(Constantes::formatMessage(Constantes::REQUIRED, $this->getLabel()));
                    $this->show();
                } else {
                    $this->setValue(null);
                }
            } else {
                $this->setValue($value);
            }

            $returnValue = true;
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
