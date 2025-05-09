<?php
namespace App\Modelo;
use App\Modelo\Model;
use App\Modelo\TemperaturaRegistro;
use App\Modelo\TemperaturaSensorServidor;
use App\Modelo\TemperaturaSensorHeladera;

class TemperaturaSensor extends Model {
    protected static string $table = 'w_temperaturasensor';

    public function alarmas()
    {
        $alarmas = null;
        $idTemperaturaSensor = $this->idtemperaturasensor ?? null;

        if(isset($idTemperaturaSensor)){
            $alarmas = TemperaturaAlarma::where('idtemperaturasensor', $idTemperaturaSensor);
        }

        return $alarmas;
    }

    public function registros()
    {
        $registros = null;
        $idTemperaturaSensor = $this->idtemperaturasensor ?? null;

        if(isset($idTemperaturaSensor)){
            $registros = TemperaturaRegistro::where('idtemperaturasensor', $idTemperaturaSensor);
        }

        return $registros;
    }

    public function servidor()
    {
        $servidor = null;
        $idTemperaturaSensor = $this->idtemperaturasensor ?? null;

        if(isset($idTemperaturaSensor)){
            $servidor = TemperaturaSensorServidor::find($idTemperaturaSensor);
        }

        return $servidor;
    }

    public function heladera()
    {
        $heladera = null;
        $idTemperaturaSensor = $this->idtemperaturasensor ?? null;

        if(isset($idTemperaturaSensor)){
            $heladera = TemperaturaSensorHeladera::find($idTemperaturaSensor);
        }

        return $heladera;
    }

    public function perdidaPorFallo() 
    {
        return $this->tselementosresguardan * $this->tsmontoresguardado;
    }
}
?>