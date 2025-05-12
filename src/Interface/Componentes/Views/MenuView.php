<?php

namespace App\Interface\Componentes\Views;

use App\Interface\Componentes\Views\BaseView;
use App\Interface\Componentes\Enums\Constantes;
use App\Interface\Componentes\Controles\Cursor;
use App\Interface\Componentes\Controles\Screen;

abstract class MenuView extends BaseView
{
    private $menu;
    private $label;

    public function __construct($title, $menu, $label = null)
    {
        parent::__construct($title);
        $this->menu = $menu;
        $this->label = $label;
    }

    protected function render()
    {
        do {
            Screen::clearScreen();
            $this->showApplicationTitle();
            $this->showMenu();
            $len = Screen::plainLength(Constantes::SELECT_OPTION);
            $option = readline(Screen::showBottomLine(Constantes::SELECT_OPTION, $len, true));
            Screen::redrawRightLine();
            $option = strtoupper(trim($option));

            if (array_key_exists($option, $this->getMenu())) {
                if ($option !== '0' && $option !== 'X') {
                    $className = $this->getMenu()[$option]['Class'];
                    if (class_exists($className)) {
                        $classInstance = new $className();
                        $classInstance->run();
                    } else {
                        $this->showError(Constantes::formatMessage(Constantes::FEATURE_NOT_IMPLEMENTED, $className));
                    }
                } else {
                    echo $this->getMenu()[$option]['ExitMessage'] . "\n";

                    if ($option === 'X') {
                        exit(0); // Salir del programa
                    }
                }
            } else {
                $this->showError(Constantes::INVALID_OPTION);
            }
        } while ($option !== '0');
    }

    private function showMenu()
    {
        $this->showTitle();

        foreach ($this->getMenu() as $opcion => $menuItem) {
            $this->showMenuItem($opcion, $menuItem);
        }
    }

    private function getMenu() 
    {
        return $this->menu;
    }

    private function getLabel()
    {
        return $this->label;
    }

    private function getPlural()
    {
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $label = $this->getLabel() ?? '';
        $returnValue = '';

        if (!empty($label)) {
            if (in_array(substr($label, -1), $vowels)) {
                $returnValue = 's';
            } else {
                $returnValue = 'es';
            }
        }

        return $returnValue;
    }

    private function showMenuItem($opcion, $menuItem)
    {
        $label = sprintf($menuItem['Label'], $this->getLabel());
        $plural = $this->getPlural();
        $label = $menuItem['Plural'] ?? false ? "{$label}{$plural}" : $label;
        $labelColor = $menuItem['Color'] ?? "";
        $optionColor = $menuItem['Color'] ?? Constantes::BLUE_COLOR;
        $reset = Constantes::RESET_COLOR;
        $message = "{$labelColor}{$label}{$reset}";
        $plainOptionLength = Screen::plainLength("{$opcion}. {$label}");
        //echo "{$optionColor}{$opcion}{$reset}. {$message}\n";
        Screen::showLeftRightDoubleBorders("{$optionColor}{$opcion}{$reset}. {$message}", $plainOptionLength);
    }
}
