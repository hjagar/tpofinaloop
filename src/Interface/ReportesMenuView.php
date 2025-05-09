<?php

namespace App\Interface;

use App\Interface\Componentes\Views\MenuView;
use App\Interface\Administracion\Sensor\ListarView;
use App\Interface\Reportes\RegistroTemperaturaInferiorView;
use App\Interface\Reportes\RegistroTemperaturaMayorView;
use App\Interface\Reportes\RegistroTemperaturaMenorView;
use App\Interface\Reportes\RegistroTemperaturaSuperiorView;
use App\Interface\Componentes\Enums\Constantes;

class ReportesMenuView extends MenuView
{
    public function __construct()
    {
        parent::__construct(
            'Sistema de Monitoreo de Temperatura - Reportes',
            [
                '1' => [
                    'Label' => Constantes::LIST_LABEL,
                    'Class' => ListarView::class,
                ],
                '2' => [
                    'Label' => Constantes::REGISTRO_TEMPERATURA_INFERIOR,
                    'Class' => RegistroTemperaturaInferiorView::class,
                ],
                '3' => [
                    'Label' => Constantes::REGISTRO_TEMPERATURA_SUPERIOR,
                    'Class' => RegistroTemperaturaSuperiorView::class,
                ],
                '4' => [
                    'Label' => Constantes::REGISTRO_TEMPERATURA_MENOR,
                    'Class' => RegistroTemperaturaMenorView::class,
                ],
                '5' => [
                    'Label' => Constantes::REGISTRO_TEMPERATURA_MAYOR,
                    'Class' => RegistroTemperaturaMayorView::class,
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
            ],
            'Sensores'
        );
    }
}
