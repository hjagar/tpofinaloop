<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaSensorHeladera\AgregarSensorHeladeraView;
use App\Interface\TemperaturaSensorHeladera\ModificarSensorHeladeraView;
use App\Interface\TemperaturaSensorHeladera\EliminarSensorHeladeraView;
use App\Interface\TemperaturaSensorHeladera\ListarSensorHeladeraView;
use App\Interface\Constantes;

class TemperaturaSensorHeladeraView extends MenuView
{
    protected $title = 'Temperatura Sensor Heladera';
    protected $label = 'Sensor Heladera';
    protected $menu = [
        // '1' => [
        //     'Label' => Constantes::ADD_LABEL, // 'Agregar Sensor'
        //     'Class' => AgregarSensorHeladeraView::class,
        // ],
        // '2' => [
        //     'Label' => Constantes::MODIFY_LABEL, // 'Modificar Sensor'
        //     'Class' => ModificarSensorHeladeraView::class,
        // ],
        // '3' => [
        //     'Label' => Constantes::DELETE_LABEL, // 'Eliminar Sensor'
        //     'Class' => EliminarSensorHeladeraView::class,
        // ],
        // '4' => [
        //     'Label' => Constantes::LIST_LABEL, // 'Listar Sensores'
        //     'Class' => ListarSensorHeladeraView::class,
        // ],
        Constantes::BACK_OPTION => [
            'Label' => Constantes::BACK_LABEL,
            'ExitMessage' => "Volviendo al menú anterior...",
            'Color' => Constantes::RED_COLOR,
        ],
        Constantes::EXIT_OPTION => [
            'Label' => Constantes::EXIT_LABEL,
            'ExitMessage' => Constantes::EXIT_MESSAGE,
            'Color' => Constantes::RED_COLOR,
        ]

    ];
}