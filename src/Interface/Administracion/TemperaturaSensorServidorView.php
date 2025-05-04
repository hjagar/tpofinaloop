<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaSensorServidor\AgregarTemperaturaSensorServidorView;
use App\Interface\TemperaturaSensorServidor\ModificarTemperaturaSensorServidorView;
use App\Interface\TemperaturaSensorServidor\EliminarTemperaturaSensorServidorView;
use App\Interface\TemperaturaSensorServidor\ListarTemperaturaSensorServidorView;
use App\Interface\Constantes;

class TemperaturaSensorServidorView extends MenuView
{
    protected $title = 'Administración de Sensores de Temperatura Servidor';
    protected $label = 'Sensor Servidor';
    protected $menu = [
        // '1' => [
        //     'Label' => Constantes::ADD_LABEL, // 'Agregar Sensor'
        //     'Class' => AgregarTemperaturaSensorServidorView::class,
        // ],
        // '2' => [
        //     'Label' => Constantes::MODIFY_LABEL, // 'Modificar Sensor'
        //     'Class' => ModificarTemperaturaSensorServidorView::class,
        // ],
        // '3' => [
        //     'Label' => Constantes::DELETE_LABEL, // 'Eliminar Sensor'
        //     'Class' => EliminarTemperaturaSensorServidorView::class,
        // ],
        // '4' => [
        //     'Label' => Constantes::LIST_LABEL, // 'Listar Sensores'
        //     'Class' => ListarTemperaturaSensorServidorView::class,
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