<?php

namespace App\Interface\Administracion\SensorTemperaturaAviso;

use App\Interface\Componentes\Views\DeleteFormView;
use App\Control\AvisoAlarmaControl;
use App\Interface\Componentes\Controles\Input;
use App\Interface\Componentes\Controles\Select;

class EliminarView extends DeleteFormView
{
    public function __construct()
    {
        parent::__construct(
            AvisoAlarmaControl::class,
            'Aviso Alarma',
            [
                new Input('Id Aviso', true, 'idtemperaturaaviso'),
                new Select('Id Alarma', true, 'idtemperaturaalarma', fn($id) => $this->showConfirmationMultiKey($id))
            ]
        );
    }

    private function showConfirmationMultiKey($idAlarma)
    {
        $idAviso = $this->getInputByField('idtemperaturaaviso')->getValue();

        $this->showConfirmation([$idAviso, $idAlarma]);
    }
}
