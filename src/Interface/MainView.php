<?php
namespace App\Interface;
use App\Interface\MenuView;
use App\Interface\AdministracionView;
use App\Interface\ProcesosView;

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
        '0' => [
            'Label' => 'Salir',
            'ExitMessage' => 'Saliendo...',
            'Color' => "\e[1;31m",
        ]
    ];
}
