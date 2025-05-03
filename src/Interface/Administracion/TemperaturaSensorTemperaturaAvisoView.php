<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaSensorTemperaturaAviso\AgregarTemperaturaSensorTemperaturaAvisoView;
use App\Interface\TemperaturaSensorTemperaturaAviso\ModificarTemperaturaSensorTemperaturaAvisoView;
use App\Interface\TemperaturaSensorTemperaturaAviso\EliminarTemperaturaSensorTemperaturaAvisoView;
use App\Interface\TemperaturaSensorTemperaturaAviso\ListarTemperaturaSensorTemperaturaAvisoView;

class TemperaturaSensorTemperaturaAvisoView extends MenuView
{
    protected $title = 'Administración de Sensores de Temperatura Aviso';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Sensor',
            'Class' => AgregarTemperaturaSensorTemperaturaAvisoView::class,
        ],
        '2' => [
            'Label' => 'Modificar Sensor',
            'Class' => ModificarTemperaturaSensorTemperaturaAvisoView::class,
        ],
        '3' => [
            'Label' => 'Eliminar Sensor',
            'Class' => EliminarTemperaturaSensorTemperaturaAvisoView::class,
        ],
        '4' => [
            'Label' => 'Listar Sensores',
            'Class' => ListarTemperaturaSensorTemperaturaAvisoView::class,
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