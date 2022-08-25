<?php

namespace App\Entity;

use App\Db\Database;

class Product{
    public $id;
    public $sku;
    public $name;
    public $price;
    public $description;
    public $quantity;

    public function create(){

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


}
