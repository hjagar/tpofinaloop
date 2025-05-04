<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\Administracion\TemperaturaAlarma\AgregarTemperaturaAlarmaView;
use App\Interface\Administracion\TemperaturaAlarma\ModificarTemperaturaAlarmaView;
use App\Interface\Administracion\TemperaturaAlarma\EliminarTemperaturaAlarmaView;
use App\Interface\Administracion\TemperaturaAlarma\ListarTemperaturaAlarmaView;

class TemperaturaAlarmaView extends MenuView
{
    protected $title = 'Administración de Alarmas de Temperatura';
    protected $menu = [
        // '1' => [
        //     'Label' => 'Agregar Alarma',
        //     'Class' => AgregarTemperaturaAlarmaView::class,
        // ],
        // '2' => [
        //     'Label' => 'Modificar Alarma',
        //     'Class' => ModificarTemperaturaAlarmaView::class,
        // ],
        '3' => [
            'Label' => 'Eliminar Alarma',
            'Class' => EliminarTemperaturaAlarmaView::class,
        ],
        '4' => [
            'Label' => 'Listar Alarmas',
            'Class' => ListarTemperaturaAlarmaView::class,
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