<?php
namespace App\Interface;
use App\Interface\BaseView;

abstract class MenuView extends BaseView
{
    protected $menu = [];

    protected function render()
    {
        do {
            $this->showMenu();
            $option = readline("Seleccione una opción: ");
            $option = strtoupper(trim($option));

            if (array_key_exists($option, $this->menu)) {
                if($option !== '0' && $option !== 'X') {
                    $className = $this->menu[$option]['Class'];
                    if (class_exists($className)) {
                        $classInstance = new $className();
                        $classInstance->run();
                    } else {
                        $this->showError("Opción no implementada: {$className}");
                    }
                } else {
                    echo $this->menu[$option]['ExitMessage'] . "\n";

                    if ($option === 'X') {
                        exit(0); // Salir del programa
                    }
                }
            } else {
                $this->showError("Opción no válida. Intente nuevamente.");
            }
        } while ($option !== '0');
    }

    private function showMenu()
    {
        $this->showTitle();
         
        foreach ($this->menu as $opcion => $menuItem) {
            $this->showMenuItem($opcion, $menuItem);
        }
    }

    private function showMenuItem($opcion, $menuItem)
    {
        $label = $menuItem['Label'];
        $labelColor = $menuItem['Color'] ?? "";
        $optionColor = $menuItem['Color'] ?? "\e[1;34m";
        $message = "{$labelColor}{$label}\e[0m";
        
        echo "{$optionColor}{$opcion}\e[0m. {$message}\n";
    }
}