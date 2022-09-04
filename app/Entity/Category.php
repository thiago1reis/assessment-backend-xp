<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Category{
    public $id;
    public $name;
    public $code;

    //Método para cadastrar categoria
    public function createCategory(){
        return (new Database('categories'))->insert([
            'name' => $this->name,
            'code' => $this->code,
        ]);
    }

    //Método para atualizar categoria
    public function updateCategory(){
        return (new Database('categories'))->update('id = '.$this->id,[
            'name' => $this->name,
            'code' => $this->code,
        ]);
    }

    //Método para deletar categoria do banco 
    public function deleteCategory(){
        return (new Database('categories'))->delete('id = '.$this->id);
    } 

    //Método para verificar se código já existe 
    public static function verifyCode($code){ 
        $result = (new Database('categories'))->exist('code = '.$code)->fetchAll(PDO::FETCH_ASSOC);
        if(count($result) == 1){
            return true; 
        }else{
            return false;
        }
    }

    //Método para listar categorias
    public static function getCategories($where = null){
        return (new Database('categories'))->select($where)->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    //Método para buscar uma categoria por ID
    public static function getCategory($id){
        return (new Database('categories'))->select('id = '.$id)->fetchObject(self::class);
    }
}    