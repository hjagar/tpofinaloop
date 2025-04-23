#!/usr/bin/env php
<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Modelo\TemperaturaAlarma;
use App\Modelo\TemperaturaSensorServidor;
use App\Modelo\TemperaturaSensorTemperaturaAviso;
use App\Modelo\TemperaturaSensor;

//TODO: llamar a las clases de la interface acá.
//print_r(TemperaturaSensorTemperaturaAviso::getPrimaryKey());
//print_r(TemperaturaAlarma::getPrimaryKey());
$temperaturaSensor = TemperaturaSensor::find(1);
//var_dump($temperaturaSensor);
$temperaturaSensorServidor = new TemperaturaSensorServidor();
$temperaturaSensorServidor->idtemperaturasensor = 1;
$temperaturaSensorServidor->tssporcentajeperdida = 1;
$temperaturaSensorServidor->save();

?>