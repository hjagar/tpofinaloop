<?php

namespace App\Interface\Componentes\Views;

use App\Interface\Componentes\Controles\Screen;
use App\Interface\Componentes\Views\ListView;

abstract class SearchListView extends ListView
{
    private $filters;
    private $method;

    public function __construct($entityPlural, $controlClass, $entity, $columns, $filters, $method)
    {
        parent::__construct($entityPlural, $controlClass, $entity, $columns);
        $this->filters = $filters;
        $this->method = $method;
    }

    private function getFilters(): array
    {
        return $this->filters;
    }

    private function getMethod(): string
    {
        return $this->method;
    }

    private function showFilters(): bool
    {
        $filters = $this->getFilters();
        $returnValue = true;

        for ($i = 0; $i < count($filters) && $returnValue; $i++) {
            $returnValue = $filters[$i]->show();
        }

        return $returnValue;
    }

    private function getFilterValues() 
    {
        $filters = $this->getFilters();
        $filterValues = array_map(fn($filter) => $filter->getValue(), $filters);

        return $filterValues;
    }

    protected function getData(): array
    {
        $filterValues = $this->getFilterValues();
        $method = $this->getMethod();
        $response = $this->getController()->$method(...$filterValues);
        $returnValue = $this->verifyResponse($response);

        return $returnValue;
    }

    protected function render()
    {
       Screen::clearScreen();
        $this->showApplicationTitle();
        $this->showTitle();
        $this->showFilters();
        $data = $this->getData();
        $this->showTitle();
        $this->showData($data);
    }
}
