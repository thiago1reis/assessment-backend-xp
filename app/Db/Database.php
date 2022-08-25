<?php 

namespace App\DB;
use \PDO;
use PDOException;

class Database{
    // const HOST = 'localhost';
    // const NAME = 'assessment_backend_xp';
    // const USER = 'root';
    // const PASS = '';
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

}