<?php
namespace App\Modelo;
use App\Modelo\Model;


class TemperaturaSensorTemperaturaAviso extends Model {
    protected static string $table = 'w_temperaturasensortemperaturaaviso';
    protected static string | array $primaryKey = ['idtemperaturaaviso', 'idtemperaturaalarma'];
}
?>