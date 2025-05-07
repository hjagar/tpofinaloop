<?php

namespace App\Interface\Componentes\Views;

use App\Interface\Componentes\Views\FormView;
use App\Interface\Componentes\Controles\UpdateInput;
use App\Interface\Componentes\Controles\Select;
use App\Interface\Componentes\Enums\Constantes;

abstract class UpdateFormView extends FormView
{
    public function __construct($controlClass, $entity, array $inputs)
    {
        parent::__construct("Modificar {$entity}", $controlClass, $entity, Constantes::UPDATE_SUBTITLE, $inputs);
    }

    protected function getData($id)
    {
        $data = $this->getController()->show($id);

        return $data;
    }

    protected function updateInputs($id): bool
    {
        $inputs = $this->getInputs();
        $data = $this->getData($id);
        $returnValue = true;

        if ($data) {
            foreach ($inputs as $input) {
                $propertyName = $input->getName();

                if ($input instanceof UpdateInput) {
                    $input->setOldValue($data->$propertyName);
                }
            }
        } else {
            $this->showError(Constantes::formatMessage(Constantes::NOT_FOUND_ERROR_MESSAGE, "{$this->getEntity()} {$id}"));
            $returnValue = false;
        }

        return $returnValue;
    }

    protected function getInputByType($class)
    {
        $inputs = $this->getInputs();
        $returnValue = null;
        $found = false;

        for ($i = 0; $i < count($inputs) && !$found; $i++) {
            $input = $inputs[$i];

            if ($input instanceof $class) {
                $returnValue = $input;
                $found = true;
            }
        }

        return $returnValue;
    }

    protected function prepareRequest(): array | object
    {
        $request = parent::prepareRequest();
        $select = $this->getInputByType(Select::class);
        $id = $select->getValue();

        return [$id, $request];
    }

    protected function processResult($result)
    {
        $returnValue = null;

        if (is_object($result) && $result) {
            $this->showSuccess(Constantes::formatMessage(Constantes::UPDATE_MESSAGE, $this->getEntity()));
            $returnValue = true;
        } else {
            $this->showError(Constantes::formatMessage(Constantes::UPDATE_ERROR_MESSAGE, $result));
            $returnValue = false;
        }

        return $returnValue;
    }


    public function save(): void
    {
        list($id, $request) = $this->prepareRequest();
        $response = $this->getController()->update($id, $request);
        $result = $this->verifyResponse($response);
    }
}
