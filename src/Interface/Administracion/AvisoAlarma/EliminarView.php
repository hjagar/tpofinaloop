<?php
namespace App\Interface\Administracion\SensorTemperaturaAviso;
use App\Interface\FormView;
use App\Control\AvisoAlarmaControl;
use App\Interface\Componentes\Input;
use App\Interface\Componentes\Enums\Constantes;

class EliminarView extends FormView
{
    protected $title = 'Eliminar Aviso Alarma';    

    public function __construct()
    {
        parent::__construct(
            AvisoAlarmaControl::class,
            [new Input('Id Temperatura Alarma', true)]
        );
    }

    protected function save(): void
    {
        $id = $this->getInputs()[0]->getValue();
        $returnValue = $this->getController()->delete($id);

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