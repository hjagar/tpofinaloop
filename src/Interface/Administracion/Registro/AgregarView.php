<?php

namespace App\Interface\Administracion\Registro;

use App\Control\RegistroControl;
use App\Interface\Componentes\Controles\Input;
use App\Interface\Componentes\Views\CreateFormView;

class AgregarView extends CreateFormView
{
    public function __construct()
    {
        parent::__construct(
            RegistroControl::class,
            'Registro',
            [
                new Input('Id Sensor', true, 'idtemperaturasensor'),
                new Input('Temperatura', true, 'tltemperatura'),
                new Input('Fecha Registro', false, 'tlfecharegistro')
            ]
        );
    }
}
