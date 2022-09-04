<?php 
require __DIR__.'/vendor/autoload.php';
use \App\Entity\Category;

//Verifica se os campos foram informados
if($_POST['name'] and $_POST['code']){
    $category = new Category;
    $category->id = $_POST['id'];
    $category->name = $_POST['name'];
    $category->code = $_POST['code'];
    $category->updateCategory();

    //Retorna a lista de produtos com menssagem de sucesso
    echo"<script>
            window.alert('Categoria editada com sucesso!')
            window.location.href='categories.php';
        </script>";
    exit;
}else{
    //Retorna ao formulário com menssagem caso não tenha preenchido todos os campos
    echo"<script>
            window.alert('Preencha o formulário corretamente!')
            window.location.href='editCategory.php?id=".$_POST['id']."';
        </script>"; 
    exit;       
}    
