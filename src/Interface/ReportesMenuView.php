<?php

namespace App\Interface;

use App\Interface\Componentes\Views\MenuView;
use App\Interface\Componentes\Enums\Constantes;

class ReportesMenuView extends MenuView
{
    public function __construct()
    {
        parent::__construct('Sistema de Monitoreo de Temperatura - Reportes', [
            '1' => [
                'Label' => Constantes::LIST_LABEL, // 'Listar Alarmas'
                'Class' => 'App\Interface\Procesos\ListarAlarmasView',
            ],
            '2' => [
                'Label' => Constantes::ADD_LABEL, // 'Agregar Alarma'
                'Class' => 'App\Interface\Procesos\AgregarAlarmaView',
            ],
            Constantes::BACK_OPTION => [
                'Label' => Constantes::EXIT_LABEL,
                'ExitMessage' => Constantes::EXIT_MESSAGE,
                'Color' => Constantes::RED_COLOR,
            ],
        ]);
    }
}
