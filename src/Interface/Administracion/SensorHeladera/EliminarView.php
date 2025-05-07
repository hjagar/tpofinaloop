<?php

namespace App\Interface\Administracion\SensorHeladera;

use App\Interface\Componentes\Views\DeleteFormView;
use App\Control\SensorHeladeraControl;
use App\Interface\Componentes\Controles\Select;

class EliminarView extends DeleteFormView
{
    public function __construct()
    {
        parent::__construct(
            SensorHeladeraControl::class,
            'Sensor Heladera',
            [new Select('Id Sensor', true, 'idtemperaturasensor', fn($id) => $this->showConfirmation($id))]
        );
    }
}
