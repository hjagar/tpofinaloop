<?php

namespace App\Interface\Reportes;

use App\Control\ReportControl;
use App\Interface\Componentes\Controles\Column;
use App\Interface\Componentes\Controles\Input;
use App\Interface\Componentes\Views\SearchListView;

class RegistroTemperaturaMayorView extends SearchListView 
{
    public function __construct()
    {
        parent::__construct(
            'Registros de Temperatura Mayor',
            ReportControl::class,
            'Reporte Registros Temperatura Mayor',
            [
                new Column('Id Sensor', 'idsensortemperatura'),
                new Column('Código', 'tscodigo'),
                new Column('Ubicación', 'tsubicacion'),
                new Column('Fecha', 'tltemperatura'),
                new Column('Temperatura', 'temperatura')
            ],
            [
                new Input('Id Sensor', true, 'idsensortemperatura', false)
            ],
            'registroTemperaturaMayor'
        );
    }    
}