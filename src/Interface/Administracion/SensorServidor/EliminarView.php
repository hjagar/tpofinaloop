<?php

namespace App\Interface\Administracion\SensorServidor;

use App\Interface\Componentes\Views\DeleteFormView;
use App\Control\SensorServidorControl;
use App\Interface\Componentes\Controles\Select;

class EliminarView extends DeleteFormView
{
    public function __construct()
    {
        parent::__construct(
            SensorServidorControl::class,
            'Sensor Servidor',
            [new Select('Id Sensor', true, 'idtemperaturasensor', fn($id) => $this->showConfirmation($id))]
        );
    }
}
