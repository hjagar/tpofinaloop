<?php

namespace App\ModeloV2;

use App\ModeloV2\ModeloV2;
use App\ModeloV2\Sensor;

class Registro extends Modelo
{
    private $idtemperaturaregistro;
    private $idtemperaturasensor;
    private $tltemperatura;
    private $tlfecharegistro;
    private $sensor;

    public function __construct()
    {
        parent::__construct(
            Registro::class,
            'w_temperaturaregistro',
            ['idtemperaturaregistro', 'idtemperaturasensor', 'tltemperatura', 'tlfecharegistro'],
            'idtemperaturaregistro',
            relations: [Relationship::HasOne => ['sensor' => Sensor::class]]
        );
    }

    public function getIdtemperaturaregistro()
    {
        return $this->idtemperaturaregistro;
    }
    
    public function setIdtemperaturaregistro($v)
    {
        $this->idtemperaturaregistro = $v;
    }

    public function getIdtemperaturasensor()
    {
        return $this->idtemperaturasensor;
    }
    public function setIdtemperaturasensor($v)
    {
        $this->idtemperaturasensor = $v;
    }

    public function getTltemperatura()
    {
        return $this->tltemperatura;
    }

    public function setTltemperatura($v)
    {
        $this->tltemperatura = $v;
    }

    public function getTlfecharegistro()
    {
        return $this->tlfecharegistro;
    }

    public function setTlfecharegistro($v)
    {
        $this->tlfecharegistro = $v;
    }

    public function getSensor()
    {
        // $sensor = null;
        // $idtemperaturasensor = $this->getIdtemperaturasensor();

        // if ($idtemperaturasensor) {
        //     $sensor = new Sensor();
        //     $sensor = $sensor->find($idtemperaturasensor);
        //     $this->setSensor($sensor);
        // }

        return $this->sensor;
    }
    
    public function setSensor($v)
    {
        $this->sensor = $v;
    }
}
