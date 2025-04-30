<?php
namespace App\Control;
use App\Control\Request;
use App\Modelo\TemperaturaSensorHeladera;

class TemperaturaSensorHeladeraControl 
{
    public function index()
    {
        $temperaturaSensorHeladera = TemperaturaSensorHeladera::all();
        return $temperaturaSensorHeladera;
    }

    public function show($id)
    {
        $temperaturaSensorHeladera = TemperaturaSensorHeladera::find($id);
        return $temperaturaSensorHeladera;
    }

    public function create(Request $data)
    {
        $temperaturaSensorHeladera = new TemperaturaSensorHeladera();
        $temperaturaSensorHeladera->fill($data->getFields());
        $temperaturaSensorHeladera->save();
        return $temperaturaSensorHeladera;
    }

    public function update($id, Request $data)
    {
        $result = null;
        $temperaturaSensorHeladera = TemperaturaSensorHeladera::find($id);

        if ($temperaturaSensorHeladera) {
            $temperaturaSensorHeladera->fill($data->getFields());
            $temperaturaSensorHeladera->save();
            $result = $temperaturaSensorHeladera;
        }

        return $result;
    }

    public function delete($id)
    {
        $result = false;
        $temperaturaSensorHeladera = TemperaturaSensorHeladera::find($id);

        if ($temperaturaSensorHeladera) {
            $result = $temperaturaSensorHeladera->delete();
        }
        return $result;
    }
}