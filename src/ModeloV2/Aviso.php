<?php

namespace App\ModeloV2;

use App\ModeloV2\Modelo;
use App\ModeloV2\Relationship;
use App\ModeloV2\Alarma;

class Aviso extends Modelo
{
    private $idtemperaturaaviso;
    private $taactivo;
    private $tanombre;
    private $taemail;
    private $sensores;

    public function __construct()
    {
        parent::__construct(
            Aviso::class,
            'w_temperaturaaviso',
            ['idtemperaturaaviso', 'taactivo', 'tanombre', 'taemail'],
            'idtemperaturaaviso',
            relations: [Relationship::HasManyToMany => ['sensores' => [Sensor::class, 'w_temperaturasensortemperaturaaviso']]]
        );

        $this->idtemperaturaaviso = null;
        $this->taactivo = null;
        $this->tanombre = null;
        $this->taemail = null;
    }

    public function getIdtemperaturaaviso()
    {
        return $this->idtemperaturaaviso;
    }

    public function setIdtemperaturaaviso($idtemperaturaaviso)
    {
        $this->idtemperaturaaviso = $idtemperaturaaviso;
    }

    public function getTaactivo()
    {
        return $this->taactivo;
    }

    public function setTaactivo($taactivo)
    {
        $this->taactivo = $taactivo;
    }

    public function getTanombre()
    {
        return $this->tanombre;
    }

    public function setTanombre($tanombre)
    {
        $this->tanombre = $tanombre;
    }

    public function getTaemail()
    {
        return $this->taemail;
    }

    public function setTaemail($taemail)
    {
        $this->taemail = $taemail;
    }

    public function getSensores()
    {
        return $this->sensores;
    }

    public function setSensores($sensores)
    {
        $this->sensores = $sensores;
    }
}
