<?php

namespace App\Modelo;

use PDO;
use App\Modelo\Database;

abstract class Model
{
    protected static string $table; // Table name
    protected static string | array $primaryKey; // Primary key of the table
    protected static bool $autoIncrement = true; // Auto-increment flag
    private array $fields; // Fields to be used in the model
    private array $keys; // Fields to be used in the model
    private bool $isNewRecord = true; // Flag to check if the record is new

    #region Static Methods
    public static function getTable(): string
    {
        return static::$table ?? strtolower(static::getClassName());
    }

    public static function getPrimaryKey(): string  | array
    {
        return static::$primaryKey ?? "id" . strtolower(static::getClassName());
    }

    public static function getAutoIcrement(): bool
    {
        return static::$autoIncrement ?? true;
    }

    public static function getClassName(): string
    {
        $className = explode('\\', static::class);
        $className = end($className);

        return $className;
    }

    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare(static::getSelectQueryBase());
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map([static::class, 'mapToObject'], $data);
    }

    public static function find(int | array $id): ?static
    {
        $pdo = Database::getConnection();
        $whereClause = static::prepareWhereClause();
        $primaryKeyValues = static::preparePrimaryKeyValue($id);
        $query = static::getSelectQueryBase() . " WHERE {$whereClause}";
        $stmt = $pdo->prepare($query);
        $stmt->execute($primaryKeyValues);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        return $data ? self::mapToObject($data) : null;
    }

    public static function where(...$conditions): array
    {
        $pdo = Database::getConnection();
        $transformedConditions = static::transformConditions($conditions);
        $query = static::getSelectQueryBase() . " WHERE " . implode(" AND ", array_map(fn($key) => "$key = :$key", array_keys($transformedConditions)));
        $stmt = $pdo->prepare($query);
        $stmt->execute($transformedConditions);
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map([static::class, 'mapToObject'], $data);
    }

    private static function getSelectQueryBase(): string
    {
        return "SELECT * FROM " . static::getTable();
    }

    private static function transformConditions(array $conditions): array
    {
        $transformedConditions = [];

        for ($i = 0; $i < count($conditions); $i += 2) {
            $key = $conditions[$i];
            $value = $conditions[$i + 1];
            $transformedConditions[$key] = $value;
        }

        return $transformedConditions;
    }

    protected static function mapToObject(array $data): static
    {
        $object = new static();
        $object->setFields($data);
        $object->setKeys($data);
        $object->setIsNewRecord(false);

        return $object;
    }

    #endregion

    #region Instance Methods
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


    public function getIsNewRecord(): bool
    {
        return $this->isNewRecord;
    }

    public function setIsNewRecord(bool $isNewRecord): void
    {
        $this->isNewRecord = $isNewRecord;
    }

    public function getKeys(): array
    {
        return $this->keys;
    }

    public function setKeys(array $data): void
    {
        $primaryKey = static::getPrimaryKey();

        if (!is_array($primaryKey)) {
            $primaryKey = [$primaryKey];
        }

        $primaryKeyForExtraction = array_combine($primaryKey, array_fill(0, count($primaryKey), null));
        $keys = array_intersect_key($data, $primaryKeyForExtraction);
        $keyValues = array_values($keys);
        $keyNames = array_keys($keys);
        $modiedKeyNames = array_map(fn($key) => "{$key}_pk", $keyNames);
        $keys = array_combine($modiedKeyNames, $keyValues);
        $this->keys = $keys;
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function setFields(array $fields): void
    {
        $this->fields = $fields;
    }

    public function fill(array $data): void
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function delete(): bool
    {
        $pdo = Database::getConnection();
        $query = "DELETE FROM " . self::getTable() . " WHERE " . static::prepareWhereClause(true);
        $stmt = $pdo->prepare($query);
        return $stmt->execute($this->getKeys());
    }

    public function save(): bool | static
    {
        $pdo = Database::getConnection();
        $fields = $this->getFields();
        $columns = array_keys($fields);

        if ($this->isSetPrimaryKey() && !$this->getIsNewRecord()) {
            $whereClause = static::prepareWhereClause(true);
            $primaryKeyValues = static::getKeys();
            $fields = array_merge($fields, $primaryKeyValues);
            $query = "UPDATE " . self::getTable() . " SET " . implode(", ", array_map(fn($col) => "$col = :$col", $columns)) . " WHERE " . $whereClause;
        } else {
            $query = "INSERT INTO " . self::getTable() . " (" . implode(", ", $columns) . ") VALUES (" . implode(", ", array_map(fn($col) => ":$col", $columns)) . ")";
        }

        $stmt = $pdo->prepare($query);
        $result = $stmt->execute($fields);

        if ($result) {
            $this->setIsNewRecord(false);

            if ($this->getAutoIcrement()) {
                $primaryKey = static::getPrimaryKey();
                $primaryKeyValue = $pdo->lastInsertId();
                $keyData = array_combine([$primaryKey], [$pdo->lastInsertId()]);
                $this->setKeys($keyData);
                $this->$primaryKey = $primaryKeyValue;
            } else {
                $this->setKeys($this->fields);
            }

            $result = $this;
        }

        return $result;
    }

    private static function prepareWhereClause($update = false): string
    {
        $primaryKey = static::getPrimaryKey();

        if (!is_array($primaryKey)) {
            $primaryKey = [$primaryKey];
        }

        $keySuffix = $update ? "_pk" : "";

        return implode(" AND ", array_map(fn($key) => "{$key} = :{$key}{$keySuffix}", $primaryKey));
    }

    private static function preparePrimaryKeyValue(int | array $id): array
    {
        $primaryKey = static::getPrimaryKey();

        if (!is_array($primaryKey)) {
            $primaryKey = [$primaryKey];
        }

        $ids = $id;

        if (!is_array($id)) {
            $ids = [$id];
        }

        $primaryKeyValues = array_combine($primaryKey, $ids);

        return $primaryKeyValues;
    }

    private function isSetPrimaryKey(): bool
    {
        $isSetPrimaryKey = true;
        $primaryKey = static::getPrimaryKey();

        if (is_array($primaryKey)) {
            foreach ($primaryKey as $key) {
                if (!isset($this->fields[$key])) {
                    $isSetPrimaryKey = false;
                }
            }
        } else {
            $isSetPrimaryKey = isset($this->fields[$primaryKey]);
        }

        return $isSetPrimaryKey;
    }

    #endregion
}
