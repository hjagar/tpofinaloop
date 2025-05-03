<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaSensorServidor\AgregarTemperaturaSensorServidorView;
use App\Interface\TemperaturaSensorServidor\ModificarTemperaturaSensorServidorView;
use App\Interface\TemperaturaSensorServidor\EliminarTemperaturaSensorServidorView;
use App\Interface\TemperaturaSensorServidor\ListarTemperaturaSensorServidorView;

class TemperaturaSensorServidorView extends MenuView
{
    protected $title = 'Administración de Sensores de Temperatura Servidor';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Sensor',
            'Class' => AgregarTemperaturaSensorServidorView::class,
        ],
        '2' => [
            'Label' => 'Modificar Sensor',
            'Class' => ModificarTemperaturaSensorServidorView::class,
        ],
        '3' => [
            'Label' => 'Eliminar Sensor',
            'Class' => EliminarTemperaturaSensorServidorView::class,
        ],
        '4' => [
            'Label' => 'Listar Sensores',
            'Class' => ListarTemperaturaSensorServidorView::class,
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