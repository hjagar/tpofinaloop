<?php
namespace App\Interface;

abstract class BaseView
{
    protected $title;

    public function run() 
    {
        $this->render();
    }

    protected abstract function render();

    protected function getTitle()
    {
        return $this->title;
    }

    protected function showTitle()
    {
        $title = $this->getTitle();
        if (empty($title)) {
            $title = "Sistema de Gestión de Alarmas";
        }
        echo "\e[1;34m{$title}\e[0m\n";
    }

    protected function showError($message)
    {
        echo "\e[1;31;43m{$message}\e[0m\n";
    }
}