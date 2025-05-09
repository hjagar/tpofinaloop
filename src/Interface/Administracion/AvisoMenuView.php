<?php

namespace App\Interface\Administracion;

use App\Interface\Componentes\Views\MenuView;
use App\Interface\Administracion\Aviso\AgregarView;
use App\Interface\Administracion\Aviso\ModificarView;
use App\Interface\Administracion\Aviso\EliminarView;
use App\Interface\Administracion\Aviso\ListarView;
use App\Interface\Componentes\Enums\Constantes;

class AvisoMenuView extends MenuView
{
    public function __construct()
    {
        parent::__construct(
            'Administración de Avisos',
            [
                '1' => [
                    'Label' => Constantes::ADD_LABEL, // 'Agregar Aviso'
                    'Class' => AgregarView::class,
                ],
                '2' => [
                    'Label' => Constantes::MODIFY_LABEL, // 'Modificar Aviso'
                    'Class' => ModificarView::class,
                ],
                '3' => [
                    'Label' => Constantes::DELETE_LABEL, // 'Eliminar Aviso'
                    'Class' => EliminarView::class,
                ],
                '4' => [
                    'Label' => Constantes::LIST_LABEL, // 'Listar Avisos'\
                    'Plural' => true,
                    'Class' => ListarView::class,
                ],
                Constantes::BACK_OPTION => [
                    'Label' => Constantes::BACK_LABEL,
                    'ExitMessage' => Constantes::BACK_MESSAGE,
                    'Color' => Constantes::RED_COLOR,
                ],
                Constantes::EXIT_OPTION => [
                    'Label' => Constantes::EXIT_LABEL,
                    'ExitMessage' => Constantes::EXIT_MESSAGE,
                    'Color' => Constantes::RED_COLOR,
                ]
            ],
            'Aviso'
        );
    }
}
