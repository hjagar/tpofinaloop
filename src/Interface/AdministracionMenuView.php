<?php

namespace App\Interface;

use App\Interface\Componentes\Views\MenuView;
use App\Interface\Administracion\SensorMenuView;
use App\Interface\Administracion\SensorHeladeraMenuView;
use App\Interface\Administracion\SensorServidorMenuView;
use App\Interface\Administracion\AvisoAlarmaMenuView;
use App\Interface\Administracion\AlarmaMenuView;
use App\Interface\Administracion\AvisoMenuView;
use App\Interface\Administracion\RegistroMenuView;
use App\Interface\Componentes\Enums\Constantes;

class AdministracionMenuView extends MenuView
{
    public function __construct()
    {
        parent::__construct(Constantes::ADMINISTRACION_LABEL, [
            '1' => [
                'Label' => 'Sensor',
                'Class' => SensorMenuView::class,
            ],
            '2' => [
                'Label' => 'Sensor Heladera',
                'Class' => SensorHeladeraMenuView::class,
            ],
            '3' => [
                'Label' => 'Sensor Servidor',
                'Class' => SensorServidorMenuView::class,
            ],
            '4' => [
                'Label' => 'Sensor Aviso',
                'Class' => AvisoAlarmaMenuView::class,
            ],
            '5' => [
                'Label' => 'Alarma',
                'Class' => AlarmaMenuView::class,
            ],
            '6' => [
                'Label' => 'Aviso',
                'Class' => AvisoMenuView::class,
            ],
            '7' => [
                'Label' => 'Registro',
                'Class' => RegistroMenuView::class,
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
        ]);
    }
}
