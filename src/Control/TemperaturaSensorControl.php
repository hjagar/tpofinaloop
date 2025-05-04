<?php
namespace App\Control;
use App\Control\Request;
use App\Modelo\TemperaturaSensor;

class TemperaturaSensorControl 
{
    public function index()
    {
        $temperaturaSensor = TemperaturaSensor::all();
        return $temperaturaSensor;
    }

    public function show($id)
    {
        $temperaturaSensor = TemperaturaSensor::find($id);
        return $temperaturaSensor;
    }

    public function create(Request $data)
    {
        $temperaturaSensor = new TemperaturaSensor();
        $temperaturaSensor->fill($data->getFields());
        $temperaturaSensor->save();
        return $temperaturaSensor;
    }

    public function update($id, Request $data)
    {
        $result = null;
        $temperaturaSensor = TemperaturaSensor::find($id);

        if ($temperaturaSensor) {
            $temperaturaSensor->fill($data->getFields());
            $result = $temperaturaSensor->save();
        }

        return $result;
    }

    public function delete($id)
    {
        $result = false;
        $temperaturaSensor = TemperaturaSensor::find($id);

        if ($temperaturaSensor) {
            $result = $temperaturaSensor->delete();
        }

        return $result;
    }
}