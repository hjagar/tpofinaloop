<?php
namespace App\Interface\Componentes;
use App\Interface\Componentes\EnumInterface;

enum Separator implements EnumInterface
{
    case NEWLINE;
    case DASH;
    case SPACE;
    case PIPE;

    public function value(): string
    {
        return match($this) {
            Separator::NEWLINE => '\n',
            Separator::DASH => ' - ',
            Separator::SPACE => ' ',
            Separator::PIPE => ' | ',
        };
    }
}