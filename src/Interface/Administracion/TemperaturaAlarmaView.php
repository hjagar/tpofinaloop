<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;

class TemperaturaAlarmaView extends MenuView
{
    protected $title = 'Administración de Alarmas de Temperatura';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Alarma',
            'Class' => 'App\Interface\Administracion\TemperaturaAlarma\AgregarTemperaturaAlarmaView',
        ],
        '2' => [
            'Label' => 'Modificar Alarma',
            'Class' => 'App\Interface\Administracion\TemperaturaAlarma\ModificarTemperaturaAlarmaView',
        ],
        '3' => [
            'Label' => 'Eliminar Alarma',
            'Class' => 'App\Interface\Administracion\TemperaturaAlarma\EliminarTemperaturaAlarmaView',
        ],
        '4' => [
            'Label' => 'Listar Alarmas',
            'Class' => 'App\Interface\Administracion\TemperaturaAlarma\ListarTemperaturaAlarmaView',
        ],
        '0' => [
            'Label' => 'Volver al menú anterior',
            'ExitMessage' => 'Volviendo al menú anterior...',
            'Color' => "\e[1;31m",
        ],
        'X' => [
            'Label' => 'Salir',
            'ExitMessage' => 'Saliendo...',
            'Color' => "\e[1;31m",
        ]
    ];
}