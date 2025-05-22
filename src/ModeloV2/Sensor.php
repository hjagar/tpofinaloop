<?php
namespace App\ModeloV2;

use App\ModeloV2\ModeloV2;
use App\ModeloV2\Registro;
use App\ModeloV2\Alarma;

class Sensor extends Modelo
{
    private $idtemperaturasensor;
    private $tscodigo;
    private $tsubicacion;
    private $tselementosresguardan;
    private $tsmontoresguardado;
    private $registros;
    private $alertas;
    private $avisos;

    public function __construct($className = null, $tableName = null, $columnNames = null, $autoIncrement = true, $isa = null)
    {  
        $defaultClassName = Sensor::class;
        $defaultTableName = 'w_temperaturasensor';
        $defaultColumnNames = ['idtemperaturasensor', 'tscodigo', 'tsubicacion', 'tselementosresguardan', 'tsmontoresguardado'];
        
        if ($className === null) {
            $className = $defaultClassName;
         }

        if ($tableName === null) {
            $tableName = $defaultTableName;
        }

        if ($columnNames === null) {
            $columnNames = $defaultColumnNames;
        }
        else {
            $columnNames = array_merge($defaultColumnNames, $columnNames);
        }

        parent::__construct(
            $className,
            $tableName,
            $columnNames,
            'idtemperaturasensor',
            $autoIncrement,
            $isa,
            [Relationship::HasMany => ['registros' => Registro::class, 'alarmas' => Alarma::class]]
        );

        $this->idtemperaturasensor = null;
        $this->tscodigo = null;
        $this->tsubicacion = null;
        $this->tselementosresguardan = null;
        $this->tsmontoresguardado = null;
    }

    public function getIdtemperaturasensor()
    {
        return $this->idtemperaturasensor;
    }

    public function setIdtemperaturasensor($idtemperaturasensor)
    {
        $this->idtemperaturasensor = $idtemperaturasensor;
    }

    public function getTscodigo()
    {
        return $this->tscodigo;
    }

    public function setTscodigo($tscodigo)
    {
        $this->tscodigo = $tscodigo;
    }

    public function getTsubicacion()
    {
        return $this->tsubicacion;
    }

    public function setTsubicacion($tsubicacion)
    {
        $this->tsubicacion = $tsubicacion;
    }

    public function getTselementosresguardan()
    {
        return $this->tselementosresguardan;
    }

    public function setTselementosresguardan($tselementosresguardan)
    {
        $this->tselementosresguardan = $tselementosresguardan;
    }

    public function getTsmontoresguardado()
    {
        return $this->tsmontoresguardado;
    }

    public function setTsmontoresguardado($tsmontoresguardado)
    {
        $this->tsmontoresguardado = $tsmontoresguardado;
    }

    public function getRegistros()
    {
        return $this->registros;
    }

    public function setRegistros($registros)
    {
        $this->registros = $registros;
    }

    public function getAlertas()
    {
        return $this->alertas;
    }

    public function setAlertas($alertas)
    {
        $this->alertas = $alertas;
    }
}