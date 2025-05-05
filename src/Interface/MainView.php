<?php
namespace App\Interface;
use App\Interface\MenuView;
use App\Interface\AdministracionView;
use App\Interface\ProcesosView;
use App\Interface\Constantes;

class MainView extends MenuView
{
    protected $title = 'Sistema de Monitoreo de Temperatura';
    protected $menu = [
        '1' => [
            'Label' => 'Administración',
            'Class' => AdministracionView::class,
        ],
        '2' => [
            'Label' => 'Procesos',
            'Class' => ProcesosView::class,
        ],
        Constantes::EXIT_OPTION => [
            'Label' => Constantes::EXIT_LABEL,
            'ExitMessage' => Constantes::EXIT_MESSAGE,
            'Color' => Constantes::RED_COLOR,
        ]
    ];
}
