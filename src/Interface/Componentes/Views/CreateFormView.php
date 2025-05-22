<?php

namespace App\Interface\Componentes\Views;

use App\Interface\Componentes\Views\FormView;
use App\Interface\Componentes\Enums\Constantes;

abstract class CreateFormView extends FormView
{
    public function __construct($controlClass, $entity, $inputs)
    {
        parent::__construct("Agregar {$entity}", $controlClass, $entity, inputs: $inputs);
    }

    protected function processResult($result, $showMessage = false): bool
    {
        $returnValue = null;

        if (is_object($result) && $result) {
            if ($showMessage) {
                $this->showSuccess(Constantes::formatMessage(Constantes::SAVE_MESSAGE, $this->getEntity()));
            }

            $returnValue = true;
        } else {
            if ($showMessage) {
                $this->showError(Constantes::formatMessage(Constantes::SAVE_ERROR_MESSAGE, $result));
            }
            
            $returnValue = false;
        }

        return $returnValue;
    }

    protected function save(): void
    {
        $request = $this->prepareRequest();
        $response = $this->getController()->create($request);
        $result = $this->verifyResponse($response);
    }
}
