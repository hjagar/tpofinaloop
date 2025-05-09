<?php

namespace App\Interface\Administracion\SensorHeladera;

use App\Interface\Componentes\Views\ListView;
use App\Control\SensorHeladeraControl;
use App\Interface\Componentes\Controles\Column;

class ListarView extends ListView
{
    public function __construct()
    {
        parent::__construct(
            'Sensores de Heladera',
            SensorHeladeraControl::class,
            'Sensor Heladera',
            [
                new Column('Id Sensor', 'idtemperaturasensor'),
                new Column('Marca', 'marca'),
                new Column('Modelo', 'modelo')                
            ]
        );
    }
}
