<?php

namespace App\Interface\Administracion\SensorHeladera;

use App\Control\SensorHeladeraControl;
use App\Interface\Componentes\Views\UpdateFormView;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Controles\UpdateInput;

class ModificarView extends UpdateFormView
{
    public function __construct()
    {
        parent::__construct(
            SensorHeladeraControl::class,
            'Sensor Heladera',
            [
                new Select('Id Sensor', true, 'idtemperaturasensor', fn($id) => $this->updateInputs($id)),
                new UpdateInput('Marca', true, 'marca'),
                new UpdateInput('Modelo', true, 'modelo')
            ]
        );
    }
}
