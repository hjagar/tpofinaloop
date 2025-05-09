<?php
namespace App\Control;

use App\Control\Response;

class Control
{
    public function ok($data = null){
        return new Response(true, data: $data);
    }

    public function fail($message) {
        return new Response(false, $message);
    }
}