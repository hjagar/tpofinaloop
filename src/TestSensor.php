#!/usr/bin/env php
<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Modelo\TemperaturaAlarma;
use App\Modelo\TemperaturaAviso;
use App\Modelo\TemperaturaRegistro;
use App\Modelo\TemperaturaSensor;
use App\Modelo\TemperaturaSensorHeladera;
use App\Modelo\TemperaturaSensorServidor;
use App\Modelo\TemperaturaSensorTemperaturaAviso;
use App\Control\Request;
use App\Interface\Main;
use App\Control\Control;
use App\Control\TemperaturaSensorControl;
use App\Control\TemperaturaSensorHeladeraControl;
use App\Control\TemperaturaSensorServidorControl;
use App\Control\TemperaturaSensorTemperaturaAvisoControl;
use App\Control\TemperaturaAlarmaControl;
use App\Control\TemperaturaAvisoControl;
use App\Control\TemperaturaRegistroControl;


$a = new TemperaturaSensorControl();
$b = new TemperaturaSensorHeladeraControl();
$c = new TemperaturaSensorServidorControl();
$d = new TemperaturaSensorTemperaturaAvisoControl();
$e = new TemperaturaAlarmaControl();
$f = new TemperaturaAvisoControl();
$g = new TemperaturaRegistroControl();
$h = new Control();
$i = new Request();
$j = new Main();
$k = new TemperaturaAlarma();
$l = new TemperaturaAviso();
$m = new TemperaturaRegistro();
$n = new TemperaturaSensor();
$o = new TemperaturaSensorHeladera();
$p = new TemperaturaSensorServidor();
$q = new TemperaturaSensorTemperaturaAviso();
// $f = new TemperaturaAvisoController();
// $g = new TemperaturaSensorController();

//TODO: llamar a las clases de la interface acá.
//print_r(TemperaturaSensorTemperaturaAviso::getPrimaryKey());
//print_r(TemperaturaAlarma::getPrimaryKey());
//$temperaturaSensor = TemperaturaSensor::find(1);
// $temperaturaSensorTemperaturaAviso = TemperaturaSensorTemperaturaAviso::find([1, 1]);
// $temperaturaSensorTemperaturaAviso->idtemperaturaalarma = 2;
// $temperaturaSensorTemperaturaAviso->save();
// //var_dump($temperaturaSensor);
// $temperaturaSensorServidor = new TemperaturaSensorServidor();
// $temperaturaSensorServidor->idtemperaturasensor = 1;
// $temperaturaSensorServidor->tssporcentajeperdida = 1;
// $temperaturaSensorServidor->save();\
//$temperaturaSensor = new TemperaturaSensor();
// $temperaturaSensor->tscodigo = "codigo 4";
// $temperaturaSensor->tsubicacion = "ubicacion 4";
// $temperaturaSensor->tselementosresguardan = 1;
// $temperaturaSensor->tsmontoresguardado = 1.0;
// $temperaturaSensor->save();

// echo $temperaturaSensor->idtemperaturasensor . "\n";

//$temperaturaSensorController = new TemperaturaSensorController();
