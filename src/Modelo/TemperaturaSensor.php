<?php
namespace App\Modelo;
use App\Modelo\Model;


class TemperaturaSensor extends Model {
    protected static string $table = 'w_temperaturasensor';

    public function registro()
    {
        $registro = null;

        if(isset($this->idtemperaturasensor)){
            $registro = TemperaturaRegistro::find($this->idtemperaturasensor);
        }

        return $registro;
    }

    public function servidor()
    {
        $servidor = null;

        if(isset($this->idtemperaturasensor)){
            $servidor = TemperaturaSensorServidor::find($this->idtemperaturasensor);
        }

        return $servidor;
    }

    public function heladera()
    {
        $servidor = null;

        if(isset($this->idtemperaturasensor)){
            $servidor = TemperaturaSensorHeladera::find($this->idtemperaturasensor);
        }

        return $servidor;
    }
}
?>