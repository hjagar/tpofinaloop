<?php
namespace App\Interface;
use App\Interface\BaseView;

abstract class ActionView extends BaseView
{
    protected $controlClass = null;

    public function __construct()
    {
        $this->setControlClass($this->controlClass);
    }

    public function setControlClass($controlClass)
    {
        if (class_exists($controlClass)) {
            $this->controlClass = new $controlClass();
        } else {
            throw new \Exception("Control class does not exist: {$controlClass}");
        }
    }

    public function getControlClass()
    {
        return $this->controlClass;
    }
}