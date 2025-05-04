<?php
require __DIR__ . '/../vendor/autoload.php';
use App\Interface\MainView;
use App\Interface\Administracion\TemperaturaAlarma\EliminarTemperaturaAlarmaView;

//use App\Interface\Administracion\TemperaturaAlarma\ListarTemperaturaAlarmaView;
//$t = new ListarTemperaturaAlarmaView();
//$t->run();

use App\Modelo\TemperaturaAlarma;
$temperaturaAlarma = TemperaturaAlarma::find(1);
var_dump($temperaturaAlarma->sensor());



//$mainView = new MainView();
//$mainView->run();

//$eliminarTemperaturaAlarmaView = new EliminarTemperaturaAlarmaView();
//$eliminarTemperaturaAlarmaView->run();