<?php 

namespace App\Db;
use \PDO;
use PDOException;

class Database{
    private $table; 
    private $connection;

    public function __construct($table = null){
        $this->table = $table;
        $this->seteConnection();
    }

    private function seteConnection(){
        try{
            $this->connection = new PDO("mysql:host=localhost;dbname=assessment_backend_xp", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    public function execute($query, $params = []){
        try{
          $statement = $this->connection->prepare($query);
          $statement->execute($params);
          return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    public function insert($values){
        $statement = $this->connection->prepare('INSERT INTO '.$this->table.' (name, sku, price, description, quantity) VALUES (:name, :sku, :price, :description, :quantity)');
        $statement->execute(array(
            ':name' => $values['name'],
            ':sku' => $values['sku'],
            ':price' => $values['price'],
            ':description' => $values['description'],
            ':quantity' => $values['quantity']
        ));
        return $this->connection->lastInsertId();
    }

    public function select(){
        $query = 'SELECT * FROM '.$this->table.'';
        return $this->execute($query);
    }


}