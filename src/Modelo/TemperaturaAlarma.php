<?php
namespace App\Modelo;
use App\Modelo\Model;
use App\Modelo\TemperaturaSensor;

class TemperaturaAlarma extends Model {
    protected static string $table = 'w_temperaturaalarmas';

    public function sensor()
    {
        $sensor = null;
        $idtemperaturasensor = $this->idtemperaturasensor;
        
        if(isset($idtemperaturasensor)) {
            $sensor = TemperaturaSensor::find($idtemperaturasensor);
        }

        return $sensor;
    }
}
?>