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
       // echo "<pre>"; print_r($this->id); echo "</pre>"; exit;
    }

  
    public static function getProducts(){
        return (new Database('products'))->select()->fetchAll(PDO::FETCH_CLASS,self::class);
    }


   public static function getProduct($id){
    return (new Database('products'))->find($id);
   }


}
