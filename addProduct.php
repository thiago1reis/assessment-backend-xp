<?php
require __DIR__.'/vendor/autoload.php';

use App\Entity\Category;

//Instacia categorias
$categories = Category::getCategories();

$options = '';

//Opções de categorias para o formulario
foreach($categories as $category){
  $options .= ' <option value="'.$category->id.'">'.$category->name.'</option>';
}

include __DIR__.'/includes/header.php';
?>
<!-- Main Content -->
<main class="content">
    <h1 class="title new-item">New Product</h1>
    <form method="POST" action="processAddProduct.php"> 
      <div class="input-field">
        <label for="sku" class="label">Product SKU</label>
        <input type="number" id="sku" name="sku" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="name" class="label">Product Name</label>
        <input type="text" id="name" name="name" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="price" class="label">Price</label>
        <input type="text" id="price" name="price" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="quantity" class="label">Quantity</label>
        <input type="number" id="quantity" name="quantity" class="input-text" /> 
      </div>
      <div class="input-field">
        <label for="category" class="label">Categories</label>
        <select multiple id="category" name="category[]" class="input-text">
          <?=$options?>
        </select>
      </div>
      <div class="input-field">
        <label for="description" class="label">Description</label>
        <textarea id="description" name="description" class="input-text"></textarea>
      </div>
      <div class="actions-form">
        <a href="products.php" class="action back">Back</a>
        <input class="btn-submit btn-action" type="submit" value="Save Product" />
      </div>
      
    </form>
  </main>
<!-- Main Content -->
<?php 
include __DIR__.'/includes/footer.php';
?>