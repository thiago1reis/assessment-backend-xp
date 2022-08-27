<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Product;

if($_POST['sku'] and $_POST['name'] and $_POST['price'] and $_POST['quantity'] and $_POST['description']){ 
    $obProduct = new Product;
    $obProduct->sku = $_POST['sku'];
    $obProduct->name = $_POST['name'];
    $obProduct->price = $_POST['price'];
    $obProduct->quantity = $_POST['quantity'];

    $obProduct->description = $_POST['description'];

  
    $obProduct->createProducs();
}else{
    echo 'Preencha o formulário';
}