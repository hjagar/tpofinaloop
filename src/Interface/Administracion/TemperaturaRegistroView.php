<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;

class TemperaturaRegistroView extends MenuView
{
    protected $title = 'Administración de Registros de Temperatura';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Registro',
            'Class' => 'App\Interface\Administracion\TemperaturaRegistro\AgregarTemperaturaRegistroView',
        ],
        '2' => [
            'Label' => 'Modificar Registro',
            'Class' => 'App\Interface\Administracion\TemperaturaRegistro\ModificarTemperaturaRegistroView',
        ],
        '3' => [
            'Label' => 'Eliminar Registro',
            'Class' => 'App\Interface\Administracion\TemperaturaRegistro\EliminarTemperaturaRegistroView',
        ],
        '4' => [
            'Label' => 'Listar Registros',
            'Class' => 'App\Interface\Administracion\TemperaturaRegistro\ListarTemperaturaRegistroView',
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