<?php 

namespace App\Db;
use \PDO;
use PDOException;

class Database{
    private $table; 
    private $connection;

    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection(){
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
        $filds = array_keys($values);
        $binds = array_pad([],count($filds), '?');
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$filds).') VALUES ('.implode(',',$binds).')';
        $this->execute($query,array_values($values));
        return $this->connection->lastInsertId();
    }

    public function select($where = null, $filds = '*'){
        //Dados da query
        $where = strlen($where) ? 'WHERE '.$where : '';
        //Monta query
        $query = 'SELECT '.$filds.' FROM '.$this->table.' '.$where.'';
        //Executa query
        return $this->execute($query);
    }


    // public function find($sku){
    //     $query = 'SELECT FROM '.$this->table.' WHERE sku = '.$sku.'';
    //     return $this->execute($query);
    // }

    public function exist($column, $data){
        $query = 'SELECT * FROM '.$this->table.' WHERE '.$column.' = '.$data.'';   
        return $this->execute($query);
    }

}