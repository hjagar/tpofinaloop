<?php
namespace App\Interface;
use App\Interface\Constantes;

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
            $title = Constantes::APP_NAME;
        }
        
        echo "\e[1;34m{$title}\e[0m\n";
    }

    protected function showError($message)
    {
        echo "\e[1;31;43m{$message}\e[0m\n";
    }

    protected function showSuccess($message)
    {
        echo "\e[1;32m{$message}\e[0m\n";
    }

    protected function showMessage($message)
    {
        echo "\e[1;37m{$message}\e[0m\n";
    }
}