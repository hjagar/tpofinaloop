<?php
namespace App\Modelo;
use App\Modelo\Model;


class TemperaturaRegistro extends Model {
    protected static string $table = 'w_temperaturaregistro';

    public function sensor()
    {
        $sensor = null;

        if(isset($this->idtemperaturasensor)){
            $sensor = TemperaturaSensor::find($this->idtemperaturasensor);
        }

        return $sensor;
    }
}
?>