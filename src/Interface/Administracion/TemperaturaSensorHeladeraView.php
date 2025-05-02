<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;

class TemperaturaSensorHeladeraView extends MenuView
{
    protected $title = 'Temperatura Sensor Heladera';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorHeladera\AgregarSensorHeladeraView',
        ],
        '2' => [
            'Label' => 'Modificar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorHeladera\ModificarSensorHeladeraView',
        ],
        '3' => [
            'Label' => 'Eliminar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorHeladera\EliminarSensorHeladeraView',
        ],
        '4' => [
            'Label' => 'Listar Sensores',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorHeladera\ListarSensorHeladeraView',
        ],
        '0' => [
            'Label' => 'Volver al menú anterior',
            'ExitMessage' => "Volviendo al menú anterior...",
            'Color' => "\e[1;31m",
        ],
        'X' => [
            'Label' => 'Salir',
            'ExitMessage' => 'Saliendo...',
            'Color' => "\e[1;31m",
        ]

    ];
}