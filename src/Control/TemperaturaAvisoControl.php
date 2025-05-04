<?php
namespace App\Control;
use App\Control\Request;
use App\Modelo\TemperaturaAviso;

class TemperaturaAvisoControl
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
        $result = null;
        $temperaturaAviso = TemperaturaAviso::find($id);

        if ($temperaturaAviso) {
            $temperaturaAviso->fill($data->getFields());
            $result = $temperaturaAviso->save();
        }

        return $result;
    }

    public function delete($id)
    {
        $result = false;
        $temperaturaAviso = TemperaturaAviso::find($id);
        
        if ($temperaturaAviso) {
            $result = $temperaturaAviso->delete();
        }

        return $result;
    }    
}