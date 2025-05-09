<?php
namespace App\Interface\Administracion\Aviso;
use App\Control\AvisoControl;
use App\Interface\Componentes\Views\CreateFormView;
use App\Interface\Componentes\Controles\Input;
use App\Interface\Componentes\Enums\Constantes;
use App\Control\Request;

class AgregarView extends CreateFormView
{
    public function __construct()
    {
        parent::__construct(
            AvisoControl::class,
            'Aviso',	
            [
                new Input('Nombre Completo', true, 'tanombre'),
                new Input('Correo Electrónico', true, 'taemail'),
                new Input('Activo Desde', false, 'taactivo')
            ]
        );
    }
}