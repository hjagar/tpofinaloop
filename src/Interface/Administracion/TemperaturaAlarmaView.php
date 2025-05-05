<?php
namespace App\Interface\Administracion;
use App\Interface\MenuView;
use App\Interface\Administracion\TemperaturaAlarma\AgregarView;
use App\Interface\Administracion\TemperaturaAlarma\ModificarView;
use App\Interface\Administracion\TemperaturaAlarma\EliminarView;
use App\Interface\Administracion\TemperaturaAlarma\ListarView;
use App\Interface\Constantes;

class TemperaturaAlarmaView extends MenuView
{
    protected $title = 'Administración de Alarmas de Temperatura';
    protected $label = 'Alarma';
    protected $menu = [
        '1' => [
            'Label' => Constantes::ADD_LABEL, ///  'Agregar Alarma',
            'Class' => AgregarView::class,
        ],
        // '2' => [
        //     'Label' => Constantes::MODIFY_LABEL, /// 'Modificar Alarma',
        //     'Class' => ModificarView::class,
        // ],
        '3' => [
            'Label' => Constantes::DELETE_LABEL, /// 'Eliminar Alarma',
            'Class' => EliminarView::class,
        ],
        '4' => [
            'Label' => Constantes::LIST_LABEL, /// 'Listar Alarmas',
            'Plural' => true,
            'Class' => ListarView::class,
        ],
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