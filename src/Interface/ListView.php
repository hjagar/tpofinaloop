<?php
namespace App\Interface;
use App\Interface\ActionView;

abstract class ListView extends ActionView
{
    protected $columns = [];
    private $columnsWidth = [];

    protected function getColumns(): array
    {
        return $this->columns;
    }

    private function setColumnsWidth(array $columns): void
    {
        for($i = 0; $i < count($columns); $i++){
            $column = $columns[$i];
            $columnLength = strlen($column);
            //$columnIntialPosition = 1 + strlen(implode(' | ' , array_slice($columns, 0, $i + 1))) - $columnLength;

            $this->columnsWidth[$column] = [
                'ColumnLength' => $columnLength,
                //'ColumnIntialPosition' => $columnIntialPosition,
            ];
        }
    }

    public function getColumnsWidth(): array
    {
        return $this->columnsWidth;
    }

    protected function showHeader(): void 
    {
        $columns = $this->getColumns();
        $this->setColumnsWidth($columns);

        if (!empty($columns)) {
            $columnsToShow = implode(" | ", $columns);
            $header = " {$columnsToShow} ";
            echo "{$header}\n";
            echo str_repeat("-", strlen($header)) . "\n";
        }
    }

    protected abstract function prepareDataRow($row): array;
    protected function showDataRow($row): void
    {
        $rowToShow = $this->prepareDataRow($row);
        $rowToShow = implode(" | ", $rowToShow);
        echo " {$rowToShow}\n";
    }

    protected function prepareDataColumn($value, $column): string
    {
        $columnWidth = $this->getColumnsWidth()[$column]['ColumnLength'];
        //$columnIntialPosition = $this->getColumnsWidth()[$column]['ColumnIntialPosition'];
        return str_pad(is_null($value) ? '' : $value, $columnWidth, ' ', STR_PAD_RIGHT);
    }

    protected function showData(array $data): void
    {
        if (!empty($data)) {
            $this->showHeader();

            foreach ($data as $row) {
                $this->showDataRow($row);
            }        
        }else{
            echo "No hay datos para mostrar.";
        }
    }
}