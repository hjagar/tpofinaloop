<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Interface\MainMenuView;
$mainView = new MainMenuView();
$mainView->run();
?>