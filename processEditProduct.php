<?php 
require __DIR__.'/vendor/autoload.php';
use \App\Entity\Product;

//Verifica se os campos foram informados
if($_POST['sku'] and $_POST['name'] and $_POST['price'] and $_POST['quantity'] and $_POST['description']){
    $product = new Product;
    $product->id = $_POST['id'];
    $product->sku = $_POST['sku'];
    $product->name = $_POST['name'];
    $product->price = $_POST['price'];
    $product->quantity = $_POST['quantity'];
    $product->description = $_POST['description'];
    $product->updateProduct();

    //Retorna a lista de produtos com menssagem de sucesso
    echo"<script>
            window.alert('Produto editado com sucesso!')
            window.location.href='products.php';
        </script>";
    exit;
}else{
    //Retorna ao formulário com menssagem caso não tenha preenchido todos os campos
    echo"<script>
            window.alert('Preencha o formulário corretamente!')
            window.location.href='editProduct.php?id=".$_POST['id']."';
        </script>"; 
    exit;       
}