<?php
namespace App\Control;
use App\Control\Request;
use App\Modelo\TemperaturaSensorTemperaturaAviso;

class TemperaturaSensorTemperaturaAvisoControl 
{
    public function index()
    {
        $temperaturaSensorTemperaturaAviso = TemperaturaSensorTemperaturaAviso::all();
        return $temperaturaSensorTemperaturaAviso;
    }

    public function show($id)
    {
        $temperaturaSensorTemperaturaAviso = TemperaturaSensorTemperaturaAviso::find($id);
        return $temperaturaSensorTemperaturaAviso;
    }

    public function create(Request $data)
    {
        $temperaturaSensorTemperaturaAviso = new TemperaturaSensorTemperaturaAviso();
        $temperaturaSensorTemperaturaAviso->fill($data->getFields());
        $temperaturaSensorTemperaturaAviso->save();
        return $temperaturaSensorTemperaturaAviso;
    }

    public function update($id, Request $data)
    {
        $result = null;
        $temperaturaSensorTemperaturaAviso = TemperaturaSensorTemperaturaAviso::find($id);

        if ($temperaturaSensorTemperaturaAviso) {
            $temperaturaSensorTemperaturaAviso->fill($data->getFields());
            $result = $temperaturaSensorTemperaturaAviso->save();
        }

        return $result;
    }

    public function delete($id)
    {
        $result = false;
        $temperaturaSensorTemperaturaAviso = TemperaturaSensorTemperaturaAviso::find($id);

        if ($temperaturaSensorTemperaturaAviso) {
            $result = $temperaturaSensorTemperaturaAviso->delete();
        }

        return $result;
    }
}