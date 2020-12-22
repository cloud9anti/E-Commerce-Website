<?php

// Initialize the session
session_start();

require 'conndb.php';
$category = $_GET['category'];

$sql = 'SELECT DISTINCT subcategory FROM products WHERE category =:category';

$statement = $connection->prepare($sql);
$statement->execute([':category' => $category ]);
$productCategory = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>
<?php require 'header.php'; ?>

<!--All from this group-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Everything from the category [<?= $category ?>] </h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
		  <th>Subcategories</th>
        </tr>
        <?php foreach($productCategory as $person): ?>

          <tr>

			  <td><a href="productSubcategoryDisplay.php?subcategory=<?= $person->subcategory ?>" >  <?= $person->subcategory; ?> </a></td>
        
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
