<?php

namespace App\Interface\Administracion\Sensor;

use App\Control\SensorControl;
use App\Interface\Componentes\Views\CreateFormView;
use App\Interface\Componentes\Controles\Input;

class AgregarView extends CreateFormView
{
    public function __construct()
    {
        parent::__construct(
            SensorControl::class,
            'Sensor',
            [
                new Input('Código', true, 'tscodigo'),
                new Input('Ubicación', true, 'tsubicacion'),
                new Input('Elementos Resguardan', true, 'tselementosresguardan'),
                new Input('Monto Resguardado', true, 'tsmontoresguardado')
            ]
        );
    }
}
