<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaSensor\AgregarTemperaturaSensorView;
use App\Interface\TemperaturaSensor\ModificarTemperaturaSensorView;
use App\Interface\TemperaturaSensor\EliminarTemperaturaSensorView;
use App\Interface\TemperaturaSensor\ListarTemperaturaSensorView;

class TemperaturaSensorView extends MenuView
{
    protected $title = 'Administración de Sensores de Temperatura';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Sensor',
            'Class' => AgregarTemperaturaSensorView::class,
        ],
        '2' => [
            'Label' => 'Modificar Sensor',
            'Class' => ModificarTemperaturaSensorView::class,
        ],
        '3' => [
            'Label' => 'Eliminar Sensor',
            'Class' => EliminarTemperaturaSensorView::class,
        ],
        '4' => [
            'Label' => 'Listar Sensores',
            'Class' => ListarTemperaturaSensorView::class,
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