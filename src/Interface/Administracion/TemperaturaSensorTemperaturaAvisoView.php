<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaSensorTemperaturaAviso\AgregarTemperaturaSensorTemperaturaAvisoView;
use App\Interface\TemperaturaSensorTemperaturaAviso\ModificarTemperaturaSensorTemperaturaAvisoView;
use App\Interface\TemperaturaSensorTemperaturaAviso\EliminarTemperaturaSensorTemperaturaAvisoView;
use App\Interface\TemperaturaSensorTemperaturaAviso\ListarTemperaturaSensorTemperaturaAvisoView;
use App\Interface\Constantes;

class TemperaturaSensorTemperaturaAvisoView extends MenuView
{
    protected $title = 'Administración de Avisos y Alarmas de Temperatura';
    protected $label = 'Aviso Alarma';
    protected $menu = [
        // '1' => [
        //     'Label' => Constantes::ADD_LABEL, // 'Agregar Sensor'
        //     'Class' => AgregarTemperaturaSensorTemperaturaAvisoView::class,
        // ],
        // '2' => [
        //     'Label' => Constantes::MODIFY_LABEL, // 'Modificar Sensor'
        //     'Class' => ModificarTemperaturaSensorTemperaturaAvisoView::class,
        // ],
        // '3' => [
        //     'Label' => Constantes::DELETE_LABEL, // 'Eliminar Sensor'
        //     'Class' => EliminarTemperaturaSensorTemperaturaAvisoView::class,
        // ],
        // '4' => [
        //     'Label' => Constantes::LIST_LABEL, // 'Listar Sensores'
        //     'Class' => ListarTemperaturaSensorTemperaturaAvisoView::class,
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