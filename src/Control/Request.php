<?php
namespace App\Control;
class Request
{
    private array $fields; // Fields to be used in request to controllers

    public function __get($name)
    {
      $value = null;
  
      if (array_key_exists($name, $this->fields)) {
        $value = $this->fields[$name];
      }
  
      return $value;
    }
  
    public function __set($name, $value)
    {
      $this->fields[$name] = $value;
    }

    public function getFields(): array
    {
      return $this->fields;
    }

    public function __serialize(): array
    {
        return $this->fields;
    }

    public function fill(array $inputs): void
    {
        foreach ($inputs as $input) {
            $key = $input->getField();
            $value = $input->getValue();

            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}