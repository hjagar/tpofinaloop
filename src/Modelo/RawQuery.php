<?php

namespace App\Modelo;

use PDO;
use App\Modelo\Model;

class RawQuery extends Model
{
    public static function query($sql)
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map([static::class, 'mapToObject'], $data);
    }
}
