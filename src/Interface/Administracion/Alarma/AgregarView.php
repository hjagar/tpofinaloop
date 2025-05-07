<?php

namespace App\Interface\Administracion\Alarma;

use App\Interface\Componentes\Views\CreateFormView;
use App\Interface\Componentes\Controles\Input;
use App\Control\AlarmaControl;

class AgregarView extends CreateFormView
{
    public function __construct()
    {
        parent::__construct(
            AlarmaControl::class,
            'Alarma',
            [
                new Input('Id Sensor', true, 'idtemperaturasensor'),
                new Input('Temperatura Superior', true, 'tasuperior'),
                new Input('Temperatura Inferior', true, 'tainferior'),
                new Input('Fecha y Hora de Inicio', false, 'tafechainicio'),
                new Input('Fecha y Hora de Fin', false, 'tafechafin')
            ]
        );
    }
}
