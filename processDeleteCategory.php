<?php 
require __DIR__.'/vendor/autoload.php';
use \App\Entity\Category;
//Validação do ID
if(!$_GET['id'] or !is_numeric($_GET['id'])){
    header('location: categories.php');
}

//Instacia a clase categoria
$category = new Category;
$category->id = $_GET['id'];
$category->deleteCategory();

//Retorna a lista de categorias com menssagem de sucesso
echo"<script>
    window.alert('Categoria deletada com sucesso!')
    window.location.href='categories.php';
</script>";
exit;
