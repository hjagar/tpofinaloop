<?php
namespace App\Interface\Administracion\SensorTemperaturaAviso;
use App\Interface\ListView;
use App\Control\AvisoAlarmaControl;

class ListarView extends ListView
{
    protected $title = 'Listado de Alarmas de Temperatura';

    protected $columns = [
        'Id Alarma',
        'Sensor',
        'Temperatura Superior',
        'Temperatura Inferior',
        'Fecha y Hora de Inicio',
        'Fecha y Hora de Fin'
    ];

    public function __construct()
    {
        parent::__construct(AvisoAlarmaControl::class);
    }

    public function render()
    {
        $alarmas = $this->getController()->index();
        $this->showTitle();
        $this->showData($alarmas);
    }

    protected function prepareDataRow($row): array
    {
        $columns = $this->getColumns();
        $rowToShow = [
            $this->prepareDataColumn($row->idtemperaturaalarma, $columns[0]),
            $this->prepareDataColumn($row->idtemperaturasensor, $columns[1]),
            $this->prepareDataColumn($row->tasuperior, $columns[2]),
            $this->prepareDataColumn($row->tainferior, $columns[3]),
            $this->prepareDataColumn($row->tafechainicio, $columns[4]),
            $this->prepareDataColumn($row->tafechafin, $columns[5])
        ];

        return $rowToShow;
    }
}