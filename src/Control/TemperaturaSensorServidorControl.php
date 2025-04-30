<?php
namespace App\Control;
use App\Control\Request;
use App\Modelo\TemperaturaSensorServidor;

class TemperaturaSensorServidorControl 
{
    public function index()
    {
        $temperaturaSensorServidor = TemperaturaSensorServidor::all();
        return $temperaturaSensorServidor;
    }

    public function show($id)
    {
        $temperaturaSensorServidor = TemperaturaSensorServidor::find($id);
        return $temperaturaSensorServidor;
    }

    public function create(Request $data)
    {
        $temperaturaSensorServidor = new TemperaturaSensorServidor();
        $temperaturaSensorServidor->fill($data->getFields());
        $temperaturaSensorServidor->save();
        return $temperaturaSensorServidor;
    }

    public function update($id, Request $data)
    {
        $result = null;
        $temperaturaSensorServidor = TemperaturaSensorServidor::find($id);

        if ($temperaturaSensorServidor) {
            $temperaturaSensorServidor->fill($data->getFields());
            $result = $temperaturaSensorServidor->save();
        }

        return $result;
    }

    public function delete($id)
    {
        $result = false;
        $temperaturaSensorServidor = TemperaturaSensorServidor::find($id);

        if ($temperaturaSensorServidor) {
            $result = $temperaturaSensorServidor->delete();
        }

        return $result;
    }
}