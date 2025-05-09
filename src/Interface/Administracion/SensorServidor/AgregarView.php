<?php

namespace App\Interface\Administracion\SensorServidor;

use App\Control\SensorServidorControl;
use App\Interface\Componentes\Views\CreateFormView;
use App\Interface\Componentes\Controles\Input;

class AgregarView extends CreateFormView
{
    public function __construct()
    {
        parent::__construct(
            SensorServidorControl::class,
            'Sensor Servidor',
            [
                new Input('Id Sensor', true, 'idtemperaturasensor'),
                new Input('Porcentaje Perdida', true, 'tssporcentajeperdida')
            ]
        );
    }
}
