<?php 
require __DIR__.'/vendor/autoload.php';
    
use \App\Entity\Product;
use App\Entity\ProductCategories;

// foreach( $_POST['category'] as $category){
//     echo $category;
// }
// exit;

if($_POST['sku'] and $_POST['name'] and $_POST['price'] and $_POST['quantity'] and $_POST['category'] and $_POST['description']){ 
    
    $obProduct = new Product;
    $obProduct->sku = $_POST['sku'];
    $obProduct->name = $_POST['name'];
    $obProduct->price = $_POST['price'];
    $obProduct->quantity = $_POST['quantity'];
    $obProduct->description = $_POST['description'];
    $obProduct->createProduct();
    
    // echo "<pre>"; print_r($obProduct->id); echo "</pre>"; exit;
    $ProductCategories = new ProductCategories;
    $ProductCategories->product_id = $obProduct->id;
    foreach( $_POST['category'] as $category){
        $ProductCategories->category_id = $category;
        $ProductCategories->setCategories();
    }
      
}else{
    echo"<script>
            window.alert('Preencha o formulário corretamente!')
            window.location.href='addProduct.php';
        </script>";    
}
