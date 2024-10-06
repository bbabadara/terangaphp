<?php

namespace Bba\Core\Model;

class CoreModel
{
    protected \PDO|null $pdo = null;
    protected $table;
    protected $primaryKey;

    public function __construct()
    {
        if ($this->pdo == null) {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=teranga;charset=utf8', 'teranga', 'teranga123');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        }
    }

    public function doSelect(string $sql, bool $one = false)
    {
        $result = $this->pdo->query($sql);
        if ($one) {
            return $result->fetch();
        }
        return $result->fetchAll();
    }
    public function doInsert( array $data)
    {
        $columns = array_keys($data);
        $placeholders = array_map(function ($key) {
            return ":$key";
        }, $columns);
        $sql = "INSERT INTO $this->table (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholders) . ")";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
   


    public function selectALL()
    {
        $sql = "SELECT * FROM $this->table";
        return $this->doSelect($sql);
    }

    public function selectById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey =$id";
        return $this->doSelect($sql,  true);
    }
 
    public function doUpdate($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

    }
}
