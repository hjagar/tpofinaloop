<?php

namespace App\Interface\Componentes\Enums;

use App\Interface\Componentes\Enums\EnumInterface;

enum Align implements EnumInterface
{
    case LEFT;
    case RIGHT;

    public function value(): string
    {
        return $this->value;
    }
}
