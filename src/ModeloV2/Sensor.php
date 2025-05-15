<?php
namespace App\Modelo;

use App\Modelo\Modelo;

class Sensor extends Modelo
{
    private $idtemperaturasensor;
    private $tscodigo;
    private $tsubicacion;
    private $tselementosresguardan;
    private $tsmontoresguardado;

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
            $isa
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
}