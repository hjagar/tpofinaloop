<?php

namespace App\Interface\Administracion\SensorServidor;

use App\Control\SensorServidorControl;
use App\Interface\Componentes\Views\UpdateFormView;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Controles\UpdateInput;

class ModificarView extends UpdateFormView
{
    public function __construct()
    {
        parent::__construct(
            SensorServidorControl::class,
            [
                new Select('Id Sensor', true, 'idtemperaturasensor', fn($id) => $this->updateInputs($id)),
                new UpdateInput('Porcentaje Perdida', true, 'tssporcentajeperdida')
            ]
        );
    }
}
