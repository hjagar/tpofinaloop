<?php
namespace App\Interface\Componentes;

enum Direction
{
    case VERTICAL = 'vertical';
    case HORIZONTAL = 'horizontal';

    public function __toString(): string
    {
        return $this->value;
    }
}