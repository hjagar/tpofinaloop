<?php

namespace App\Interface\Componentes\Views;

use App\Interface\Componentes\Views\ActionView;
use App\Interface\Componentes\Controles\Choice;
use App\Interface\Componentes\Enums\Direction;
use App\Interface\Componentes\Enums\Constantes;
use App\Control\Request;
use App\Interface\Componentes\Controles\Screen;

abstract class FormView extends ActionView
{
    private $inputs = [];
    private $inputsIndex = [];
    protected $subtitle = null;

    public function __construct($title, $controlClass, $entity, $subtitle = null, $inputs = [])
    {
        parent::__construct($title, $controlClass, $entity);
        $this->subtitle = $subtitle;
        $this->inputs = $inputs;
        $this->indexarInputs();
    }

    abstract protected function save(): void;

    protected function cancel(): void
    {
        $this->showMessage(Constantes::CANCEL_MESSAGE);
    }

    public function render()
    {
        Screen::clearScreen();
        $this->showApplicationTitle();
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
        $i = 0;

        while ($i < count($inputs) && $returnValue) {
            $returnValue = $inputs[$i]->show();
            $i++;
        }

        return $returnValue;
    }

    protected function showActions(): void
    {
        $action = new Choice('Acciones', [
            1 => Constantes::SAVE,
            2 => Constantes::CANCEL
        ], true, 'Acción', Direction::HORIZONTAL, false, $this->getBlueColor());
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
        $green = $this->getGreenColor();
        $reset = $this->getResetColor();
        $subtitlePlain = "(*) requerido.{$subtitle} '/' cancelar.";
        $subtitleLength = Screen::plainLength($subtitlePlain);
        Screen::showLeftRightDoubleBorders("{$green}(*) requerido.{$subtitle} '/' cancelar.{$reset}", $subtitleLength);
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

    protected function prepareRequest()
    {
        $inputs = $this->getInputs();
        $request = new Request();
        $request->fill($inputs);

        return $request;
    }
}
