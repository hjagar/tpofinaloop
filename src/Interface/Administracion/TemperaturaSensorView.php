<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;

class TemperaturaSensorView extends MenuView
{
    protected $title = 'Administración de Sensores de Temperatura';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensor\AgregarTemperaturaSensorView',
        ],
        '2' => [
            'Label' => 'Modificar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensor\ModificarTemperaturaSensorView',
        ],
        '3' => [
            'Label' => 'Eliminar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensor\EliminarTemperaturaSensorView',
        ],
        '4' => [
            'Label' => 'Listar Sensores',
            'Class' => 'App\Interface\Administracion\TemperaturaSensor\ListarTemperaturaSensorView',
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