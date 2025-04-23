<?php
namespace App\Modelo;
use PDO;

class DBConfig
{
    public static function getConfig(): array
    {
        return [
            'dsn' => 'mysql:host=localhost;dbname=w_temperatura',
            'username' => 'root',
            'password' => '',
            'options' => [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ],
        ];
    }
}
?>