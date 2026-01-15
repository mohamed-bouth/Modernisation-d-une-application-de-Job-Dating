<?php 

namespace Models;

use Core\Database;

use PDO;


abstract class BaseModel{
    protected $pdo;
    protected $tableName;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function create($data){
        $colus = array_keys($data);
        $columns = implode(', ' , $colus);

        $valus = array_values($data);

        $array = array_fill(0, count($colus) , '?');
        $num = implode(', ' ,$array);

        $sql = 'INSERT INTO ' . $this->tableName . ' (' . $columns . ') VALUES (' . $num . ');';
        $stmt = $this->pdo->prepare($sql);
        $stmt ->execute($valus);
    }

    public function update($id , $data){
        $colus = array_keys($data);
        $columns = implode(' = ? , ' , $colus);

        $valus = array_values($data);

        array_push($valus, $id);

        $sql = 'UPDATE ' . $this->tableName . ' SET ' . $columns .' = ? WHERE id = ? ;';
        $stmt = $this->pdo->prepare($sql);
        $stmt ->execute($valus);
    }

    public function delete($id){
        $sql = 'DELETE FROM ' . $this->tableName . ' WHERE id = ? ;';
        $stmt = $this->pdo->prepare($sql);
        $stmt ->execute([$id]);
    }

    public function findById($id){
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE id = ? ;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

        public function findByEmail($email){
        $sql = 'SELECT * FROM ' . $this->tableName . ' WHERE email = ? ;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }

    public function all($num , $after){
        $sql = 'SELECT * FROM ' . $this->tableName . ' LIMIT ? OFFSET ? ;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(1, $num, PDO::PARAM_INT);
        $stmt->bindValue(2, $after, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
}