<?php

namespace App\Interface\Administracion;

use App\Interface\Componentes\Views\MenuView;
use App\Interface\Administracion\AvisoAlarma\AgregarView;
use App\Interface\Administracion\AvisoAlarma\ModificarView;
use App\Interface\Administracion\AvisoAlarma\EliminarView;
use App\Interface\Administracion\AvisoAlarma\ListarView;
use App\Interface\Componentes\Enums\Constantes;

class AvisoAlarmaMenuView extends MenuView
{
    public function __construct()
    {
        parent::__construct(
            'Administración de Avisos y Alarmas',
            [
                '1' => [
                    'Label' => Constantes::ADD_LABEL, // 'Agregar Sensor'
                    'Class' => AgregarView::class,
                ],
                '2' => [
                    'Label' => Constantes::MODIFY_LABEL, // 'Modificar Sensor'
                    'Class' => ModificarView::class,
                ],
                '3' => [
                    'Label' => Constantes::DELETE_LABEL, // 'Eliminar Sensor'
                    'Class' => EliminarView::class,
                ],
                '4' => [
                    'Label' => Constantes::LIST_LABEL, // 'Listar Sensores'
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
            'Aviso Alarma'
        );
    }
}
