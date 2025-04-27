<?php
namespace App\Control;
use App\Modelo\TemperaturaAlarma;

class TemperaturaAlarmaController
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
        $temperaturaAlarma = TemperaturaAlarma::find($id);
        if ($temperaturaAlarma) {
            $temperaturaAlarma->fill($data->getFields());
            $temperaturaAlarma->save();
            return $temperaturaAlarma;
        }
        return null;
    }
    public function delete($id)
    {
        $temperaturaAlarma = TemperaturaAlarma::find($id);
        if ($temperaturaAlarma) {
            $temperaturaAlarma->delete();
            return true;
        }
        return false;
    }
}
