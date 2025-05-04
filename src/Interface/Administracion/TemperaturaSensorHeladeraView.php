<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaSensorHeladera\AgregarSensorHeladeraView;
use App\Interface\TemperaturaSensorHeladera\ModificarSensorHeladeraView;
use App\Interface\TemperaturaSensorHeladera\EliminarSensorHeladeraView;
use App\Interface\TemperaturaSensorHeladera\ListarSensorHeladeraView;

class TemperaturaSensorHeladeraView extends MenuView
{
    protected $title = 'Temperatura Sensor Heladera';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Sensor',
            'Class' => AgregarSensorHeladeraView::class,
        ],
        '2' => [
            'Label' => 'Modificar Sensor',
            'Class' => ModificarSensorHeladeraView::class,
        ],
        '3' => [
            'Label' => 'Eliminar Sensor',
            'Class' => EliminarSensorHeladeraView::class,
        ],
        '4' => [
            'Label' => 'Listar Sensores',
            'Class' => ListarSensorHeladeraView::class,
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