<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;

class TemperaturaSensorServidorView extends MenuView
{
    protected $title = 'Administración de Sensores de Temperatura Servidor';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorServidor\AgregarTemperaturaSensorServidorView',
        ],
        '2' => [
            'Label' => 'Modificar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorServidor\ModificarTemperaturaSensorServidorView',
        ],
        '3' => [
            'Label' => 'Eliminar Sensor',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorServidor\EliminarTemperaturaSensorServidorView',
        ],
        '4' => [
            'Label' => 'Listar Sensores',
            'Class' => 'App\Interface\Administracion\TemperaturaSensorServidor\ListarTemperaturaSensorServidorView',
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