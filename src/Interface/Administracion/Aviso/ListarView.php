<?php
namespace App\Interface\Administracion\Aviso;
use App\Control\AvisoControl;
use App\Interface\Componentes\Views\ListView;
use App\Interface\Componentes\Controles\Column;
use App\Interface\Componentes\Enums\Align;

class ListarView extends ListView
{
    public function __construct()
    {
        parent::__construct(
            'Avisos',	
            AvisoControl::class,
            [
                new Column('Id Aviso', 'idtemperaturaaviso'),
                new Column('Nombre Completo', 'tanombre'),
                new Column('Correo Electrónico', 'taemail'),
                new Column('Activo Desde', 'taactivo')
            ]
        );
    }
}