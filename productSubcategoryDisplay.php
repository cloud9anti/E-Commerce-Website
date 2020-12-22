<?php

// Initialize the session
session_start();

require 'conndb.php';
$subcategory = $_GET['subcategory'];

$sql = 'SELECT * FROM products WHERE subcategory =:subcategory';

$statement = $connection->prepare($sql);
$statement->execute([':subcategory' => $subcategory ]);
$productSubcategory = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>
<?php require 'header.php'; ?>

<!--All from this group-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Everything from the subcategory [<?= $subcategory ?>] </h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
		  <th>Products</th>
			<th> Vendor ID </th>
        </tr>
        <?php foreach($productSubcategory as $person): ?>

          <tr>

			  <td>	<a href="displayProducts.php?id=<?= $person->Product_ID ?>" >  <?= $person->name; ?> </a></td>

			<td><?= $person->Vendor_ID ?> </td>
        
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
