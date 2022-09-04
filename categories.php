<?php
require __DIR__.'/vendor/autoload.php';

use App\Entity\Category;

$categories = Category::getCategories();

$tableData = '';

foreach($categories as $category){
    $tableData .= '<tr class="data-row">
                      <td class="data-grid-td">
                        <span class="data-grid-cell-content">'.$category->name.'</span>
                      </td>
                      <td class="data-grid-td">
                        <span class="data-grid-cell-content">'.$category->code.'</span>
                      </td>
                      <td class="data-grid-td">
                        <div class="actions">
                          <div class="action edit"><a href="editCategory.php?id='.$category->id.'">Edit</a></div>
                          <div class="action delete"><a href="processDeleteCategory.php?id='.$category->id.'">Delete</a></div>
                        </div>
                      </td>
                  </tr>';
  }

include __DIR__.'/includes/header.php';
?>  
  <!-- Main Content -->
  <main class="content">
    <div class="header-list-page">
      <h1 class="title">Categories</h1>
      <a href="addCategory.php" class="btn-action">Add new Category</a>
    </div>
    <table class="data-grid">
      <tr class="data-row">
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Name</span>
        </th>
        <th class="data-grid-th">
            <span class="data-grid-cell-content">Code</span>
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