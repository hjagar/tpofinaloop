<?php

namespace App\Interface\Administracion\Alarma;

use App\Control\AlarmaControl;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Enums\Constantes;
use App\Interface\Componentes\Views\DeleteFormView;

class EliminarView extends DeleteFormView
{
    public function __construct()
    {
        parent::__construct(
            AlarmaControl::class,
            'Alarma',
            [new Select('Id Alarma', true, 'idtemperaturaalarma', fn($id) => $this->showConfirmation($id))]
        );
    }
}
