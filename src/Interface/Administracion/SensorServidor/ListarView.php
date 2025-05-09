<?php
namespace App\Interface\Administracion\SensorServidor;
use App\Interface\Componentes\Views\ListView;
use App\Control\SensorServidorControl;
use App\Interface\Componentes\Controles\Column;
use App\Interface\Componentes\Enums\Align;

class ListarView extends ListView
{
    protected $title = 'Listado de Alarmas de Temperatura';

    protected $columns = [
        'Id Alarma',
        'Sensor',
        'Temperatura Superior',
        'Temperatura Inferior',
        'Fecha y Hora de Inicio',
        'Fecha y Hora de Fin'
    ];

    public function __construct()
    {
        parent::__construct(
            'Sensores de Servidor',
            SensorServidorControl::class,
            'Sensor Servidor',
            [
                new Column('Id Sensor', 'idtemperaturasensor'),
                new Column('Porcentaje Perdida', 'tssporcentajeperdida', align: Align::RIGHT)
            ]
        );
    }
}