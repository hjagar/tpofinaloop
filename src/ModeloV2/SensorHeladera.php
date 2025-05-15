<?php

namespace App\Modelo;

use App\Modelo\Sensor;

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

    public function getModelo()
    {
        return $this->modelo;
    }
    public function setModelo($v)
    {
        $this->modelo = $v;
    }
}
