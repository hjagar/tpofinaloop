<?php

namespace App\Modelo;

use PDO;
use PDOException;
use App\Modelo\DBConfig;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            try {
                $dbConfig = DBConfig::getConfig();
                self::$connection = new PDO($dbConfig['dsn'], $dbConfig['username'], $dbConfig['password']);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        return self::$connection;
    }
}
?>