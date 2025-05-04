<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaSensorTemperaturaAviso;

class TemperaturaSensorTemperaturaAvisoControl
{
    public function index(): array | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaSensorTemperaturaAviso::all();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function show($id): object | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaSensorTemperaturaAviso::find($id);
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function create(Request $data): object | string | null
    {
        $returnValue = null;

        try {
            $temperaturaSensorTemperaturaAviso = new TemperaturaSensorTemperaturaAviso();
            $temperaturaSensorTemperaturaAviso->fill($data->getFields());
            $returnValue = $temperaturaSensorTemperaturaAviso->save();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | string | null
    {
        $returnValue = null;
        try {
            $temperaturaSensorTemperaturaAviso = TemperaturaSensorTemperaturaAviso::find($id);

            if ($temperaturaSensorTemperaturaAviso) {
                $temperaturaSensorTemperaturaAviso->fill($data->getFields());
                $returnValue = $temperaturaSensorTemperaturaAviso->save();
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
            $temperaturaSensorTemperaturaAviso = TemperaturaSensorTemperaturaAviso::find($id);

            if ($temperaturaSensorTemperaturaAviso) {
                $returnValue = $temperaturaSensorTemperaturaAviso->delete();
            }
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }
}
