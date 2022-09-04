<?php
require __DIR__.'/vendor/autoload.php';

use \App\Entity\Product;

$products = Product::getProducts();

$tableData = '';

foreach($products as $product){
    $tableData .= '<tr class="data-row">
                      <td class="data-grid-td">
                        <span class="data-grid-cell-content">'.$product->name.'</span>
                      </td>
                      <td class="data-grid-td">
                        <span class="data-grid-cell-content">'.$product->sku.'</span>
                      </td>
                      <td class="data-grid-td">
                        <span class="data-grid-cell-content">'.$product->price.'</span>
                      </td>
                      <td class="data-grid-td">
                        <span class="data-grid-cell-content">'.$product->quantity.'</span>
                      </td>
                      <td class="data-grid-td">
                        <span class="data-grid-cell-content"></span>
                      </td>
                      <td class="data-grid-td">
                        <div class="actions">
                          <div class="action edit"><a href="editProduct.php?id='.$product->id.'">Edit</a></div>
                          <div class="action delete"><a href="processDeleteProduct.php?id='.$product->id.'">Delete</a></div>
                        </div>
                      </td>
                  </tr>';
  }

include __DIR__.'/includes/header.php';
?>
<!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Products</h1>
      <a href="addProduct.php" class="btn-action">Add new Product</a>
    </div>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">SKU</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Price</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Quantity</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Categories</span>
        </th>

        <th class="data-grid-th">
            <span class="data-grid-cell-content">Actions</span>
        </th>
      </tr>
      <?=$tableData?>
    </table>
  </main>
<!-- Main Content -->
<?php 
include __DIR__.'/includes/footer.php';
?>   