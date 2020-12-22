<?php

// Initialize the session
session_start();

require 'conndb.php';
$groups = $_GET['groups'];

//$sql = 'SELECT * FROM products WHERE groups=:groups';
$sql = 'SELECT DISTINCT category FROM products WHERE groups =:groups';

$statement = $connection->prepare($sql);
$statement->execute([':groups' => $groups ]);
$productGroups = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>
<?php require 'header.php'; ?>

<!--All from this group-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Everything from the group [<?= $groups ?>] </h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
		  <th>Category</th>
        </tr>
        <?php foreach($productGroups as $person): ?>

          <tr>

			  <td><a href="productSubcategory.php?category=<?= $person->category ?>" >  <?= $person->category; ?> </a></td>
        
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
