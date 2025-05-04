<?php
namespace App\Modelo;
use App\Modelo\Model;
use App\Modelo\TemperaturaSensor;

class TemperaturaAlarma extends Model {
    protected static string $table = 'w_temperaturaalarmas';

    public function sensor()
    {
        $sensor = null;
        $idTemperaturaSensor = $this->idtemperaturasensor ?? null;
        
        if(isset($idTemperaturaSensor)) {
            $sensor = TemperaturaSensor::find($idTemperaturaSensor);
        }

        return $sensor;
    }
}
?>