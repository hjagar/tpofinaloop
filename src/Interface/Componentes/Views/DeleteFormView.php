<?php

namespace App\Interface\Componentes\Views;

use App\Interface\Componentes\Enums\Constantes;

abstract class DeleteFormView extends FormView
{
    public function __construct($controlClass, $entity, array $inputs)
    {
        parent::__construct("Eliminar {$entity}", $controlClass, $entity, inputs: $inputs);
    }

    protected function save(): void
    {
        $id = $this->prepareRequest();
        $response = $this->getController()->delete($id);
        $result = $this->verifyResponse($response);
    }

    protected function prepareRequest(): int | array
    {
        $returnValue = array_map(fn($input) => $input->getValue(), $this->getInputs());

        if (count($returnValue) === 1) {
            $returnValue = $returnValue[0];
        }

        return $returnValue;
    }

    protected function processResult($result)
    {
        $returnValue = null;

        if (is_object($result) && $result) {
            $this->showSuccess(Constantes::formatMessage(Constantes::DELETE_MESSAGE, $this->getEntity()));
            $returnValue = true;
        } else {
            $this->showError(Constantes::formatMessage(Constantes::DELETE_ERROR_MESSAGE, $result));
            $returnValue = false;
        }

        return $returnValue;
    }

    protected function getData($id)
    {
        $data = $this->getController()->show($id);
        return $data;
    }

    protected function showConfirmation($id)
    {
        $data = $this->getData($id);
        $fields = $data->getFields();
        $fieldValues = array_values($fields);
        $flatFieldValues = implode(', ', $fieldValues);
        $this->showMessage(
            Constantes::formatMessage(Constantes::DELETE_CONFIRMATION_MESSAGE, $this->getEntity(), $flatFieldValues)
        );
    }
}