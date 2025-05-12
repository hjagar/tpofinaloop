<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaSensorTemperaturaAviso;

class AvisoAlarmaControl extends Control
{
    public function index(): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaSensorTemperaturaAviso::all());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function show($id): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaSensorTemperaturaAviso::find($id));
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function create(Request $data): object | null
    {
        $returnValue = null;

        try {
            $temperaturaSensorTemperaturaAviso = new TemperaturaSensorTemperaturaAviso();
            $temperaturaSensorTemperaturaAviso->fill($data->getFields());
            $returnValue = $this->ok($temperaturaSensorTemperaturaAviso->save());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | null
    {
        $returnValue = null;
        try {
            $temperaturaSensorTemperaturaAviso = TemperaturaSensorTemperaturaAviso::find($id);

            if ($temperaturaSensorTemperaturaAviso) {
                $temperaturaSensorTemperaturaAviso->fill($data->getFields());
                $returnValue = $this->ok($temperaturaSensorTemperaturaAviso->save());
            }
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function delete($id): object | null
    {
        $returnValue = false;
        
        try {
            $temperaturaSensorTemperaturaAviso = TemperaturaSensorTemperaturaAviso::find($id);

            if ($temperaturaSensorTemperaturaAviso) {
                $returnValue = $this->ok($temperaturaSensorTemperaturaAviso->delete());
            }
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }
}
