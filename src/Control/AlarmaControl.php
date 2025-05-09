<?php

namespace App\Control;
use App\Control\Control;
use App\Control\Request;
use App\Modelo\TemperaturaAlarma;

class AlarmaControl extends Control
{
    public function index(): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaAlarma::all());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function show($id): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaAlarma::find($id));
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function create(Request $data): object | null
    {
        $returnValue = null;

        try {
            $temperaturaAlarma = new TemperaturaAlarma();
            $temperaturaAlarma->fill($data->getFields());
            $returnValue = $this->ok($temperaturaAlarma->save());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | null
    {
        $returnValue = null;
        try {
            $temperaturaAlarma = TemperaturaAlarma::find($id);

            if ($temperaturaAlarma) {
                $temperaturaAlarma->fill($data->getFields());
                $returnValue = $this->ok($temperaturaAlarma->save());
            }
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function delete($id): object | null
    {
        $returnValue = null;

        try {
            $temperaturaAlarma = TemperaturaAlarma::find($id);

            if ($temperaturaAlarma) {
                $returnValue = $this->ok($temperaturaAlarma->delete());
            }
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }
}
