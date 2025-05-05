<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaSensor\AgregarView;
use App\Interface\TemperaturaSensor\ModificarView;
use App\Interface\TemperaturaSensor\EliminarView;
use App\Interface\TemperaturaSensor\ListarView;
use App\Interface\Constantes;

class TemperaturaSensorView extends MenuView
{
    protected $title = 'Administración de Sensores de Temperatura';
    protected $label = 'Sensor';
    protected $menu = [
        // '1' => [
        //     'Label' => Constantes::ADD_LABEL, // 'Agregar Sensor'
        //     'Class' => AgregarView::class,
        // ],
        // '2' => [
        //     'Label' => Constantes::MODIFY_LABEL, // 'Modificar Sensor'
        //     'Class' => ModificarView::class,
        // ],
        // '3' => [
        //     'Label' => Constantes::DELETE_LABEL, // 'Eliminar Sensor'
        //     'Class' => EliminarView::class,
        // ],
        // '4' => [
        //     'Label' => Constantes::LIST_LABEL, // 'Listar Sensores'
        //     'Plural' => true,
        //     'Class' => ListarView::class,
        // ],
        Constantes::BACK_OPTION => [
            'Label' => Constantes::BACK_LABEL,
            'ExitMessage' => Constantes::BACK_MESSAGE,
            'Color' => Constantes::RED_COLOR,
        ],
        Constantes::EXIT_OPTION => [
            'Label' => Constantes::EXIT_LABEL,
            'ExitMessage' => Constantes::EXIT_MESSAGE,
            'Color' => Constantes::RED_COLOR,
        ]
    ];
}