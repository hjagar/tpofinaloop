<?php

namespace App\Interface\Administracion\Aviso;

use App\Control\AvisoControl;
use App\Interface\Componentes\Views\UpdateFormView;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Controles\UpdateInput;

class ModificarView extends UpdateFormView
{
    public function __construct()
    {
        parent::__construct(
            AvisoControl::class,
            'Aviso',
            [
                new Select('Id Aviso', true, 'idtemperaturaaviso', fn($id) => $this->updateInputs($id)),
                new UpdateInput('Id Sensor', true, 'idtemperaturasensor'),
                new UpdateInput('Temperatura Superior', true, 'tasuperior'),
                new UpdateInput('Temperatura Inferior', true, 'tainferior'),
                new UpdateInput('Fecha y Hora de Inicio', false, 'tafechainicio'),
                new UpdateInput('Fecha y Hora de Fin', false, 'tafechafin')
            ]
        );
    }
}
