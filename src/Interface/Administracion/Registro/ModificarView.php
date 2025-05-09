<?php

namespace App\Interface\Administracion\Registro;

use App\Control\RegistroControl;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Controles\UpdateInput;
use App\Interface\Componentes\Views\UpdateFormView;

class ModificarView extends UpdateFormView
{
    public function __construct()
    {
        parent::__construct(
            RegistroControl::class,
            'Registro',
            [
                new Select('Id Registro', true, 'idtemperaturaregistro', fn($id) => $this->updateInputs($id)),
                new UpdateInput('Id Sensor', true, 'idtemperaturasensor'),
                new UpdateInput('Temperatura', true, 'tltemperatura'),
                new UpdateInput('Fecha Registro', false, 'tlfecharegistro')
            ]
        );
    }
}
