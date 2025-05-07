<?php

namespace App\Interface\Componentes\Enums;

use App\Interface\Componentes\Enums\EnumInterface;

enum Direction implements EnumInterface
{
    case VERTICAL;
    case HORIZONTAL;

    public function value(): string
    {
        return $this->value;
    }
}
