<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaRegistro\AgregarTemperaturaRegistroView;
use App\Interface\TemperaturaRegistro\ModificarTemperaturaRegistroView;
use App\Interface\TemperaturaRegistro\EliminarTemperaturaRegistroView;
use App\Interface\TemperaturaRegistro\ListarTemperaturaRegistroView;
use App\Interface\Constantes;

class TemperaturaRegistroView extends MenuView
{
    protected $title = 'Administración de Registros de Temperatura';
    protected $label = 'Registro';
    protected $menu = [
        // '1' => [
        //     'Label' => Constantes::ADD_LABEL, // 'Agregar Registro'
        //     'Class' => AgregarTemperaturaRegistroView::class,
        // ],
        // '2' => [
        //     'Label' => Constantes::MODIFY_LABEL, // 'Modificar Registro'
        //     'Class' => ModificarTemperaturaRegistroView::class,
        // ],
        // '3' => [
        //     'Label' => Constantes::DELETE_LABEL, // 'Eliminar Registro'
        //     'Class' => EliminarTemperaturaRegistroView::class,
        // ],
        // '4' => [
        //     'Label' => Constantes::LIST_LABEL, // 'Listar Registros'
        //     'Class' => ListarTemperaturaRegistroView::class,
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