<?php

namespace App\Interface\Componentes\Enums;

use App\Interface\Componentes\Enums\EnumInterface;

enum Separator implements EnumInterface
{
    case NEWLINE;
    case DASH;
    case SPACE;
    case PIPE;
    case VERTICAL_LINE;
    case HORIZONTAL_LINE;
    case PLUS;

    public function value(): string
    {
        return match ($this) {
            Separator::NEWLINE => '\n',
            Separator::DASH => ' - ',
            Separator::SPACE => ' ',
            Separator::PIPE => ' | ',
            Separator::VERTICAL_LINE =>'│',
            Separator::HORIZONTAL_LINE =>'─',
            Separator::PLUS =>'┼',
        };
    }
}
