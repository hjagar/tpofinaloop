<?php
namespace App\Interface;
use App\Interface\BaseView;

abstract class ActionView extends BaseView
{
    protected $controlClassName = null;
    protected $controlClass = null;

    public function __construct($controlClass)
    {
        $this->controlClassName = $controlClass;
        $this->instanciateControlClass();
    }

    public function instanciateControlClass()
    {
        $controlClass = $this->getControlClassName();
        if (class_exists($controlClass)) {
            $this->controlClass = new $controlClass();
        } else {
            throw new \Exception("Control class does not exist: {$controlClass}");
        }
    }

    public function getControlClassName()
    {
        return $this->controlClassName;
    }

    public function getControlClass()
    {
        return $this->controlClass;
    }
}