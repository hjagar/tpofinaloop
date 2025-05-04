<?php
require __DIR__ . '/../vendor/autoload.php';
use App\Interface\MainView;
use App\Interface\Administracion\TemperaturaAlarma\EliminarTemperaturaAlarmaView;

//use App\Interface\Administracion\TemperaturaAlarma\ListarTemperaturaAlarmaView;
//$t = new ListarTemperaturaAlarmaView();
//$t->run();

use App\Modelo\TemperaturaAlarma;
use App\Modelo\TemperaturaSensorHeladera;
use App\Modelo\TemperaturaSensor;
//$temperaturaSensorHeladera = TemperaturaSensorHeladera::find(1);

//$temperaturaAlarmas = TemperaturaAlarma::where('idtemperaturasensor', 1);
//var_dump($temperaturaAlarmas);
//
//var_dump($temperaturaAlarma->sensor()->tscodigo);
//$temperaturaSensor = TemperaturaSensor::find(1);
//var_dump($temperaturaSensor->registros());

$mainView = new MainView();
$mainView->run();

//$eliminarTemperaturaAlarmaView = new EliminarTemperaturaAlarmaView();
//$eliminarTemperaturaAlarmaView->run();