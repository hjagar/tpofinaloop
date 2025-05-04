<?php
namespace App\Modelo;
use App\Modelo\Model;


class TemperaturaSensorHeladera extends Model {
    protected static string $table = 'w_temperaturasensorheladera';
    protected static string | array $primaryKey = 'idtemperaturasensor';
    protected static bool $autoIncrement = false;

    public function sensor() {
        $sensor = null;
        
        if(isset($this->idtemperaturasensor)) {
            $sensor = TemperaturaSensor::find($this->idtemperaturasensor);
        }

        return $sensor;
    }
}
?>