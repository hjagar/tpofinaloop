<?php

namespace App\Control;

use App\Control\Request;
use App\Modelo\TemperaturaRegistro;

class RegistroControl
{
    public function index(): array | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaRegistro::all();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function show($id): object | string | null
    {
        $returnValue = null;

        try {
            $returnValue = TemperaturaRegistro::find($id);
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function create(Request $data): object | string | null
    {
        $returnValue = null;

        try {
            $temperaturaRegistro = new TemperaturaRegistro();
            $temperaturaRegistro->fill($data->getFields());
            $returnValue = $temperaturaRegistro->save();
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function update($id, Request $data): object | string | null
    {
        $returnValue = null;
        try {
            $temperaturaRegistro = TemperaturaRegistro::find($id);

            if ($temperaturaRegistro) {
                $temperaturaRegistro->fill($data->getFields());
                $returnValue = $temperaturaRegistro->save();
            }
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }

    public function delete($id): bool | string
    {
        $returnValue = null;

        try {
            $temperaturaRegistro = TemperaturaRegistro::find($id);

            if ($temperaturaRegistro) {
                $returnValue = $temperaturaRegistro->delete();
            }
        } catch (\Exception $e) {
            $returnValue = $e->getMessage();
        }

        return $returnValue;
    }
}
