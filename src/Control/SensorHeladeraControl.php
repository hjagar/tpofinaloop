<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaSensorHeladera;

class SensorHeladeraControl extends Control
{
    public function index(): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaSensorHeladera::all());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function show($id): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaSensorHeladera::find($id));
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function create(Request $data): object | null
    {
        $returnValue = null;

        try {
            $temperaturaSensorHeladera = new TemperaturaSensorHeladera();
            $temperaturaSensorHeladera->fill($data->getFields());
            $returnValue = $this->ok($temperaturaSensorHeladera->save());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | null
    {
        $returnValue = null;

        try {
            $temperaturaSensorHeladera = TemperaturaSensorHeladera::find($id);

            if ($temperaturaSensorHeladera) {
                $temperaturaSensorHeladera->fill($data->getFields());
                $returnValue = $this->ok($temperaturaSensorHeladera->save());
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
            $temperaturaSensorHeladera = TemperaturaSensorHeladera::find($id);

            if ($temperaturaSensorHeladera) {
                $returnValue = $this->ok($temperaturaSensorHeladera->delete());
            }
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }
        
        return $returnValue;
    }
}
