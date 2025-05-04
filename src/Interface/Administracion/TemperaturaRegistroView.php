<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaRegistro\AgregarTemperaturaRegistroView;
use App\Interface\TemperaturaRegistro\ModificarTemperaturaRegistroView;
use App\Interface\TemperaturaRegistro\EliminarTemperaturaRegistroView;
use App\Interface\TemperaturaRegistro\ListarTemperaturaRegistroView;

class TemperaturaRegistroView extends MenuView
{
    protected $title = 'Administración de Registros de Temperatura';
    protected $menu = [
        '1' => [
            'Label' => 'Agregar Registro',
            'Class' => AgregarTemperaturaRegistroView::class,
        ],
        '2' => [
            'Label' => 'Modificar Registro',
            'Class' => ModificarTemperaturaRegistroView::class,
        ],
        '3' => [
            'Label' => 'Eliminar Registro',
            'Class' => EliminarTemperaturaRegistroView::class,
        ],
        '4' => [
            'Label' => 'Listar Registros',
            'Class' => ListarTemperaturaRegistroView::class,
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