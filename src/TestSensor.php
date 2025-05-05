<?php
require __DIR__ . '/../vendor/autoload.php';
// use App\Interface\MainView;
// $mainView = new MainView();
// $mainView->run();

use App\Interface\Administracion\TemperaturaAlarma\ModificarView;
$modificar = new ModificarView();
$modificar->run();

// $input = new App\Interface\Componentes\Input('Id Sensor', true, 'idsensor');
// $input->setValue('1234567890');
// $r = new App\Control\Request();
// $r->fill([$input]);
// $fields = $r->getFields();
// print_r($fields);
