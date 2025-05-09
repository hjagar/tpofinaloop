<?php

namespace App\Interface\Componentes\Views;

use App\Interface\Componentes\Views\BaseView;
use App\Interface\Componentes\Enums\Constantes;

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
            $this->showMenu();
            $option = readline(Constantes::SELECT_OPTION);
            $option = strtoupper(trim($option));

            if (array_key_exists($option, $this->menu)) {
                if ($option !== '0' && $option !== 'X') {
                    $className = $this->menu[$option]['Class'];
                    if (class_exists($className)) {
                        $classInstance = new $className();
                        $classInstance->run();
                    } else {
                        $this->showError(Constantes::formatMessage(Constantes::FEATURE_NOT_IMPLEMENTED, $className));
                    }
                } else {
                    echo $this->menu[$option]['ExitMessage'] . "\n";

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
        $optionColor = $menuItem['Color'] ?? "\e[1;34m";
        $message = "{$labelColor}{$label}\e[0m";

        echo "{$optionColor}{$opcion}\e[0m. {$message}\n";
    }
}
