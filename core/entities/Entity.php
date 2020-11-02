<?php
include_once dirname(__FILE__) . '/../DBConnector.php';

class Entity {
    protected $dbConnectionInstance;
    protected $table;
    protected $fillables;

    public function get($id) {
        $records = $this->dbConnectionInstance->query('SELECT * FROM '.$this->table.' where id = '.$id);
        return $records->fetch();
    }

    public function getAll() {
        $records = $this->dbConnectionInstance->query('SELECT * FROM '.$this->table);
        return $records->fetchAll();
    }

    public function save() {
        $fieldsSql = "";
        $bindSql = "";
        $values = [];
        foreach ($this->fillables as $field) {
            if ($this->$field) {
                $fieldsSql .= $field.',';
                $bindSql .= "?,";
                $values[] = $this->$field;
            }
        }
        $sql = 'INSERT INTO '.$this->table.' ('.rtrim($fieldsSql, ",").') VALUES ('.rtrim($bindSql, ",").')'; 
        $this->dbConnectionInstance->prepare($sql)->execute($values);
    }
    
    public function getWhere($filters){        
        $where = "WHERE 1 = 1";
        foreach ($filters as $key => $value) {
            $where .= " AND $key='$value'";
        }
        $sql = 'SELECT * FROM '.$this->table.' '.$where;
        $records = $this->dbConnectionInstance->query($sql);
        return $records->fetchAll();
    }
}
