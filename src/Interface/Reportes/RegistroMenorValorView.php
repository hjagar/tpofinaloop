<?php

namespace App\Interface\Reportes;

use App\Control\ReportControl;
use App\Interface\Componentes\Controles\Column;
use App\Interface\Componentes\Controles\Input;
use App\Interface\Componentes\Views\SearchListView;

class RegistroTemperaturaMenorView extends SearchListView 
{
    public function __construct()
    {
        parent::__construct(
            'Registros de Temperatura Menor',
            ReportControl::class,
            'Reporte Registros Temperatura Menor',
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
            'registroTemperaturaMenor'
        );
    }    
}