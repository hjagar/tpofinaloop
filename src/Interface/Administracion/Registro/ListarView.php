<?php

namespace App\Interface\Administracion\Registro;

use App\Interface\Componentes\Views\ListView;
use App\Control\RegistroControl;
use App\Interface\Componentes\Controles\Column;

class ListarView extends ListView
{
    public function __construct()
    {
        parent::__construct(
            'Registros',
            RegistroControl::class,
            'Registro',
            [
                new Column('Id Registro', 'idtemperaturaregistro'),
                new Column('Sensor', 'idtemperaturasensor'),
                new Column('Temperatura', 'tltemperatura'),
                new Column('Fecha Registro', 'tlfecharegistro')
            ]
        );
    }
}
