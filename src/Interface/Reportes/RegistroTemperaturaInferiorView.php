<?php

namespace App\Interface\Reportes;

use App\Control\ReportControl;
use App\Interface\Componentes\Controles\Column;
use App\Interface\Componentes\Controles\Input;
use App\Interface\Componentes\Views\SearchListView;

class RegistroTemperaturaInferiorView extends SearchListView 
{
    public function __construct()
    {
        parent::__construct(
            'Registros de Temperatura Inferior',
            ReportControl::class,
            'Reporte Registros Temperatura Inferior',
            [
                new Column('Id Sensor', 'idtemperaturasensor'),
                new Column('Código', 'tscodigo'),
                new Column('Ubicación', 'tsubicacion'),
                new Column('Fecha', 'tltemperatura'),
                new Column('Temperatura', 'tltemperatura')
            ],
            [
                new Input('Id Sensor', true, 'idtemperaturasensor', false)
            ],
            'registroTemperaturaInferior'
        );
    }    
}