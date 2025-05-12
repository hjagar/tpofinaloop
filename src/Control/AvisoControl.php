<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaAviso;

class AvisoControl extends Control
{
    public function index(): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaAviso::all());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function show($id): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaAviso::find($id));
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function create(Request $data): object | null
    {
        $returnValue = null;

        try {
            $temperaturaAviso = new TemperaturaAviso();
            $temperaturaAviso->fill($data->getFields());
            $returnValue = $this->ok($temperaturaAviso->save());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
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
                $returnValue = $this->ok($temperaturaAviso->save());
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
            $temperaturaAviso = TemperaturaAviso::find($id);

            if ($temperaturaAviso) {
                $returnValue = $this->ok($temperaturaAviso->delete());
            }
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }
}
