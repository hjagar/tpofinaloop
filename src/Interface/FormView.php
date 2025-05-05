<?php

namespace App\Interface;

use App\Interface\ActionView;
use App\Interface\Componentes\Choice;
use App\Interface\Componentes\Direction;
use App\Interface\Constantes;

abstract class FormView extends ActionView
{
    private $inputs = [];
    private $inputsIndex = [];
    protected $subtitle = null;

    public function __construct($controlClass, $inputs = [])
    {
        parent::__construct($controlClass);
        $this->inputs = $inputs;
        $this->indexarInputs();
    }

    abstract protected function save(): void;
    abstract protected function cancel(): void;

    public function render()
    {
        $this->showTitle();
        $this->showSubtitle();
        $continue = $this->showInputs();

        if ($continue) {
            $this->showActions();
        }
    }

    protected function getInputs(): array
    {
        return $this->inputs;
    }

    protected function showInputs(): bool
    {
        $inputs = $this->getInputs();
        $returnValue = true;

        for ($i = 0; $i < count($inputs) && $returnValue; $i++) {
            $returnValue = $inputs[$i]->show();
        }

        return $returnValue;
    }

    protected function showActions(): void
    {
        $action = new Choice('Acciones', [
            1 => Constantes::SAVE,
            2 => Constantes::CANCEL
        ], true, 'Acción', Direction::HORIZONTAL, false, Constantes::BLUE_COLOR);
        $action->show();
        $option = $action->getValue();

        switch ($option) {
            case 1:
                $this->save();
                break;
            case 2:
                $this->cancel();
                break;
        }
    }

    public function getInputByField($field): ?object
    {
        $inputs = $this->getInputs();
        $inputsIndex = $this->getInputsIndex();
        $returnValue = null;

        if (array_key_exists($field, $inputsIndex)) {
            $index = $inputsIndex[$field];
            $returnValue = $inputs[$index];
        }

        return $returnValue;
    }

    private function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    private function showSubtitle(): void
    {
        $subtitle = $this->getSubtitle();
        $greenColor = Constantes::GREEN_COLOR;
        $resetColor = Constantes::RESET_COLOR;
        echo "{$greenColor}(*) Campo requerido.{$subtitle}Presione '/' para cancelar.{$resetColor}\n";
    }

    private function getInputsIndex(): array
    {
        return $this->inputsIndex;
    }

    private function setInputsIndex(array $inputsIndex): void
    {
        $this->inputsIndex = $inputsIndex;
    }

    private function indexarInputs(): void
    {
        $inputs = $this->getInputs();
        $inputsIndex = [];

        foreach ($inputs as $key => $input) {
            $inputsIndex[$input->getName()] = $key;
        }

        $this->setInputsIndex($inputsIndex);
    }
}
