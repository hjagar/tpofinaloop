<?php
namespace App\Modelo;
use App\Modelo\Model;
use App\Modelo\TemperaturaAviso;
use App\Modelo\TemperaturaAlarma;

class TemperaturaSensorTemperaturaAviso extends Model {
    protected static string $table = 'w_temperaturasensortemperaturaaviso';
    protected static string | array $primaryKey = ['idtemperaturaaviso', 'idtemperaturaalarma'];
    protected static bool $autoIncrement = false;

    public function aviso() {
        $aviso = null;
        $idTemperaturaAviso = $this->idtemperaturaaviso ?? null;

        if (isset($idTemperaturaAviso)) {
            $aviso = TemperaturaAviso::find($idTemperaturaAviso);
        }

        return $aviso;
    }

    public function alarma() {
        $alarma = null;
        $idTemperaturaAlarma = $this->idtemperaturaalarma ?? null;

        if (isset($idTemperaturaAlarma)) {
            $alarma = TemperaturaAlarma::find($idTemperaturaAlarma);
        }

        return $alarma;
    }
}
?>