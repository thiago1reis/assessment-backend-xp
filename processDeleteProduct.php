<?php 
require __DIR__.'/vendor/autoload.php';
use \App\Entity\Product;
//Validação do ID
if(!$_GET['id'] or !is_numeric($_GET['id'])){
    header('location: products.php');
}

//Instacia a clase produto
$product = new Product;
$product->id = $_GET['id'];
$product->deleteProduct();

//Retorna a lista de produtos com menssagem de sucesso
echo"<script>
    window.alert('Produto deletado com sucesso!')
    window.location.href='products.php';
</script>";
exit;



