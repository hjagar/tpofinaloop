<?php

namespace App\Interface\Componentes\Controles;

use App\Interface\Componentes\Controles\Input;

class Select extends Input
{
    private $callback;

    public function __construct($label, $required = false, $name = null, $callback = null)
    {
        parent::__construct($label, $required, $name);
        $this->callback = $callback;
    }

    public function show(): bool
    {
        $returnValue = parent::show();

        if ($returnValue) {
            $callback = $this->getCallback();

            if ($callback !== null) {
                if (!$callback($this->getValue())) {
                    $this->show();
                }
            }
        }

        return $returnValue;
    }

    public function getCallback()
    {
        return $this->callback;
    }
}
