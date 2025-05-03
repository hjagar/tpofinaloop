<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaAviso\AgregarTemperaturaAvisoView;
use App\Interface\TemperaturaAviso\ModificarTemperaturaAvisoView;
use App\Interface\TemperaturaAviso\EliminarTemperaturaAvisoView;
use App\Interface\TemperaturaAviso\ListarTemperaturaAvisoView;

class TemperaturaAvisoView extends MenuView
{
    protected $title = 'Administración de Avisos de Temperatura';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Aviso',
            'Class' => AgregarTemperaturaAvisoView::class,
        ],
        '2' => [
            'Label' => 'Modificar Aviso',
            'Class' => ModificarTemperaturaAvisoView::class,,
        ],
        '3' => [
            'Label' => 'Eliminar Aviso',
            'Class' => EliminarTemperaturaAvisoView::class,,
        ],
        '4' => [
            'Label' => 'Listar Avisos',
            'Class' => ListarTemperaturaAvisoView::class,
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