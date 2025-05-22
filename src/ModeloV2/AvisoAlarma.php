<?php
namespace App\ModeloV2;

class AvisoAlarma extends Modelo
{
    private $idtemperaturaaviso;
    private $idtemperaturaalarma;

    public function __construct()
    {
        parent::__construct(
            AvisoAlarma::class,
            'w_temperaturasensortemperaturaaviso',
            ['idtemperaturaaviso', 'idtemperaturaalarma'],
            ['idtemperaturaaviso', 'idtemperaturaalarma'],
            false
        );
    }

    public function getIdtemperaturaaviso() { return $this->idtemperaturaaviso; }
    public function setIdtemperaturaaviso($v) { $this->idtemperaturaaviso = $v; }

    public function getIdtemperaturaalarma() { return $this->idtemperaturaalarma; }
    public function setIdtemperaturaalarma($v) { $this->idtemperaturaalarma = $v; }
}