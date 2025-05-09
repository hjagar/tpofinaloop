<?php

namespace App\Interface\Componentes\Views;

use App\Interface\Componentes\Views\ActionView;
use App\Interface\Componentes\Enums\Align;
use App\Interface\Componentes\Enums\Separator;
use App\Interface\Componentes\Enums\Constantes;

abstract class ListView extends ActionView
{
    private $columns = [];

    public function __construct($entityPlural, $controlClass, $entity, $columns)
    {
        parent::__construct("Listado de {$entityPlural}", $controlClass, $entity);
        $this->columns = $columns;
    }

    private function getColumns(): array
    {
        return $this->columns;
    }

    private function setColumns($columns): void
    {
        $this->columns = $columns;
    }

    private function getColumnHeaders()
    {
        $columns = $this->getColumns();

        return array_map(fn($col) => $col->getLabel(), $columns);
    }

    protected function getData(): array
    {
        $response = $this->getController()->index();
        $returnValue = $this->verifyResponse($response);

        return $returnValue;
    }

    private function calculateColumnsWidth()
    {
        $columns = $this->getColumns();

        foreach ($columns as &$column) {
            $label = $column->getLabel();
            $width = $column->getWidth();

            if ($width === 0) {
                $width = strlen($label);
                $column->setWidth($width);
            }
        }

        unset($column);
        $this->setColumns($columns);
    }

    private function showHeader(): void
    {
        $this->calculateColumnsWidth();
        $headers = $this->getColumnHeaders();

        if (!empty($headers)) {
            $columnsToShow = implode(Separator::PIPE->value(), $headers);
            $header = " {$columnsToShow} ";
            $separator = str_repeat(trim(Separator::DASH->value()), strlen($header));
            echo "{$header}\n{$separator}\n";
        }
    }

    private function flatRow($row): string
    {
        $columns = $this->getColumns();

        $rowValues = array_map(function ($col) use ($row) {
            $field = $col->getField();
            $width = $col->getWidth();
            $align = $col->getAlign();
            $pad = $align === Align::LEFT ? STR_PAD_RIGHT : STR_PAD_LEFT;
            $value = $row->$field;

            return str_pad($value ?? '', $width, Separator::SPACE->value(), $pad);
        }, $columns);

        return implode(Separator::PIPE->value(), $rowValues);
    }

    private function showDataRow($row): void
    {
        $rowToShow = $this->flatRow($row);
        echo " {$rowToShow}\n";
    }

    protected function showData(array | bool $data): void
    {
        if (is_array($data)) {
            $this->showHeader();

            if (!empty($data)) {
                foreach ($data as $row) {
                    $this->showDataRow($row);
                }
            } else {
                $this->showMessage(Constantes::NO_DATA);
            }
        }
    }

    protected function processResult($result): bool | array
    {
        $returnValue = null;

        if (is_string($result)) {
            $this->showError(Constantes::formatMessage(Constantes::LIST_ERROR, $this->getEntity()));
            $returnValue = false;
        } elseif (is_array($result)) {
            $returnValue = $result;
        }

        return $returnValue;
    }

    protected function render()
    {
        $data = $this->getData();
        $this->showTitle();
        $this->showData($data);
    }
}
