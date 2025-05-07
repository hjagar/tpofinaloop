<?php
namespace App\Interface\Administracion\SensorTemperaturaAviso;
use App\Control\AvisoAlarmaControl;
use App\Interface\FormView;
use App\Interface\Componentes\Select;
use App\Interface\Componentes\UpdateInput;
use App\Interface\Componentes\Enums\Constantes;
use App\Control\Request;

class ModificarView extends FormView
{
    protected $title = 'Modificar Aviso Alarma';
    protected $subtitle = Constantes::UPDATE_SUBTITLE;

    public function __construct()
    {
        parent::__construct(
            AvisoAlarmaControl::class,
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
        $alarma = $this->getController()->show($idtemperaturaalarma);
        $returnValue = true;

        if ($alarma) {
            foreach ($inputs as $input) {
                $propertyName = $input->getName();

                if ($propertyName !== 'idtemperaturaalarma') {                    
                    $input->setOldValue($alarma->$propertyName);
                }
            }
        } else {
            $this->showError(Constantes::formatMessage(Constantes::NOT_FOUND_ERROR_MESSAGE, "Aviso Alarma {$idtemperaturaalarma}"));
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
        $returnValue = $this->getController()->update($idtemperaturaalarma, $request);

        if (is_object($returnValue) && $returnValue) {
            $this->showSuccess(Constantes::formatMessage(Constantes::UPDATE_MESSAGE, 'Aviso Alarma'));
        } else {
            $this->showError(Constantes::formatMessage(Constantes::UPDATE_ERROR_MESSAGE, $returnValue));
        }
    }

    public function cancel(): void
    {
        $this->showMessage(Constantes::CANCEL_MESSAGE);
    }
}