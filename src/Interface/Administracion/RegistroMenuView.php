<?php

namespace App\Interface\Administracion;

use App\Interface\Componentes\Views\MenuView;
use App\Interface\Registro\AgregarView;
use App\Interface\Registro\ModificarView;
use App\Interface\Registro\EliminarView;
use App\Interface\Registro\ListarView;
use App\Interface\Componentes\Enums\Constantes;

class RegistroMenuView extends MenuView
{
    public function __construct()
    {
        parent::__construct(
            'Administración de Registros',
            [
                // '1' => [
                //     'Label' => Constantes::ADD_LABEL, // 'Agregar Registro'
                //     'Class' => AgregarView::class,
                // ],
                // '2' => [
                //     'Label' => Constantes::MODIFY_LABEL, // 'Modificar Registro'
                //     'Class' => ModificarView::class,
                // ],
                // '3' => [
                //     'Label' => Constantes::DELETE_LABEL, // 'Eliminar Registro'
                //     'Class' => EliminarView::class,
                // ],
                // '4' => [
                //     'Label' => Constantes::LIST_LABEL, // 'Listar Registros'
                //     'Plural' => true,
                //     'Class' => ListarView::class,
                // ],
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
            'Registro'
        );
    }
}
