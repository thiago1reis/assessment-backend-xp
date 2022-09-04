<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Product{
    public $id;
    public $sku;
    public $name;
    public $price;
    public $quantity;
    public $description;

    //Método para cadastrar produto
    public function createProduct(){
        $product = new Database('products');
        $this->id = $product->insert([
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
        ]);
        return $this->id;
    }

    //Método para atualizar produto
    public function updateProduct(){
        return (new Database('products'))->update('id = '.$this->id,[
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'description' => $this->description,
        ]);
    }

    //Método para deletar produto do banco 
    public function deleteProduct(){
        return (new Database('products'))->delete('id = '.$this->id);
    } 

    //Método para verificar se sku já existe 
    public static function verifySku($sku){ 
       $result = (new Database('products'))->exist('sku = '.$sku)->fetchAll(PDO::FETCH_ASSOC);
       if(count($result) == 1){
           return true; 
       }else{
           return false;
       }
    }
    
    //Método para listar produtos
    public static function getProducts($where = null){
        return (new Database('products'))->select($where)->fetchAll(PDO::FETCH_CLASS,self::class);
    }
    
    //Método para buscar um produtodo por ID
    public static function getProduct($id){
        return (new Database('products'))->select('id = '.$id)->fetchObject(self::class);
    }

}
