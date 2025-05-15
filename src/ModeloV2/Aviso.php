<?php

namespace App\Modelo;

use App\Modelo\Modelo;
use App\Modelo\Relationship;
use App\Modelo\Alarma;

class Aviso extends Modelo
{
    private $idtemperaturaaviso;
    private $taactivo;
    private $tanombre;
    private $taemail;
    private $alarmas; //TODO: ver muchos a muchos

    public function __construct()
    {
        parent::__construct(
            Aviso::class,
            'w_temperaturaaviso',
            ['idtemperaturaaviso', 'taactivo', 'tanombre', 'taemail'],
            'idtemperaturaaviso',
            [
                Relationship::HasMany => [
                    'alarmas' => Alarma::class
                ]
            ]
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

    public function getAlarmas()
    {
        return $this->alarmas;
    }

    public function setAlarmas($alarmas)
    {
        $this->alarmas = $alarmas;
    }
}
