<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaSensorServidor;

class SensorServidorControl extends Control
{
    public function index(): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaSensorServidor::all());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function show($id): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaSensorServidor::find($id));
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function create(Request $data): object | null
    {
        $returnValue = null;

        try {
            $temperaturaSensorServidor = new TemperaturaSensorServidor();
            $temperaturaSensorServidor->fill($data->getFields());
            $returnValue = $this->ok($temperaturaSensorServidor->save());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | null
    {
        $returnValue = null;

        try {
            $temperaturaSensorServidor = TemperaturaSensorServidor::find($id);

            if ($temperaturaSensorServidor) {
                $temperaturaSensorServidor->fill($data->getFields());
                $returnValue = $this->ok($temperaturaSensorServidor->save());
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
            $temperaturaSensorServidor = TemperaturaSensorServidor::find($id);

            if ($temperaturaSensorServidor) {
                $returnValue = $this->ok($temperaturaSensorServidor->delete());
            }
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }
}
