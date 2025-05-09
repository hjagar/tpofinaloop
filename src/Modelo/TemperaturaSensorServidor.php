<?php

namespace App\Modelo;

use App\Modelo\Model;
use App\Modelo\TemperaturaSensor;


class TemperaturaSensorServidor extends TemperaturaSensor
{
    protected static string $table = 'w_temperaturasensorservidor';
    protected static string | array $primaryKey = 'idtemperaturasensor';
    protected static bool $autoIncrement = false;

    public function sensor()
    {
        $sensor = null;
        $idTemperaturaSensor = $this->idtemperaturasensor ?? null;

        if (isset($idTemperaturaSensor)) {
            $sensor = TemperaturaSensor::find($idTemperaturaSensor);
        }

        return $sensor;
    }

    public function perdidaPorFallo()
    {
        return $this->sensor()->tsmontoresguardado * $this->tssporcentajeperdida / 100;
    }
}
