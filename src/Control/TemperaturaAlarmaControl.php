<?php
namespace App\Control;
use App\Control\Request;
use App\Modelo\TemperaturaAlarma;

class TemperaturaAlarmaControl 
{
    public function index()
    {
        $temperaturaAlarma = TemperaturaAlarma::all();
        return $temperaturaAlarma;
    }

    public function show($id)
    {
        $temperaturaAlarma = TemperaturaAlarma::find($id);
        return $temperaturaAlarma;
    }

    public function create(Request $data)
    {
        $temperaturaAlarma = new TemperaturaAlarma();
        $temperaturaAlarma->fill($data->getFields());
        $temperaturaAlarma->save();
        return $temperaturaAlarma;
    }

    public function update($id, Request $data)
    {
        $result = null;
        $temperaturaAlarma = TemperaturaAlarma::find($id);

        if ($temperaturaAlarma) {
            $temperaturaAlarma->fill($data->getFields());
            $temperaturaAlarma->save();
            $result = $temperaturaAlarma;
        }

        return $result;
    }

    public function delete($id)
    {
        $result = false;
        $temperaturaAlarma = TemperaturaAlarma::find($id);

        if ($temperaturaAlarma) {
            $result = $temperaturaAlarma->delete();
        }

        return $result;
    }
}