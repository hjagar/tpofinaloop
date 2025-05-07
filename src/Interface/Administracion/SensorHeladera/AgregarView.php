<?php

namespace App\Interface\Administracion\SensorHeladera;

use App\Control\SensorHeladeraControl;
use App\Interface\Componentes\Views\CreateFormView;
use App\Interface\Componentes\Controles\Input;

class AgregarView extends CreateFormView
{
    public function __construct()
    {
        parent::__construct(
            SensorHeladeraControl::class,
            'Sensor Heladera',
            [
                new Input('Id Sensor', true, 'idtemperaturasensor'),
                new Input('Marca', true, 'marca'),
                new Input('Modelo', true, 'modelo')
            ]
        );
    }
}
