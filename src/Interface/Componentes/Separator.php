<?php
namespace App\Interface\Componentes;

enum Separator: string
{
    case NEWLINE = "\n";
    case DASH = " - ";

    public function __toString(): string
    {
        return $this->value;
    }
}