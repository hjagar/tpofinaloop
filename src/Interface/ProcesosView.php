<?php
namespace App\Interface;
use App\Interface\MenuView;

class ProcesosView extends MenuView
{
    protected $title = 'Sistema de Monitoreo de Temperatura - Procesos';
    protected $menu = [
        '1' => [
            'Label' => 'Listar Alarmas',
            'Class' => 'App\Interface\Procesos\ListarAlarmasView',
        ],
        '2' => [
            'Label' => 'Agregar Alarma',
            'Class' => 'App\Interface\Procesos\AgregarAlarmaView',
        ],
        '0' => [
            'Label' => 'Salir',
            'ExitMessage' => 'Saliendo...',
            'Color' => "\e[1;31m",
        ]
    ];
}