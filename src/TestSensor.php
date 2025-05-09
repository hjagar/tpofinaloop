<?php
require __DIR__ . '/../vendor/autoload.php';
// use App\Interface\MainView;
// $mainView = new MainView();
// $mainView->run();

// use App\Interface\Administracion\Alarma\ModificarView;
// $modificar = new ModificarView();
// $modificar->run();

// $input = new App\Interface\Componentes\Input('Id Sensor', true, 'idsensor');
// $input->setValue('1234567890');
// $r = new App\Control\Request();
// $r->fill([$input]);
// $fields = $r->getFields();
// print_r($fields);

// use App\Interface\Componentes\Column;
// $c = new Column('Id Alarma', 'idtemperaturaalarma');
// echo $c->getLabel() ."\n";
// echo $c->field ."\n";
// $c->setWidth(10);
// echo $c->width ."\n";

// $c->width = 12;
// echo $c->width ."\n";

// use App\Interface\Administracion\Alarma\ListarView;
// $listar = new ListarView();
// $listar->run();

// use App\Interface\Administracion\Sensor\AgregarView;
// $agregar = new AgregarView();
// $agregar->run();

// use App\Modelo\RawQuery;
// $data = RawQuery::query("SELECT * FROM w_temperaturasensor as s inner join w_temperaturaalarmas as a on s.idtemperaturasensor = a.idtemperaturasensor");
// print_r($data);


// use App\Control\ReportControl;
// $report = new ReportControl();
// $response = $report->registroTemperaturaInferior(1);
// var_dump($response);

// $response = $report->registroTemperaturaSuperior(1);
// var_dump($response);

use App\Interface\Reportes\RegistroTemperaturaInferiorView;
$view = new RegistroTemperaturaInferiorView();
$view->run();

use App\Interface\Reportes\RegistroTemperaturaSuperiorView;
$view = new RegistroTemperaturaSuperiorView();
$view->run();