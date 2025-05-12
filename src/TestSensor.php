<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Interface\MainMenuView;
$mainView = new MainMenuView();
$mainView->run();
// use App\Interface\Administracion\Alarma\ListarView;
// $listarView = new ListarView();
// $listarView->run();
?>