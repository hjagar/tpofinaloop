<?php

namespace App\Control;

class Response
{
    private bool $status;
    private string $message;
    private mixed $data;

    public function __construct($status, $message = true, $data = null)
    {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getData()
    {
        return $this->data;
    }
}
