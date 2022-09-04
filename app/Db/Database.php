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

    //Método para definir a conexão  
    private function setConnection(){
        try{
            $this->connection = new PDO("mysql:host=localhost;dbname=assessment_backend_xp", "root", "");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    //Método para executar as query 
    public function execute($query, $params = []){
        try{
          //Prepara a query recebia  
          $statement = $this->connection->prepare($query);
          //Executa a query recebida com os parametros recebidos
          $statement->execute($params);
          return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }

    //Método para cadastar dados no banco
    public function insert($values){
        //Dados da query
        $fields = array_keys($values);
        $binds = array_pad([],count($fields), '?');
        //Monta query 
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        //Executa query
        $this->execute($query,array_values($values));
        //Retorna ID do dados cadastrados
        return $this->connection->lastInsertId();
    }

    //Método para atualizar dados no banco
    public function update($where, $values){
        //Dados da query
        $fields = array_keys($values);
        //Monta query 
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
        //Executa query
        $this->execute($query,array_values($values));
        //Retorna sucesso    
        return true;
    }

    //Método para selecionar dados no banco
    public function select($where = null, $fields = '*'){
        //Dados da query
        $where = strlen($where) ? 'WHERE '.$where : '';
        //Monta query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.'';
        //Executa query
        return $this->execute($query);
    }

    //Metodo para deletar registro no banco
    public function delete($where){
        //Monta query
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        //Executa query
        $this->execute($query);
        //Retorna sucesso  
        return true;
    }

    //Metodo para verificar se dado exite no banco
    public function exist($where){
        //Monta query
        $query = 'SELECT * FROM '.$this->table.' WHERE '.$where; 
        //Executa query
        return $this->execute($query);
    }
}