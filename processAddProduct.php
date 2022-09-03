<?php 
require __DIR__.'/vendor/autoload.php';
use \App\Entity\Product;
use App\Entity\ProductCategories;

//Verifica se os campos foram informados
if($_POST['sku'] and $_POST['name'] and $_POST['price'] and $_POST['quantity'] and $_POST['category'] and $_POST['description']){ 
    
    $obProduct = new Product;
    $obProduct->sku = $_POST['sku'];
    $obProduct->name = $_POST['name'];
    $obProduct->price = $_POST['price'];
    $obProduct->quantity = $_POST['quantity'];
    $obProduct->description = $_POST['description'];

    //Verifa se SKU informardo já existe!
    if($obProduct->verifySku($obProduct->sku)){
        echo"<script>
            window.alert('Esse SKU pertence a outro produto!')
            window.location.href='addProduct.php';
        </script>";
        exit;
    }

    //Cadastra Produto
    $obProduct->createProduct();

    //Define as categorias do produto cadastrado 
    $ProductCategories = new ProductCategories;
    $ProductCategories->product_id = $obProduct->id;
    foreach( $_POST['category'] as $category){
        $ProductCategories->category_id = $category;
        $ProductCategories->setCategories();
    }

    //Retorna a lista de produtos com menssagem de sucesso
    echo"<script>
            window.alert('Produto cadastrado com sucesso!')
            window.location.href='products.php';
        </script>";
    exit;

}else{
    //Retorna ao formulário com menssagem caso não tenha preenchido todos os campos
    echo"<script>
            window.alert('Preencha o formulário corretamente!')
            window.location.href='addProduct.php';
        </script>"; 
    exit;       
}
