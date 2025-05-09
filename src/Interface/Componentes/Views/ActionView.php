<?php

namespace App\Interface\Componentes\Views;

use App\Interface\Componentes\Views\BaseView;
use App\Control\Response;

abstract class ActionView extends BaseView
{
    private $controllerClassName = null;
    private $controller = null;
    private $entity;

    public function __construct($title, $controllerClassName, $entity)
    {
        parent::__construct($title);
        $this->controllerClassName = $controllerClassName;
        $this->entity = $entity;
    }

    public function instanciateController()
    {
        $controller = $this->getControllerClassName();

        if (class_exists($controller)) {
            $this->controller = new $controller();
        } else {
            throw new \Exception("Control class does not exist: {$controller}");
        }
    }

    private function getControllerClassName()
    {
        return $this->controllerClassName;
    }

    protected function getController()
    {
        if ($this->controller === null) {
            $this->instanciateController();
        }

        return $this->controller;
    }

    protected function getEntity()
    {
        return $this->entity;
    }

    protected abstract function processResult($result);

    protected function verifyResponse(Response $response): array | object | bool | string | null
    {
        $returnValue = null;

        if ($response->getStatus()) {
            if (is_object($response->getData()) || is_array($response->getData())) {
                $returnValue = $response->getData();
            } else {
                $returnValue = $response->getStatus();
            }
        } else {
            $returnValue = $response->getMessage();
        }

        return $this->processResult($returnValue);
    }
}
