<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Product;

if(isset($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['quantity'], $_POST['description'],)){ 
    $obProduct = new Product;
    $obProduct->sku = $_POST['sku'];
    $obProduct->name = $_POST['name'];
    $obProduct->price = $_POST['price'];
    $obProduct->quantity = $_POST['quantity'];

    $obProduct->description = $_POST['description'];

  
    $obProduct->create();
}