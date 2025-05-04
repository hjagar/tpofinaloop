<?php
namespace App\Interface;
use App\Interface\MenuView;
use App\Interface\Administracion\TemperaturaSensorView;
use App\Interface\Administracion\TemperaturaSensorHeladeraView;
use App\Interface\Administracion\TemperaturaSensorServidorView;
use App\Interface\Administracion\TemperaturaSensorTemperaturaAvisoView;
use App\Interface\Administracion\TemperaturaAlarmaView;
use App\Interface\Administracion\TemperaturaAvisoView;
use App\Interface\Administracion\TemperaturaRegistroView;

class AdministracionView extends MenuView
{
    protected $title = 'Administración de Sensores de Temperatura';
    protected $menu = [
        '1' => [
            'Label' => 'Temperatura Sensor',
            'Class' => TemperaturaSensorView::class,
        ],
        '2' => [
            'Label' => 'Temperatura Sensor Heladera',
            'Class' => TemperaturaSensorHeladeraView::class,
        ],
        '3' => [
            'Label' => 'Temperatura Sensor Servidor',
            'Class' => TemperaturaSensorServidorView::class,
        ],
        '4' => [
            'Label' => 'Temperatura Sensor Temperatura Aviso',
            'Class' => TemperaturaSensorTemperaturaAvisoView::class,
        ],
        '5' => [
            'Label' => 'Temperatura Alarma',
            'Class' => TemperaturaAlarmaView::class,
        ],
        '6' => [
            'Label' => 'Temperatura Aviso',
            'Class' => TemperaturaAvisoView::class,
        ],
        '7' => [
            'Label' => 'Temperatura Registro',
            'Class' => TemperaturaRegistroView::class,
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