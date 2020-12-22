<?php
require 'conndb.php';

// Initialize the session
session_start();


$Vendor_ID = $_SESSION["vendor"];


$sql = "SELECT * FROM people WHERE id = '$Vendor_ID'";

//Include people table
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);



//Include products table
$sql = "SELECT * FROM products WHERE Vendor_ID = '$Vendor_ID'";

$statement = $connection->prepare($sql);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>
<?php require 'header.php'; ?>

<!--All BPS-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All BPS</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>BPS</th>
		  <th>Action</th>
		  <th>Active</th>
          <th>Group</th>
		  <th>Community</th>
          <th>Venue</th>
          <th>Industry</th>
		  <th>Category</th>
          <th>Subcategory</th>
		  <th>Action</th>
        </tr>
        <?php foreach($people as $person): ?>

          <tr>
            <td> <a href="displayBPS.php?name=<?= $person->name ?>" >  <?= $person->name; ?> </a> </td>
			<td> <a href="editShop.php?id=<?= $person->id ?>" class="btn btn-info">Edit Shop</a> </td>
            
			<td><?= $person->active; ?></td>
            <td><a href="displayGroups.php?groups=<?= $person->groups ?>" >  <?= $person->groups; ?> </a></td>
            <td><a href="displayCommunities.php?community=<?= $person->community ?>" >  <?= $person->community; ?> </a></td>
            <td><a href="displayVenues.php?venue=<?= $person->venue ?>" >  <?= $person->venue; ?> </a></td>
			<td><?= $person->industry ?> </td>
			<td><?= $person->category ?> </td>
			<td><?= $person->subcategory ?> </td>
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
        
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>


<!--All Products-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All Products</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
          <tr>
		  <th>Product ID</th>
		  <th>Vendor ID</th>
          <th>Name</th>
		  <th>Details</th>
          <th>SKU</th>

          </tr>

        <?php foreach($products as $person): ?>

          <tr>
			<td><?= $person->Product_ID ?> </td>
			<td><?= $person->Vendor_ID ?> </td>
			<td><?= $person->name ?> </td>
			<td><?= $person->details ?> </td>
			<td><?= $person->sku ?> </td>

          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>