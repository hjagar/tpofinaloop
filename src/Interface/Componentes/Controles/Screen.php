<?php

namespace App\Interface\Componentes\Controles;

class Screen 
{
    private const WIDTH = 100;

    public static function clearScreen(): void
    {
        echo "\033[2J\033[H";

        if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {
            system('cls');
        }
    }

    public static function plainLength($message)
    {
        return mb_strlen("{$message}");
    }

    public static function getHorizontalDoubleLine()
    {
        return str_repeat("═", self::WIDTH);
    }

    public static function showAppUpperLine()
    {
        $hLine = self::getHorizontalDoubleLine();
        echo "╔{$hLine}╗\n";
    }

    public static function showAppMiddleLine()
    {
        $hLine = self::getHorizontalDoubleLine();
        echo "╠{$hLine}╣\n";
    }

    public static function showLeftRightDoubleBorders($text, $pad = 0)
    {
        $padText = "";

        if ($pad !== 0) {
            $padText = str_repeat(" ", self::WIDTH - $pad);
        }

        echo "║{$text}{$padText}║\n";
    }

    public static function showBottomLine($text, $pad = 0, $prompt = false) {
        $padText = "";

        if ($pad !== 0) {
            $padText = str_repeat(" ", self::WIDTH - $pad);
        }

        echo "║{$text}{$padText}║\n";
        $hline = self::getHorizontalDoubleLine();
        echo "╚{$hline}╝";

        if ($prompt){
            Cursor::up();
            Cursor::first();
            Cursor::right($pad + 1);
        }
    }

    public static function redrawRightLine()
    {
        Cursor::up();
        Cursor::first();
        Cursor::right(self::WIDTH + 1);
        echo "║";
        Cursor::down();
        Cursor::first();
    }
}