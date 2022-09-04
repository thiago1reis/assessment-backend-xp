<?php

namespace App\Entity;

use App\Db\Database;

class ProductCategories{
    public $product_id;
    public $category_id;

    public function setCategories(){
        $ProductCategories = new Database('product_has_categories');
        $ProductCategories->insert([
            'product_id' => $this->product_id,
            'category_id' => $this->category_id,
        ]);
        return true;
    }
}
