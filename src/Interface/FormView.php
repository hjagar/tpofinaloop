<?php
namespace App\Interface;
use App\Interface\ActionView;
use App\Interface\Componentes\Choice;
use App\Interface\Componentes\Direction;

abstract class FormView extends ActionView
{
    protected $inputs = [];

    public function __construct($controlClass, $inputs = [])
    {
        parent::__construct($controlClass);
        $this->inputs = $inputs;
    }

    abstract protected function save(): void;
    abstract protected function cancel(): void;

    protected function getInputs(): array
    {
        return $this->inputs;
    }

    protected function showInputs(): void
    {
        $inputs = $this->getInputs();
        foreach ($inputs as $input) {
            $input->show();
        }
    }

    protected function showActions(): void
    {
        $action = new Choice('Acciones', [
            1 => 'Guardar',
            2 => 'Cancelar'
        ], true, 'Acción', Direction::HORIZONTAL);        
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
}