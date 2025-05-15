<?php

namespace App\Modelo;

abstract class Modelo
{
    private $className;
    private $table;
    private $fields;
    private $primaryKey;
    private $autoIncrement;
    private $isa;

    public function __construct($className, $table, $fields, $primaryKey, $autoIncrement = true, $isa = null)
    {
        $this->className = $className;
        $this->table = $table;
        $this->fields = $fields;
        $this->primaryKey = $primaryKey;
        $this->autoIncrement = $autoIncrement;
        $this->isa = $isa;
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

    public function list($condition = "")
    {
        $returnValue = null;
        $db = new BaseDatos();
        $sql = $this->makeSelectStatement(); //"SELECT * FROM {$this->getTable()}";

        if ($condition !== "") {
            $sql .= " WHERE {$condition}";
        }

        if ($db->init()) {
            if ($db->execute($sql)) {
                $data = $db->getAllRecords();
                $returnValue = array_map(function ($record) {
                    return $this->mapToObject($record);
                }, $data);
            } else {
                $returnValue = $db->getError();
            }
        } else {
            $returnValue = $db->getError();
        }

        return $returnValue;
    }

    public function find($id)
    {
        $returnValue = null;
        $db = new BaseDatos();
        $sql = "{$this->makeSelectStatement()} where {$this->getPrimaryKey()} = :id";

        if ($db->init()) {
            if ($db->execute($sql, [":id" => $id])) {
                $record = $db->getSingleRecord();
                $returnValue = $this->mapToObject($record);
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

        if ($isa === null || $isaReturnValue!== null) {
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
        $primaryKeyValue  = $this->getPrimaryKeyValue();

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

    private function makeSelectStatement()
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

    private function getPrimaryKeyValue()
    {
        $primaryKey = $this->getPrimaryKey();
        $method = "get" . ucfirst($primaryKey);
        return [":{$this->getPrimaryKey()}" => $this->$method()];
    }
}
