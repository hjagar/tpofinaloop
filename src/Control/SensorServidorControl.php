<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaSensorServidor;

class SensorServidorControl
{
    public function index(): array | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaSensorServidor::all();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function show($id): object | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaSensorServidor::find($id);
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function create(Request $data): object | string | null
    {
        $returnValue = null;

        try {
            $temperaturaSensorServidor = new TemperaturaSensorServidor();
            $temperaturaSensorServidor->fill($data->getFields());
            $returnValue = $temperaturaSensorServidor->save();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | string | null
    {
        $returnValue = null;

        try {
            $temperaturaSensorServidor = TemperaturaSensorServidor::find($id);

            if ($temperaturaSensorServidor) {
                $temperaturaSensorServidor->fill($data->getFields());
                $returnValue = $temperaturaSensorServidor->save();
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
            $temperaturaSensorServidor = TemperaturaSensorServidor::find($id);

            if ($temperaturaSensorServidor) {
                $returnValue = $temperaturaSensorServidor->delete();
            }
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }
}
