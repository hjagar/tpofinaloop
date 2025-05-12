<?php

namespace App\Interface\Administracion\Alarma;

use App\Interface\Componentes\Views\ListView;
use App\Interface\Componentes\Controles\Column;
use App\Interface\Componentes\Enums\Align;
use App\Control\AlarmaControl;

class ListarView extends ListView
{
    public function __construct()
    {
        parent::__construct(
            'Alarmas',
            AlarmaControl::class,
            'Alarma',
            [
                new Column('Id Alarma', 'idtemperaturaalarma'),
                new Column('Sensor', 'idtemperaturasensor'),
                new Column('Temperatura Superior', 'tasuperior', align: Align::RIGHT),
                new Column('Temperatura Inferior', 'tainferior', align: Align::RIGHT),
                new Column('Fecha Hora Inicio', 'tafechainicio', format: fn($date) => $this->dateFormat($date)),
                new Column('Fecha Hora Fin', 'tafechafin', format: fn($date) => $this->dateFormat($date)),
            ]
        );
    }
}
