<?php
namespace App\Interface;

abstract class BaseView
{
    protected $title;

    public function run(): void 
    {
        $this->render();
    }

    abstract protected function render();

    protected function getTitle(): string
    {
        return $this->title;
    }

    protected function showTitle(): void
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