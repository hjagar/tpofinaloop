<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaSensor;

class TemperaturaSensorControl
{
    public function index(): array | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaSensor::all();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function show($id): object | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaSensor::find($id);
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function create(Request $data): object | string | null
    {
        $returnValue = null;

        try {
            $temperaturaSensor = new TemperaturaSensor();
            $temperaturaSensor->fill($data->getFields());
            $returnValue = $temperaturaSensor->save();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | string | null
    {
        $returnValue = null;
        try {
            $temperaturaSensor = TemperaturaSensor::find($id);

            if ($temperaturaSensor) {
                $temperaturaSensor->fill($data->getFields());
                $returnValue = $temperaturaSensor->save();
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
            $temperaturaSensor = TemperaturaSensor::find($id);

            if ($temperaturaSensor) {
                $returnValue = $temperaturaSensor->delete();
            }
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }
}
