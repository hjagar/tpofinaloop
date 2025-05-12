<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaSensor;

class SensorControl extends Control
{
    public function index(): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaSensor::all());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function show($id): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaSensor::find($id));
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function create(Request $data): object | null
    {
        $returnValue = null;

        try {
            $temperaturaSensor = new TemperaturaSensor();
            $temperaturaSensor->fill($data->getFields());
            $returnValue = $this->ok($temperaturaSensor->save());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | null
    {
        $returnValue = null;
        try {
            $temperaturaSensor = TemperaturaSensor::find($id);

            if ($temperaturaSensor) {
                $temperaturaSensor->fill($data->getFields());
                $returnValue = $this->ok($temperaturaSensor->save());
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
            $temperaturaSensor = TemperaturaSensor::find($id);

            if ($temperaturaSensor) {
                $returnValue = $this->ok($temperaturaSensor->delete());
            }
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }
}
