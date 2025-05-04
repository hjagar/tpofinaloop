<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaAviso;

class TemperaturaAvisoControl
{
    public function index(): array | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaAviso::all();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function show($id): object | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaAviso::find($id);
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function create(Request $data): object | string | null
    {
        $returnValue = null;

        try {
            $temperaturaAviso = new TemperaturaAviso();
            $temperaturaAviso->fill($data->getFields());
            $returnValue = $temperaturaAviso->save();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | string | null
    {
        $returnValue = null;

        try {
            $temperaturaAviso = TemperaturaAviso::find($id);

            if ($temperaturaAviso) {
                $temperaturaAviso->fill($data->getFields());
                $returnValue = $temperaturaAviso->save();
            }
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function delete($id): bool | string
    {
        $returnValue = null;

        try {
            $temperaturaAviso = TemperaturaAviso::find($id);

            if ($temperaturaAviso) {
                $returnValue = $temperaturaAviso->delete();
            }
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }
}
