<?php
namespace App\Interface\Administracion\TemperaturaAlarma;
use App\Interface\FormView;
use App\Control\TemperaturaAlarmaControl;
use App\Interface\Componentes\Input;

class EliminarTemperaturaAlarmaView extends FormView
{
    protected $title = 'Eliminar Alarma de Temperatura';    

    public function __construct()
    {
        parent::__construct(
            TemperaturaAlarmaControl::class,
            [new Input('Id Temperatura Alarma', true)]
        );
    }

    public function render()
    {
        $this->showTitle();
        $this->showInputs();
        $this->showActions();
    }

    protected function save(): void
    {
        $id = $this->getInputs()[0]->getValue();
        $this->getControlClass()->delete($id);
        echo "Alarma de temperatura con ID {$id} eliminada.\n";
    }

    protected function cancel(): void
    {
        echo "Operación cancelada.\n";
    }
}