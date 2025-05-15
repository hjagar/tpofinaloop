<?php

namespace App\Modelo;

use App\Modelo\Sensor;

class SensorServidor extends Sensor
{
    private $idtemperaturasensor;
    private $tssporcentajeperdida;

    public function __construct()
    {
        parent::__construct(
            SensorServidor::class,
            'w_temperaturasensorservidor',
            ['idtemperaturasensor', 'tssporcentajeperdida'],
            false,
            Sensor::class
        );

        $this->idtemperaturasensor = null;
        $this->tssporcentajeperdida = null;
    }

    public function getIdtemperaturasensor()
    {
        return $this->idtemperaturasensor;
    }
    public function setIdtemperaturasensor($v)
    {
        $this->idtemperaturasensor = $v;
    }

    public function getTssporcentajeperdida()
    {
        return $this->tssporcentajeperdida;
    }
    public function setTssporcentajeperdida($v)
    {
        $this->tssporcentajeperdida = $v;
    }
}
