<?php
namespace App\Interface\Componentes;
use App\Interface\Componentes\EnumInterface;

enum Direction implements EnumInterface
{
    case VERTICAL;
    case HORIZONTAL;

    public function value(): string
    {
        return $this->value;
    }
}