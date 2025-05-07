<?php

namespace App\Interface\Administracion\Registro;

use App\Control\RegistroControl;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Views\DeleteFormView;

class EliminarView extends DeleteFormView
{
    public function __construct()
    {
        parent::__construct(
            RegistroControl::class,
            'Registro',
            [new Select('Id Registro', true, 'idtemperaturaregistro', fn($id) => $this->showConfirmation($id))]
        );
    }
}
