<?php
namespace App\Interface;
use App\Interface\MenuView;

class AdministracionView extends MenuView
{
    protected $title = 'Administración de Sensores de Temperatura';
    protected $menu = [
        '1' => [
            'Label' => 'Temperatura Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorView',
        ],
        '2' => [
            'Label' => 'Temperatura Sensor Heladera',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorHeladeraView',
        ],
        '3' => [
            'Label' => 'Temperatura Sensor Servidor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorServidorView',
        ],
        '4' => [
            'Label' => 'Temperatura Sensor Temperatura Aviso',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorTemperaturaAvisoView',
        ],
        '5' => [
            'Label' => 'Temperatura Alarma',
            'Class' => 'App\Interface\Administracion\TemperaturaAlarmaView',
        ],
        '6' => [
            'Label' => 'Temperatura Aviso',
            'Class' => 'App\Interface\Administracion\TemperaturaAvisoView',
        ],
        '7' => [
            'Label' => 'Temperatura Registro',
            'Class' => 'App\Interface\Administracion\TemperaturaRegistroView',
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