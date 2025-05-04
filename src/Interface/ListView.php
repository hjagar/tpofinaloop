<?php
namespace App\Interface;
use App\Interface\ActionView;
use App\Interface\Constantes;

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
            $this->columnsWidth[$column] = [
                'ColumnLength' => $columnLength,
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
        return str_pad($value === null ? '' : $value, $columnWidth, ' ', STR_PAD_RIGHT);
    }

    protected function showData(array $data): void
    {
        if (!empty($data)) {
            $this->showHeader();

            foreach ($data as $row) {
                $this->showDataRow($row);
            }        
        }else{
            $this->showMessage(Constantes::NO_DATA);
        }
    }
}