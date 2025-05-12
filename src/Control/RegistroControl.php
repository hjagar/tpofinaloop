<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaRegistro;

class RegistroControl extends Control
{
    public function index(): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaRegistro::all());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function show($id): object | null
    {
        $returnValue = null;

        try {
            $returnValue = $this->ok(TemperaturaRegistro::find($id));
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function create(Request $data): object | null
    {
        $returnValue = null;

        try {
            $temperaturaRegistro = new TemperaturaRegistro();
            $temperaturaRegistro->fill($data->getFields());
            $returnValue = $this->ok($temperaturaRegistro->save());
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | null
    {
        $returnValue = null;
        try {
            $temperaturaRegistro = TemperaturaRegistro::find($id);

            if ($temperaturaRegistro) {
                $temperaturaRegistro->fill($data->getFields());
                $returnValue = $this->ok($temperaturaRegistro->save());
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
            $temperaturaRegistro = TemperaturaRegistro::find($id);

            if ($temperaturaRegistro) {
                $returnValue = $this->ok($temperaturaRegistro->delete());
            }
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }
}
