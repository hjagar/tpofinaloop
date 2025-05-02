<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;

class TemperaturaAvisoView extends MenuView
{
    protected $title = 'Administración de Avisos de Temperatura';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Aviso',
            'Class' => 'App\Interface\Administracion\TemperaturaAviso\AgregarTemperaturaAvisoView',
        ],
        '2' => [
            'Label' => 'Modificar Aviso',
            'Class' => 'App\Interface\Administracion\TemperaturaAviso\ModificarTemperaturaAvisoView',
        ],
        '3' => [
            'Label' => 'Eliminar Aviso',
            'Class' => 'App\Interface\Administracion\TemperaturaAviso\EliminarTemperaturaAvisoView',
        ],
        '4' => [
            'Label' => 'Listar Avisos',
            'Class' => 'App\Interface\Administracion\TemperaturaAviso\ListarTemperaturaAvisoView',
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