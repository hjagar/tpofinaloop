<?php
namespace App\Modelo;
use App\Modelo\Model;
use App\Modelo\TemperaturaSensor;

class TemperaturaAlarma extends Model {
    protected static string $table = 'w_temperaturaalarmas';

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