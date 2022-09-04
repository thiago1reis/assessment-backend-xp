<?php 
require __DIR__.'/vendor/autoload.php';

use App\Entity\Category;
   
//Validação do ID
if(!$_GET['id'] or !is_numeric($_GET['id'])){
    header('location: categories.php');
}

//Instacia categoria
$category = Category::getCategory($_GET['id']);    

//Valida categoria
if(!$category instanceof Category){
    header('location: categories.php');
}

include __DIR__.'/includes/header.php';
?>  
  <!-- Main Content -->
  <main class="content">
    <h1 class="title new-item">Edit Category</h1>
    <form method="POST" action="processEditCategory.php">
      <input type="hidden" id="id" name="id" value="<?=$category->id?>" />  
      <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input type="text" id="name" name="name" class="input-text" value="<?=$category->name?>" />
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Category Code</label>
        <input type="number" id="code" name="code" class="input-text" value="<?=$category->code?>" />
      </div>
      <div class="actions-form">
        <a href="categories.php" class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit" value="Save" />
      </div>
    </form>
  </main>
  <!-- Main Content -->
<?php 
include __DIR__.'/includes/footer.php';
?>   