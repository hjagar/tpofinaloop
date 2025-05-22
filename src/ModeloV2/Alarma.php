<?php

namespace App\ModeloV2;

use App\ModeloV2\Modelo;
use App\ModeloV2\Sensor;
use App\ModeloV2\Aviso;
use App\ModeloV2\Relationship;

class Alarma extends Modelo
{
    private $idtemperaturaalarma;
    private $idtemperaturasensor;
    private $tasuperior;
    private $tainferior;
    private $tafechainicio;
    private $tafechafin;
    private $sensor;

    public function __construct()
    {
        parent::__construct(
            Alarma::class,
            'w_temperaturaalarmas',
            ['idtemperaturaalarma', 'idtemperaturasensor', 'tasuperior', 'tainferior', 'tafechainicio', 'tafechafin'],
            'idtemperaturaalarma',
            relations: [Relationship::HasOne => ['sensor' => Sensor::class], 
            Relationship::HasManyToMany => ['avisos' => [Aviso::class, 'w_temperaturasensortemperaturaaviso']]]
        );
        $this->idtemperaturaalarma = null;
        $this->idtemperaturasensor = null;
        $this->tasuperior = null;
        $this->tainferior = null;
        $this->tafechainicio = null;
        $this->tafechafin = null;
        $this->sensor = null;
    }

    public function getIdtemperaturaalarma()
    {
        return $this->idtemperaturaalarma;
    }
    public function setIdtemperaturaalarma($v)
    {
        $this->idtemperaturaalarma = $v;
    }

    public function getIdtemperaturasensor()
    {
        return $this->idtemperaturasensor;
    }
    public function setIdtemperaturasensor($v)
    {
        $this->idtemperaturasensor = $v;
    }

    public function getTasuperior()
    {
        return $this->tasuperior;
    }
    public function setTasuperior($v)
    {
        $this->tasuperior = $v;
    }

    public function getTainferior()
    {
        return $this->tainferior;
    }
    public function setTainferior($v)
    {
        $this->tainferior = $v;
    }

    public function getTafechainicio()
    {
        return $this->tafechainicio;
    }
    public function setTafechainicio($v)
    {
        $this->tafechainicio = $v;
    }

    public function getTafechafin()
    {
        return $this->tafechafin;
    }
    public function setTafechafin($v)
    {
        $this->tafechafin = $v;
    }

    public function getSensor()
    {
       return $this->sensor;
    }

    public function setSensor($v)
    {
        $this->sensor = $v;
    }
}
