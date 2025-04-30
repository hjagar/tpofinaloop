<?php
namespace App\Control;
use App\Control\Request;
use App\Modelo\TemperaturaRegistro;

class TemperaturaRegistroControl
{
    public function index()
    {
        $temperaturaRegistro = TemperaturaRegistro::all();
        return $temperaturaRegistro;
    }

    public function show($id)
    {
        $temperaturaRegistro = TemperaturaRegistro::find($id);
        return $temperaturaRegistro;
    }

    public function create(Request $data)
    {
        $temperaturaRegistro = new TemperaturaRegistro();
        $temperaturaRegistro->fill($data->getFields());
        $temperaturaRegistro->save();
        return $temperaturaRegistro;
    }

    public function update($id, Request $data)
    {
        $result = null;
        $temperaturaRegistro = TemperaturaRegistro::find($id);

        if ($temperaturaRegistro) {
            $temperaturaRegistro->fill($data->getFields());
            $result = $temperaturaRegistro->save();
        }

        return $result;
    }

    public function delete($id)
    {
        $result = false;
        $temperaturaRegistro = TemperaturaRegistro::find($id);

        if ($temperaturaRegistro) {
            $result = $temperaturaRegistro->delete();
        }
        return $result;
    }    
}