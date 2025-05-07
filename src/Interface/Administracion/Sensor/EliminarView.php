<?php

namespace App\Interface\Administracion\Sensor;

use App\Control\SensorControl;
use App\Interface\Componentes\Views\DeleteFormView;
use App\Interface\Componentes\Controles\Select;

class EliminarView extends DeleteFormView
{
    public function __construct()
    {
        parent::__construct(
            SensorControl::class,
            'Sensor',
            [new Select('Id Sensor', true, 'idtemperaturasensor', fn($id) => $this->showConfirmation($id))]
        );
    }
}
