<?php
namespace App\Interface\Administracion\Sensor;
use App\Interface\Componentes\Views\ListView;
use App\Control\SensorControl;
use App\Interface\Componentes\Controles\Column;
use App\Interface\Componentes\Enums\Align;

class ListarView extends ListView
{
    public function __construct()
    {
        parent::__construct(
            'Sensores',
            SensorControl::class,
            'Sensor',
            [
                new Column('Id Sensor', 'idtemperaturasensor'),
                new Column('Código Sensor', 'tscodigo'),
                new Column('Ubicación Sensor', 'tsubicacion'),
                new Column('Elementos Resguardan', 'tselementosresguardan', align: Align::RIGHT),
                new Column('Monto Resguardado', 'tsmontoresguardado', align: Align::RIGHT)
            ]
        );
    }
}