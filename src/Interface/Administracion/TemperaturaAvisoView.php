<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\TemperaturaAviso\AgregarAvisoView;
use App\Interface\TemperaturaAviso\ModificarAvisoView;
use App\Interface\TemperaturaAviso\EliminarAvisoView;
use App\Interface\TemperaturaAviso\ListarAvisoView;
use App\Interface\Constantes;

class TemperaturaAvisoView extends MenuView
{
    protected $title = 'Administración de Avisos de Temperatura';
    protected $label = 'Aviso';
    protected $menu = [
        // '1' => [
        //     'Label' => Constantes::ADD_LABEL, // 'Agregar Aviso'
        //     'Class' => AgregarView::class,
        // ],
        // '2' => [
        //     'Label' => Constantes::MODIFY_LABEL, // 'Modificar Aviso'
        //     'Class' => ModificarView::class,,
        // ],
        // '3' => [
        //     'Label' => Constantes::DELETE_LABEL, // 'Eliminar Aviso'
        //     'Class' => EliminarView::class,,
        // ],
        // '4' => [
        //     'Label' => Constantes::LIST_LABEL, // 'Listar Avisos'\
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