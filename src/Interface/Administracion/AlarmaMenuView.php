<?php

namespace App\Interface\Administracion;

use App\Interface\Componentes\Views\MenuView;
use App\Interface\Administracion\Alarma\AgregarView;
use App\Interface\Administracion\Alarma\ModificarView;
use App\Interface\Administracion\Alarma\EliminarView;
use App\Interface\Administracion\Alarma\ListarView;
use App\Interface\Componentes\Enums\Constantes;

class AlarmaMenuView extends MenuView
{
    public function __construct()
    {
        parent::__construct(
            'Administración de Alarmas',
            [
                '1' => [
                    'Label' => Constantes::ADD_LABEL, ///  'Agregar Alarma',
                    'Class' => AgregarView::class,
                ],
                '2' => [
                    'Label' => Constantes::MODIFY_LABEL, /// 'Modificar Alarma',
                    'Class' => ModificarView::class,
                ],
                '3' => [
                    'Label' => Constantes::DELETE_LABEL, /// 'Eliminar Alarma',
                    'Class' => EliminarView::class,
                ],
                '4' => [
                    'Label' => Constantes::LIST_LABEL, /// 'Listar Alarmas',
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
            'Alarma'
        );
    }
}
