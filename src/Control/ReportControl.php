<?php

namespace App\Control;

use App\Control\Control;
use App\Modelo\RawQuery;

class ReportControl extends Control
{
    public function registroTemperaturaInferior($idsensor)
    {
        $returnValue = null;

        try {
            $sql =
                "SELECT *
                FROM w_temperaturaregistro as tr
                INNER JOIN w_temperaturaalarmas as ta
                    ON tr.idtemperaturasensor = ta.idtemperaturasensor
                INNER JOIN w_temperaturasensor as ts
                    ON tr.idtemperaturasensor = ts.idtemperaturasensor
            WHERE tr.idtemperaturasensor = {$idsensor}
            AND tr.tltemperatura < ta.tainferior";

            $data = RawQuery::query($sql);
            $returnValue = $this->ok($data);
        } catch (\Exception $e) {
            $returnValue = $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function registroTemperaturaSuperior($idsensor)
    {
        $returnValue = null;

        try {
            $sql =
                "SELECT *
                FROM w_temperaturaregistro as tr
                INNER JOIN w_temperaturaalarmas as ta
                    ON tr.idtemperaturasensor = ta.idtemperaturasensor
                INNER JOIN w_temperaturasensor as ts
                    ON tr.idtemperaturasensor = ts.idtemperaturasensor
                WHERE tr.idtemperaturasensor = {$idsensor}
                AND tr.tltemperatura > ta.tasuperior";

            $data = RawQuery::query($sql);
            $this->ok($data);
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }

        return $returnValue;
    }

    public function registroMenorValor($idsensor)
    {
        $returnValue = null;

        try {
            $sql =
                "SELECT ts.*, MIN(tr.tltemperatura) as temperatura
                FROM w_temperaturaregistro as tr
                    INNER JOIN w_temperaturasensor as ts
                        ON tr.idtemperaturasensor = ts.idtemperaturasensor
                WHERE tr.idtemperaturasensor = {$idsensor}";

            $data = RawQuery::query($sql);
            $this->ok($data);
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }

        return $returnValue;
    }
    public function registroMayorValor($idsensor)
    {
        $returnValue = null;

        try {
            $sql =
                "SELECT ts.*, MAX(tr.tltemperatura) as temperatura
                FROM w_temperaturaregistro as tr
                    INNER JOIN w_temperaturasensor as ts
                        ON tr.idtemperaturasensor = ts.idtemperaturasensor
                WHERE tr.idtemperaturasensor = {$idsensor}";

            $data = RawQuery::query($sql);
            $this->ok($data);
        } catch (\Exception $e) {
            $this->fail($e->getMessage());
        }

        return $returnValue;
    }
}
