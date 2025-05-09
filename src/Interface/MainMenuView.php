<?php

namespace App\Interface;

use App\Interface\Componentes\Views\MenuView;
use App\Interface\AdministracionMenuView;
use App\Interface\ProcesosMenuView;
use App\Interface\Componentes\Enums\Constantes;

class MainMenuView extends MenuView
{
    public function __construct()
    {
        parent::__construct(
            'Sistema de Monitoreo de Temperatura',
            [
                '1' => [
                    'Label' => 'Administración',
                    'Class' => AdministracionMenuView::class,
                ],
                '2' => [
                    'Label' => 'Procesos',
                    'Class' => ProcesosMenuView::class,
                ],
                Constantes::EXIT_OPTION => [
                    'Label' => Constantes::EXIT_LABEL,
                    'ExitMessage' => Constantes::EXIT_MESSAGE,
                    'Color' => Constantes::RED_COLOR,
                ]
            ]
        );
    }
}
