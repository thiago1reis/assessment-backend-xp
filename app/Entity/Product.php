<?php

namespace App\Entity;

use App\Db\Database;
use PDO;

class Product{
    public $id;
    public $sku;
    public $name;
    public $price;
    public $description;
    public $quantity;

    public function createProducs(){
       
        $obDatabase = new Database('products');
        $obDatabase->insert([
            'sku' => $this->sku,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'quantity' => $this->quantity
        ]);
        return print_r($obDatabase);
    }

    public static function getProducts(){
        return (new Database('products'))->select()->fetchAll(PDO::FETCH_CLASS,self::class);
    }


}
