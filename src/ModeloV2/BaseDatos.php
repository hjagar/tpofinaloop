<?php

namespace App\ModeloV2;

use PDO;
use PDOException;
use App\Modelo\DBConfig;

class BaseDatos
{
    private $config;
    private ?PDO $connection;
    private $error;
    private $statement;

    public function __construct()
    {
        $this->config = DBConfig::getConfig();
        $this->connection = null;
        $this->statement = null;
        $this->error = null;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig($config)
    {
        $this->config = $config;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function setConnection($connection)
    {
        $this->connection = $connection;
    }

    public function getStatement()
    {
        return $this->statement;
    }

    public function setStatement($statement)
    {
        $this->statement = $statement;
    }

    public function getLastInsertedId()
    {
        $returnValue = null;

        try {
            $connection = $this->getConnection();
            if ($connection!== null) {
                $returnValue = $connection->lastInsertId();
            }
        } catch (PDOException $e) {
            $this->setError("Error al obtener el último ID insertado: {$e->getMessage()}");
        }
        
        return $returnValue;
    }

    public function getError()
    {
        return $this->error;
    }

    public function setError($error)
    {
        $this->error = $error;
    }

    public function init(): bool
    {
        $returnValue = false;

        try {
            $config = $this->getConfig();
            $connection = new PDO($config['dsn'], $config['username'], $config['password']);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setConnection($connection);
            $returnValue = true;
        } catch (PDOException $e) {
            $this->setError("Conexión fallida: {$e->getMessage()}");
        }

        return $returnValue;
    }

    public function execute($query, $params = []): bool
    {
        $returnValue = false;

        try {
            $connection = $this->getConnection();
            $stmt = $connection->prepare($query);
            $returnValue = $stmt->execute($params);
            $this->setStatement($stmt);
        } catch (PDOException $e) {
            $this->setError("Error al ejecutar la consulta: {$e->getMessage()}");
        }

        return $returnValue;
    }

    public function getAllRecords()
    {
        $returnValue = [];
        try {
            $stmt = $this->getStatement();
            if ($stmt !== null) {
                $returnValue = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            $this->setError("Error al obtener todos los registros: {$e->getMessage()}");
        }
        return $returnValue;
    }

    public function getSingleRecord()
    {
        $returnValue = null;
        try {
            $stmt = $this->getStatement();
            if ($stmt !== null) {
                $returnValue = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            $this->setError("Error al obtener un registro: {$e->getMessage()}");
        }
        return $returnValue;
    }
}
