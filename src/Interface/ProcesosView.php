<?php
namespace App\Interface;
use App\Interface\MenuView;

class ProcesosView extends MenuView
{
    protected $title = 'Sistema de Monitoreo de Temperatura - Procesos';
    protected $menu = [
        '1' => [
            'Label' => Constantes::LIST_LABEL, // 'Listar Alarmas'
            'Class' => 'App\Interface\Procesos\ListarAlarmasView',
        ],
        '2' => [
            'Label' => Constantes::ADD_LABEL, // 'Agregar Alarma'
            'Class' => 'App\Interface\Procesos\AgregarAlarmaView',
        ],
        Constantes::BACK_OPTION => [
            'Label' => Constantes::EXIT_LABEL,
            'ExitMessage' => Constantes::EXIT_MESSAGE,
            'Color' => Constantes::RED_COLOR,
        ]
    ];
}