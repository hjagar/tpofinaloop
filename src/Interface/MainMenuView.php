<?php

namespace App\Interface;

use App\Interface\Componentes\Views\MenuView;
use App\Interface\AdministracionMenuView;
use App\Interface\ReportesMenuView;
use App\Interface\Componentes\Enums\Constantes;

class MainMenuView extends MenuView
{
    public function __construct()
    {
        parent::__construct(
            Constantes::MENU_PRINCIPAL,
            [
                '1' => [
                    'Label' => Constantes::ADMINISTRACION_LABEL,
                    'Class' => AdministracionMenuView::class,
                ],
                '2' => [
                    'Label' => Constantes::REPORTES_LABEL,
                    'Class' => ReportesMenuView::class,
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
