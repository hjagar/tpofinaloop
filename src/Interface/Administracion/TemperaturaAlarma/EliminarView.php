<?php
namespace App\Interface\Administracion\TemperaturaAlarma;
use App\Interface\FormView;
use App\Control\TemperaturaAlarmaControl;
use App\Interface\Componentes\Input;
use App\Interface\Constantes;

class EliminarView extends FormView
{
    protected $title = 'Eliminar Alarma de Temperatura';    

    public function __construct()
    {
        parent::__construct(
            TemperaturaAlarmaControl::class,
            [new Input('Id Temperatura Alarma', true)]
        );
    }

    protected function save(): void
    {
        $id = $this->getInputs()[0]->getValue();
        $returnValue = $this->getControlClass()->delete($id);

        if(is_bool($returnValue) && $returnValue) {
            $this->showSuccess(Constantes::formatMessage(Constantes::DELETE_MESSAGE, "Temperatura Alarma ID: {$id}"));           
        } else {
            $this->showError(Constantes::formatMessage(Constantes::DELETE_ERROR_MESSAGE, $returnValue));
        }
    }

    protected function cancel(): void
    {
        $this->showMessage(Constantes::CANCEL_MESSAGE);
    }
}