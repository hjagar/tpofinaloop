<?php
namespace App\Interface\Administracion\Aviso;
use App\Control\AvisoControl;
use App\Interface\Componentes\Views\DeleteFormView;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Enums\Constantes;

class EliminarView extends DeleteFormView
{
    public function __construct()
    {
        parent::__construct(
            AvisoControl::class,
            'Aviso',	
            [new Select('Id Aviso', true, 'idtemperaturaaviso', fn($id) => $this->showConfirmation($id))]
        );
    }
}