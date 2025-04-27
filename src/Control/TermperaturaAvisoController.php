<?php
namespace App\Control;
use App\Modelo\TemperaturaAviso;

class TemperaturaAvisoController
{
    public function index()
    {
        $temperaturaAviso = TemperaturaAviso::all();
        return $temperaturaAviso;
    }

    public function show($id)
    {
        $temperaturaAviso = TemperaturaAviso::find($id);
        return $temperaturaAviso;
    }

    public function create(Request $data)
    {
        $temperaturaAviso = new TemperaturaAviso();
        $temperaturaAviso->fill($data->getFields());
        $temperaturaAviso->save();
        return $temperaturaAviso;
    }

    public function update($id, Request $data)
    {
        $temperaturaAviso = TemperaturaAviso::find($id);
        if ($temperaturaAviso) {
            $temperaturaAviso->fill($data->getFields());
            $temperaturaAviso->save();
            return $temperaturaAviso;
        }
        return null;
    }
    public function delete($id)
    {
        $temperaturaAviso = TemperaturaAviso::find($id);
        if ($temperaturaAviso) {
            $temperaturaAviso->delete();
            return true;
        }
        return false;
    }
}