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
  private bool $isNewRecord = true; // Flag to check if the record is new

  #region Static Methods
  public static function getTable(): string
  {
    isset(static::$table) or static::$table = strtolower(static::getClassName());
    return static::$table;
  }

  public static function getPrimaryKey(): string  | array
  {
    isset(static::$primaryKey) or static::$primaryKey = "id" . strtolower(static::getClassName());
    return static::$primaryKey;
  }

  public static function getAutoIcrement(): bool
  {
    isset(static::$autoIncrement) or static::$autoIncrement = true;
    return static::$autoIncrement;
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
    $stmt = $pdo->prepare("SELECT * FROM " . static::getTable());
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array_map([static::class, 'mapToObject'], $data);
  }

  public static function find(int $id): ?static
  {
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("SELECT * FROM " . static::getTable() . " WHERE " . static::getPrimaryKey() . " = :id");
    $stmt->execute(['id' => $id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    return $data ? self::mapToObject($data) : null;
  }

  private static function mapToObject(array $data): static
  {
    $object = new static();
    $object->setFields($data);
    $object->setIsNewRecord(false);

    return $object;
  }

  #endregion

  #region Instance Methods
  // public function __construct()  
  // {  
  //     $this->isNewRecord = true;  
  // }    

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
      if (property_exists($this, $key)) {
        $this->$key = $value;
      }
    }
  }

  public function delete(): bool
  {
    $pdo = Database::getConnection();
    $query = "DELETE FROM " . self::getTable() . " WHERE " . static::getPrimaryKey() . " = :id";
    $stmt = $pdo->prepare($query);
    return $stmt->execute(['id' => $this->fields[static::getPrimaryKey()]]);
  }

  public function save(): bool
  {
    $pdo = Database::getConnection();
    $fields = $this->getFields();
    $columns = array_keys($fields);

    if ($this->isSetPrimaryKey() && !$this->getIsNewRecord()) {
      // Update record  
      $query = "UPDATE " . self::getTable() . " SET " . implode(", ", array_map(fn($col) => "$col = :$col", $columns)) . " WHERE id = :id";
    } else {
      // Insert new record  
      $query = "INSERT INTO " . self::getTable() . " (" . implode(", ", $columns) . ") VALUES (" . implode(", ", array_map(fn($col) => ":$col", $columns)) . ")";
    }

    $stmt = $pdo->prepare($query);
    return $stmt->execute($fields);
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
?>