<?php
namespace App\Interface\Componentes\Controles;

class Cursor
{
    public static function up(int $lines = 1): void {
        echo "\033[{$lines}A";
    }

    public static function down(int $lines = 1): void {
        echo "\033[{$lines}B";
    }

    public static function right(int $cols = 1): void {
        echo "\033[{$cols}C";
    }

    public static function left(int $cols = 1): void {
        echo "\033[{$cols}D";
    }

    public static function first(): void {
        echo "\r";
    }
}
