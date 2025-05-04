<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaAlarma;

class TemperaturaAlarmaControl
{
    public function index(): array | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaAlarma::all();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function show($id): object | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaAlarma::find($id);
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function create(Request $data): object | string | null
    {
        $returnValue = null;

        try {
            $temperaturaAlarma = new TemperaturaAlarma();
            $temperaturaAlarma->fill($data->getFields());
            $returnValue = $temperaturaAlarma->save();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function update($id, Request $data): object |  string | null
    {
        $returnValue = null;
        try {
            $temperaturaAlarma = TemperaturaAlarma::find($id);

            if ($temperaturaAlarma) {
                $temperaturaAlarma->fill($data->getFields());
                $returnValue = $temperaturaAlarma->save();
            }
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function delete($id): bool | string
    {
        $returnValue = false;

        try {
            $temperaturaAlarma = TemperaturaAlarma::find($id);

            if ($temperaturaAlarma) {
                $returnValue = $temperaturaAlarma->delete();
            }
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }
}
