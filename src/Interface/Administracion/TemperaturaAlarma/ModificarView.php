<?php
namespace App\Interface\Administracion\TemperaturaAlarma;
use App\Control\TemperaturaAlarmaControl;
use App\Interface\FormView;
use App\Interface\Componentes\Select;
use App\Interface\Componentes\UpdateInput;
use App\Interface\Constantes;
use App\Control\Request;

class ModificarView extends FormView
{
    protected $title = 'Modificar Alarma de Temperatura';
    protected $subtitle = Constantes::UPDATE_SUBTITLE;

    public function __construct()
    {
        parent::__construct(
            TemperaturaAlarmaControl::class,
            [
                new Select('Id Temperatura Alarma', true, 'idtemperaturaalarma', fn($idtemperaturaalarma) => $this->updateInputs($idtemperaturaalarma)),
                new UpdateInput('Id Sensor', true, 'idtemperaturasensor'),
                new UpdateInput('Temperatura Superior', true, 'tasuperior'),
                new UpdateInput('Temperatura Inferior', true, 'tainferior'),
                new UpdateInput('Fecha y Hora de Inicio', false, 'tafechainicio'),
                new UpdateInput('Fecha y Hora de Fin', false, 'tafechafin')
            ]
        );
    }

    public function updateInputs($idtemperaturaalarma): bool
    {
        $inputs = $this->getInputs();
        $alarma = $this->getControlClass()->show($idtemperaturaalarma);
        $returnValue = true;

        if ($alarma) {
            foreach ($inputs as $input) {
                $propertyName = $input->getName();

                if ($propertyName !== 'idtemperaturaalarma') {                    
                    $input->setOldValue($alarma->$propertyName);
                }
            }
        } else {
            $this->showError(Constantes::formatMessage(Constantes::GET_ERROR_MESSAGE, 'No se encontró la alarma'));
            $returnValue = false;
        }

        return $returnValue;
    }

    public function save(): void 
    {
        $inputs = $this->getInputs();
        $idtemperaturaalarma = $this->getInputByField('idtemperaturaalarma')->getValue();
        $request = new Request();
        $request->fill($inputs);
        $returnValue = $this->getControlClass()->update($idtemperaturaalarma, $request);

        if (is_object($returnValue) && $returnValue) {
            $this->showSuccess(Constantes::formatMessage(Constantes::UPDATE_MESSAGE, 'Alarma de Temperatura'));
        } else {
            $this->showError(Constantes::formatMessage(Constantes::UPDATE_ERROR_MESSAGE, $returnValue));
        }
    }

    public function cancel(): void
    {
        $this->showMessage(Constantes::CANCEL_MESSAGE);
    }
}