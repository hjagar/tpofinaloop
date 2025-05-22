<?php

namespace App\ModeloV2;

abstract class Modelo
{
    private $className;
    private $table;
    private $fields;
    private $primaryKey;
    private $autoIncrement;
    private $isa;
    private $relations;

    public function __construct($className, $table, $fields, $primaryKey, $autoIncrement = true, $isa = null, $relations = null)
    {
        $this->className = $className;
        $this->table = $table;
        $this->fields = $fields;
        $this->primaryKey = $primaryKey;
        $this->autoIncrement = $autoIncrement;
        $this->isa = $isa;
        $this->relations = $relations;
    }

    public function getClassName()
    {
        return $this->className;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function getTable()
    {
        return $this->table;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function getAutoIncrement()
    {
        return $this->autoIncrement;
    }

    public function getIsa()
    {
        return $this->isa;
    }

    public function getRelations()
    {
        return $this->relations;
    }

    public function getPrimaryKeyValue()
    {
        $primaryKey = $this->getPrimaryKey();
        $method = "get" . ucfirst($primaryKey);

        return $this->$method();
    }

    public function setPrimaryKeyValue($value)
    {
        $primaryKey = $this->getPrimaryKey();
        $method = "set" . ucfirst($primaryKey);
        $this->$method($value);
    }

    public function fill(...$params)
    {
        $fields = $this->getFields();

        foreach ($params as $key => $value) {
            if (in_array($key, $fields)) {
                $method = "set" . ucfirst($key);
                $this->$method($value);
            }
        }
    }

    public function list($condition = "", $join = "", $includeRelations = true)
    {
        $returnValue = null;
        $db = new BaseDatos();
        $sql = $this->makeSelectStatement();

        if ($join !== "") {
            $sql .= " {$join}";
        }

        if ($condition !== "") {
            $sql .= " WHERE {$condition}";
        }

        if ($db->init()) {
            if ($db->execute($sql)) {
                $data = $db->getAllRecords();
                $returnValue = array_map(function ($record) {
                    return $this->mapToObject($record);
                }, $data);

                if ($includeRelations) {
                    $returnValue = $this->processRelations($returnValue);
                }
            } else {
                $returnValue = $db->getError();
            }
        } else {
            $returnValue = $db->getError();
        }

        return $returnValue;
    }

    public function find($id, $includeRelations = true)
    {
        $returnValue = null;
        $db = new BaseDatos();
        $sql = "{$this->makeSelectStatement()} WHERE {$this->getPrimaryKey()} = :id";

        if ($db->init()) {
            if ($db->execute($sql, [":id" => $id])) {
                $record = $db->getSingleRecord();

                if ($record) {
                    $returnValue = $this->mapToObject($record);

                    if ($includeRelations) {
                        $returnValue = $this->processRelation($returnValue);
                    }
                }
            } else {
                $returnValue = $db->getError();
            }
        } else {
            $returnValue = $db->getError();
        }

        return $returnValue;
    }

    public function insert()
    {
        $returnValue = null;
        $isaReturnValue = null;
        $db = new BaseDatos();
        $isa = $this->getIsa();

        if ($isa !== null) {
            $isaClass = new $isa();
            $isaClass->fill($this->getCurrentFieldValues());
            $isaReturnValue = $isaClass->insert();

            if ($isaReturnValue === null) {
                $this->setPrimaryKeyValue($isaReturnValue);
            }
        }

        if ($isa === null || $isaReturnValue !== null) {
            $sqlFields = $this->makeFieldsForInsert();
            $sqlValues = $this->makeFieldsForInsert(true);
            $sql = "INSERT INTO {$this->getTable()} ({$sqlFields}) VALUES ({$sqlValues})";
            $currentFieldValues = $this->getCurrentFieldValues();

            if ($db->init()) {
                if ($db->execute($sql, $currentFieldValues)) {
                    $returnValue = $db->getLastInsertedId();
                    $this->setPrimaryKeyValue($returnValue);
                } else {
                    $returnValue = $db->getError();
                }
            } else {
                $returnValue = $db->getError();
            }
        }

        return $returnValue;
    }

    public function update()
    {
        $returnValue = null;
        $isaReturnValue = null;
        $db = new BaseDatos();
        $isa = $this->getIsa();

        if ($isa !== null) {
            $isaClass = new $isa();
            $isaClass->fill($this->getCurrentFieldValues());
            $isaReturnValue = $isaClass->update();
        }

        if ($isa === null || $isaReturnValue !== null) {
            $sqlFields = $this->getFieldsForUpdate();
            $sql = "UPDATE {$this->getTable()} SET {$sqlFields} WHERE {$this->getPrimaryKey()} = :{$this->getPrimaryKey()}";
            $currentFieldValues = $this->getCurrentFieldValues();

            if ($db->init()) {
                if ($db->execute($sql, $currentFieldValues)) {
                    $returnValue = true;
                } else {
                    $returnValue = $db->getError();
                }
            } else {
                $returnValue = $db->getError();
            }
        }

        return $returnValue;
    }

    public function delete()
    {
        $returnValue = null;
        $isaReturnValue = null;
        $db = new BaseDatos();
        $sql = "DELETE FROM {$this->getTable()} WHERE {$this->getPrimaryKey()} = :{$this->getPrimaryKey()}";
        $primaryKeyValue  = $this->getPrimaryKeyValueForDelete();

        if ($db->init()) {
            if ($db->execute($sql, $primaryKeyValue)) {
                $isa = $this->getIsa();
                $returnValue = true;

                if ($isa !== null) {
                    $isaClass = new $isa();
                    $isaClass->setPrimaryKeyValue($primaryKeyValue);
                    $isaReturnValue = $isaClass->delete() ?? false;
                    $returnValue = $isaReturnValue;
                }
            } else {
                $returnValue = $db->getError();
            }
        } else {
            $returnValue = $db->getError();
        }

        return $returnValue;
    }

    private function processRelation($record)
    {
        $returnValue = $this->processRelations([$record]);

        return $returnValue[0];
    }

    // [Relationship::HasOne => [sensor' => Sensor::class]]
    // [Relationship::HasMany => ['registros' => Registro::class, 'alarmas' => Alarma::class]]
    // [Relationship::HasOne => ['sensor' => Sensor::class], Relationship::HasMany => ['avisos' => Aviso::class]]
    private function processRelations($records)
    {
        $returnValue = $records; // [{}]
        $relations = $this->getRelations();

        if ($relations !== null) {
            foreach ($relations as $key => $relationType) {
                switch ($key) {
                    case Relationship::HasOne:
                        $returnValue = $this->processHasOneRelation($returnValue, $relationType);
                        break;
                    case Relationship::HasMany:
                        $returnValue = $this->processHasManyRelation($returnValue, $relationType);
                        break;
                    case Relationship::HasManyToMany:
                        $returnValue = $this->processHasManyToManyRelation($returnValue, $relationType);
                        break;
                }
            }
        }

        return $returnValue;
    }

    // ['sensor' => Sensor::class, 'otra' => Otra::class]
    private function processHasOneRelation($records, $relationType)
    {
        $returnValue = $records;

        foreach ($relationType as $relationName => $relationClass) {
            $relationObject = new $relationClass();
            $foreignPrimaryKey = $relationObject->getPrimaryKey();
            $foreignKeyValues = array_map(function ($record) use ($foreignPrimaryKey) {
                $method = "get" . ucfirst($foreignPrimaryKey);
                return $record->$method();
            }, $records);

            $relationRecords = $relationObject->list("{$foreignPrimaryKey} IN (" . implode(",", $foreignKeyValues) . ")", includeRelations: false);
            $relationRecordsByPrimaryKey = array_combine($foreignKeyValues, $relationRecords);            
            $returnValue = array_map(function ($record) use ($foreignPrimaryKey, $relationName, $relationRecordsByPrimaryKey) {
                $getter = "get" . ucfirst($foreignPrimaryKey);
                $setter = "set" . ucfirst($relationName);
                $foreignKeyValue = $record->$getter();

                if (isset($relationRecordsByPrimaryKey[$foreignKeyValue])) {
                    $record->$setter($relationRecordsByPrimaryKey[$foreignKeyValue]);
                }

                return $record;
            }, $records);
        }

        return $returnValue;
    }

    // ['registros' => Registro::class, 'alarmas' => Alarma::class]
    private function processHasManyRelation($records, $relationType)
    {
        $returnValue = $records;

        foreach ($relationType as $relationName => $relationClass) {
            $relationObject = new $relationClass();
            $foreignPrimaryKey = $this->getPrimaryKey();
            $primaryKeyValues = array_map(function ($record) {
                return $record->getPrimaryKeyValue();
            }, $records);
            $relationRecords = $relationObject->list("{$foreignPrimaryKey} IN (" . implode(",", $primaryKeyValues) . ")", includeRelations: false);
            $returnValue = array_map(function ($record) use ($foreignPrimaryKey, $relationName, $relationRecords) {
                $setter = "set" . ucfirst($relationName);
                $relationRecordsByForeignKey = array_filter($relationRecords, function ($relationRecord) use ($foreignPrimaryKey, $record) {
                    $getter = "get" . ucfirst($foreignPrimaryKey);
                    $foreignKeyValue = $record->getPrimaryKeyValue();
                    $relationForeignKeyValue = $relationRecord->$getter();

                    return $foreignKeyValue === $relationForeignKeyValue;
                });

                $record->$setter($relationRecordsByForeignKey);

                return $record;
            }, $records);
        }

        return $returnValue;
    }

    // ['avisos' => [Aviso::class, 'w_temperaturasensortemperaturaaviso']]
    private function processHasManyToManyRelation($records, $relationType)
    {
        $returnValue = $records;

        // $relationType = ['avisos' => [Aviso::class, 'w_temperaturasensortemperaturaaviso']]
        foreach ($relationType as $relationName => $relation) {
            // $relation = ['avisos' => Aviso::class, 'pivot' => 'w_temperaturasensortemperaturaaviso']
            list($relationClass, $pivotTable) = $relation;
            $relationObject = new $relationClass();
            $foreignPrimaryKey = $relationObject->getPrimaryKey();
            $primaryKey = $this->getPrimaryKey();
            $primaryKeyValues = array_map(function ($record) {
                return $record->getPrimaryKeyValue();
            }, $records);
            $where = "WHERE {$pivotTable}.{$primaryKey} IN (" . implode(",", $primaryKeyValues) . ")";
            $join = "INNER JOIN {$pivotTable} 
                    ON {$relationObject->getTable()}.{$foreignPrimaryKey} = {$pivotTable}.{$foreignPrimaryKey}";
            $relationRecords = $relationObject->list($where, $join, false);
            $returnValue = array_map(function ($record) use ($foreignPrimaryKey, $relationName, $relationRecords) {
                $setter = "set" . ucfirst($relationName);
                $relationRecordsByForeignKey = array_filter($relationRecords, function ($relationRecord) use ($foreignPrimaryKey, $record) {
                    $getter = "get" . ucfirst($foreignPrimaryKey);
                    $foreignKeyValue = $record->getPrimaryKeyValue();
                    $relationForeignKeyValue = $relationRecord->$getter();

                    return $foreignKeyValue === $relationForeignKeyValue;
                });

                $record->$setter($relationRecordsByForeignKey);

                return $record;
            }, $records);
        }

        return $returnValue;
    }

    private function mapToObject(array $data)
    {
        $className = $this->getClassName();
        $object = new $className();
        $fields = $object->getFields();

        foreach ($fields as $field) {
            $method = "set" . ucfirst($field);

            if (isset($data[$field])) {
                $object->$method($data[$field]);
            }
        }

        return $object;
    }

    public function makeSelectStatement()
    {
        $sql = "SELECT * FROM {$this->getTable()}";
        $isa = $this->getIsa();

        if ($isa !== null) {
            $isaClass = new $isa();
            $isaTableName = $isaClass->getTable();
            $sql .= " INNER JOIN {$isaTableName} ON {$isaTableName}.{$isaClass->getPrimaryKey()} = {$this->getTable()}.{$this->getPrimaryKey()}";
        }

        return $sql;
    }

    private function getActualFields()
    {
        $fields = $this->getFields();
        $isa = $this->getIsa();

        if ($isa !== null) {
            $isaClass = new $isa();
            $isaFields = $isaClass->getFields();
            $fields = array_diff($fields, $isaFields);
        }

        return $fields;
    }

    private function makeFieldsForInsert($forValues = false)
    {
        $fields = $this->getActualFields();
        $primaryKey = $this->getPrimaryKey();
        $autoIncrement = $this->getAutoIncrement();

        $returnValue = array_map(function ($field) use ($forValues, $primaryKey, $autoIncrement) {
            $returnField =  $forValues ? ":{$field}" : $field;;

            if ($autoIncrement) {
                if ($field === $primaryKey) {
                    $returnField = null;
                }
            }

            return $returnField;
        }, $fields);

        return implode(',', array_filter($returnValue));
    }

    private function getCurrentFieldValues()
    {
        $fields = $this->getActualFields();
        $returnValue = [];

        foreach ($fields as $field) {
            $method = "get" . ucfirst($field);
            $returnValue[":{$field}"] = $this->$method();
        }

        return $returnValue;
    }

    private function getFieldsForUpdate()
    {
        $fields = $this->getActualFields();
        $returnValue = [];

        foreach ($fields as $field) {
            if ($field !== $this->getPrimaryKey()) {
                $returnValue[] = "{$field} = :{$field}";
            }
        }

        return implode(",", $returnValue);
    }

    private function getPrimaryKeyValueForDelete()
    {
        return [":{$this->getPrimaryKey()}" => $this->getPrimaryKeyValue()];
    }
}
