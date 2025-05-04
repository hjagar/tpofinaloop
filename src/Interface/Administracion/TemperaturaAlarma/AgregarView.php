<?php
namespace App\Interface\Administracion\TemperaturaAlarma;
use App\Control\TemperaturaAlarmaControl;
use App\Interface\FormView;
use App\Interface\Componentes\Input;
use App\Interface\Constantes;
use App\Control\Request;

class AgregarView extends FormView
{
    protected $title = 'Agregar Alarma de Temperatura';

    public function __construct()
    {
        parent::__construct(
            TemperaturaAlarmaControl::class,
            [
                new Input('Id Sensor', true, 'idsensor'),
                new Input('Temperatura Superior', true, 'tasuperior'),
                new Input('Temperatura Inferior', true, 'tainferior'),
                new Input('Fecha y Hora de Inicio', false, 'fechainicio'),
                new Input('Fecha y Hora de Fin', false, 'fechafin')
            ]
        );
    }

    public function save(): void
    {
        $inputs = $this->getInputs();
        $request = new Request();
        $request->fill($inputs);
        $returnValue = $this->getControlClass()->create($request);

        if (is_object($returnValue) && $returnValue) {
            $this->showSuccess("Alarma de Temperatura agregada exitosamente.");
        } else {
            $this->showError("Error al agregar la Alarma de Temperatura: {$returnValue}");
        }
    }

    public function cancel(): void
    {
        $this->showMessage(Constantes::CANCEL_MESSAGE);
    }
}