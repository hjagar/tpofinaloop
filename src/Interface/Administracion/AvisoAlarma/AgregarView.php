<?php

namespace App\Interface\Administracion\AvisoAlarma;

use App\Control\AvisoAlarmaControl;
use App\Interface\Componentes\Views\CreateFormView;
use App\Interface\Componentes\Controles\Input;
use App\Interface\Componentes\Enums\Constantes;
use App\Control\Request;

class AgregarView extends CreateFormView
{
    public function __construct()
    {
        parent::__construct(
            AvisoAlarmaControl::class,
            'Aviso Alarma',
            [
                new Input('Id Aviso', true, 'idtemperaturaaviso'),
                new Input('Id Alarma', true, 'idtemperaturaalarma')
            ]
        );
    }
}
