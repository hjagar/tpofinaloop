<?php

namespace App\Interface\Administracion\Sensor;

use App\Control\SensorControl;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Controles\UpdateInput;
use App\Interface\Componentes\Views\UpdateFormView;

class ModificarView extends UpdateFormView
{
    public function __construct()
    {
        parent::__construct(
            SensorControl::class,
            [
                new Select('Id Sensor', true, 'idtemperaturasensor', fn($id) => $this->updateInputs($id)),
                new UpdateInput('Código', true, 'tscodigo'),
                new UpdateInput('Ubicación', true, 'tsubicacion'),
                new UpdateInput('Elementos Resguardan', true, 'tselementosresguardan'),
                new UpdateInput('Monto Resguardado', true, 'tsmontoresguardado')
            ]
        );
    }
}
