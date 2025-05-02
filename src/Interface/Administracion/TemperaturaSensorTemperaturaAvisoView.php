<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;

class TemperaturaSensorTemperaturaAvisoView extends MenuView
{
    protected $title = 'Administración de Sensores de Temperatura Aviso';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorTemperaturaAviso\AgregarTemperaturaSensorTemperaturaAvisoView',
        ],
        '2' => [
            'Label' => 'Modificar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorTemperaturaAviso\ModificarTemperaturaSensorTemperaturaAvisoView',
        ],
        '3' => [
            'Label' => 'Eliminar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorTemperaturaAviso\EliminarTemperaturaSensorTemperaturaAvisoView',
        ],
        '4' => [
            'Label' => 'Listar Sensores',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorTemperaturaAviso\ListarTemperaturaSensorTemperaturaAvisoView',
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