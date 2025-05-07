<?php
namespace App\Interface\Administracion\SensorServidor;
use App\Control\SensorServidorControl;
use App\Interface\FormView;
use App\Interface\Componentes\Input;
use App\Interface\Componentes\Enums\Constantes;
use App\Control\Request;

class AgregarView extends FormView
{
    protected $title = 'Agregar Sensor Servidor';

    public function __construct()
    {
        parent::__construct(
            SensorServidorControl::class,
            [
                new Input('Id Sensor', true, 'idtemperaturasensor'),
                new Input('Temperatura Superior', true, 'tasuperior'),
                new Input('Temperatura Inferior', true, 'tainferior'),
                new Input('Fecha y Hora de Inicio', false, 'tafechainicio'),
                new Input('Fecha y Hora de Fin', false, 'tafechafin')
            ]
        );
    }

    public function save(): void
    {
        $inputs = $this->getInputs();
        $request = new Request();
        $request->fill($inputs);
        $returnValue = $this->getController()->create($request);

        if (is_object($returnValue) && $returnValue) {
            $this->showSuccess(Constantes::SAVE_MESSAGE, 'Sensor Servidor');
        } else {
            $this->showError(Constantes::formatMessage(Constantes::SAVE_ERROR_MESSAGE, $returnValue));
        }
    }

    public function cancel(): void
    {
        $this->showMessage(Constantes::CANCEL_MESSAGE);
    }
}