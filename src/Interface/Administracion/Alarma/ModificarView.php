<?php

namespace App\Interface\Administracion\Alarma;

use App\Control\AlarmaControl;
use App\Control\Request;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Controles\UpdateInput;
use App\Interface\Componentes\Enums\Constantes;
use App\Interface\Componentes\Views\FormView;
use App\Interface\Componentes\Views\UpdateFormView;

class ModificarView extends UpdateFormView
{
    protected $title = 'Modificar Alarma';
    protected $subtitle = Constantes::UPDATE_SUBTITLE;

    public function __construct()
    {
        parent::__construct(
            AlarmaControl::class,
            'Alarma',
            [
                new Select('Id Temperatura Alarma', true, 'idtemperaturaalarma', fn($idtemperaturaalarma) => $this->updateInputs($idtemperaturaalarma)),
                new UpdateInput('Id Sensor', true, 'idtemperaturasensor'),
                new UpdateInput('Temperatura Superior', true, 'tasuperior'),
                new UpdateInput('Temperatura Inferior', true, 'tainferior'),
                new UpdateInput('Fecha y Hora de Inicio', false, 'tafechainicio'),
                new UpdateInput('Fecha y Hora de Fin', false, 'tafechafin')
            ]
        );
    }
}
