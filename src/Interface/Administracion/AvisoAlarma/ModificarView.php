<?php

namespace App\Interface\Administracion\AvisoAlarma;

use App\Control\AvisoAlarmaControl;
use App\Interface\Componentes\Controles\Input;
use App\Interface\Componentes\Views\UpdateFormView;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Controles\UpdateInput;

class ModificarView extends UpdateFormView
{
    public function __construct()
    {
        parent::__construct(
            AvisoAlarmaControl::class,
            [
                new Input('Id Aviso', true, 'idtemperaturaaviso', false),
                new Select('Id Alarma', true, 'idtemperaturaalarma', fn($id) => $this->updateInputsMultiKey($id), false),
                new UpdateInput('Id Aviso', true, 'idtemperaturaaviso'),
                new UpdateInput('Id Alarma', true, 'idtemperaturaalarma')
            ]
        );
    }

    private function getFirstInput()
    {
        $inputs = $this->getInputs();
        return $inputs[0];
    }

    private function updateInputsMultiKey($idAlarma)
    {
        $idAviso = $this->getFirstInput()->getValue();
        $this->updateInputs([$idAviso, $idAlarma]);
    }

    protected function prepareRequest(): array | object
    {
        list($idAlarma, $request) = parent::prepareRequest();
        $idAviso = $this->getFirstInput()->getValue();

        return [[$idAviso, $idAlarma], $request];
    }
}
