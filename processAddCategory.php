<?php
require __DIR__.'/vendor/autoload.php';
use App\Entity\Category;

//Verifica se os campos foram informados
if($_POST['name'] and $_POST['code']){
    $category = new Category;
    $category->name = $_POST['name'];
    $category->code = $_POST['code'];

    //Verifa se Codigo informardo já existe!
    if($category->verifyCode($category->code)){
        echo"<script>
            window.alert('Esse código pertence a outra categoria!')
            window.location.href='addCategory.php';
        </script>";
        exit;
    }

    //Cadastra Categoria
    $category->createCategory();
    
    //Retorna a lista de categorias com menssagem de sucesso
    echo"<script>
            window.alert('Categoria cadastrada com sucesso!')
            window.location.href='categories.php';
        </script>";
    exit;
}else{
    //Retorna ao formulário com menssagem caso não tenha preenchido todos os campos
    echo"<script>
            window.alert('Preencha o formulário corretamente!')
            window.location.href='addCategory.php';
        </script>"; 
    exit; 
}



