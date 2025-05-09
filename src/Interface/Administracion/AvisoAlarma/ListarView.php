<?php

namespace App\Interface\Administracion\AvisoAlarma;

use App\Interface\Componentes\Views\ListView;
use App\Control\AvisoAlarmaControl;
use App\Interface\Componentes\Controles\Column;

class ListarView extends ListView
{
    public function __construct()
    {
        parent::__construct(
            'Avisos Alarmas',
            AvisoAlarmaControl::class,
            'Aviso Alarma',
            [
                new Column('Id Aviso', 'idtemperaturaaviso'),
                new Column('Id Alarma', 'idtemperaturaalarma')
            ]
        );
    }
}
