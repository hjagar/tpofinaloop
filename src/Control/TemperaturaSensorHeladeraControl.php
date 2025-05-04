<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaSensorHeladera;

class TemperaturaSensorHeladeraControl
{
    public function index(): array | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaSensorHeladera::all();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function show($id): object | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaSensorHeladera::find($id);
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function create(Request $data): object | string | null
    {
        $returnValue = null;

        try {
            $temperaturaSensorHeladera = new TemperaturaSensorHeladera();
            $temperaturaSensorHeladera->fill($data->getFields());
            $returnValue = $temperaturaSensorHeladera->save();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | string | null
    {
        $returnValue = null;

        try {
            $temperaturaSensorHeladera = TemperaturaSensorHeladera::find($id);

            if ($temperaturaSensorHeladera) {
                $temperaturaSensorHeladera->fill($data->getFields());
                $returnValue = $temperaturaSensorHeladera->save();
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
            $temperaturaSensorHeladera = TemperaturaSensorHeladera::find($id);

            if ($temperaturaSensorHeladera) {
                $returnValue = $temperaturaSensorHeladera->delete();
            }
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }
        
        return $returnValue;
    }
}
