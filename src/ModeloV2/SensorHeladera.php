<?php

namespace App\ModeloV2;

use App\ModeloV2\Sensor;

class SensorHeladera extends Sensor
{
    private $idtemperaturasensor;
    private $marca;
    private $modelo;

    public function __construct()
    {
        parent::__construct(
            SensorHeladera::class,
            'w_temperaturasensorheladera',
            ['idtemperaturasensor', 'marca', 'modelo'],
            false,
            Sensor::class
        );

        $this->idtemperaturasensor = null;
        $this->marca = null;
        $this->modelo = null;
    }

    public function getIdtemperaturasensor()
    {
        return $this->idtemperaturasensor;
    }
    public function setIdtemperaturasensor($v)
    {
        $this->idtemperaturasensor = $v;
    }

    public function getMarca()
    {
        return $this->marca;
    }
    public function setMarca($v)
    {
        $this->marca = $v;
    }

    public function getModeloV2()
    {
        return $this->modelo;
    }
    public function setModeloV2($v)
    {
        $this->modelo = $v;
    }
}
