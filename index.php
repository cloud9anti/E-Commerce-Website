<?php
// Initialize the session
session_start();

//require 'conndb.php';

//Include people table
$sql = 'SELECT * FROM people WHERE active="Active"';

$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);

//Include products table
$sql = 'SELECT * FROM products';

$statement = $connection->prepare($sql);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_OBJ);


//Include groups table
$sql = 'SELECT DISTINCT groups FROM products';

$statement = $connection->prepare($sql);
$statement->execute();
$productGroups = $statement->fetchAll(PDO::FETCH_OBJ);

//Include area table
$sql = 'SELECT DISTINCT groups FROM people';

$statement = $connection->prepare($sql);
$statement->execute();
$areaGroups = $statement->fetchAll(PDO::FETCH_OBJ);

//Include community table
$sql = 'SELECT DISTINCT community FROM people';

$statement = $connection->prepare($sql);
$statement->execute();
$communityGroups = $statement->fetchAll(PDO::FETCH_OBJ);

//Include category table
$sql = 'SELECT DISTINCT category FROM products';

$statement = $connection->prepare($sql);
$statement->execute();
$categoryGroups = $statement->fetchAll(PDO::FETCH_OBJ);

//Include subcategory table
$sql = 'SELECT DISTINCT subcategory FROM products';

$statement = $connection->prepare($sql);
$statement->execute();
$subcategoryGroups = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>
<?php require 'header.php'; ?>




<!--Browse By-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>What are you looking for?</h2>
    </div>
    <div class="card-body">
      <table class="table-bordered" style="display: inline-block;" >
		
		<!--Browse By Areas-->
         <th> Browse by Area </th>

			<?php foreach($areaGroups as $person): ?>

			<tr>
				<td><a href="displayGroups.php?groups=<?= $person->groups ?>" >  <?= $person->groups; ?> </a></td>
			</tr>


        <?php endforeach; ?>

      </table>

     <table class="table-bordered" style="display: inline-block;">
		
		<!--Browse By Community-->
	        <th> Browse by Communities</th>

			<?php foreach($communityGroups as $person): ?>

			<tr>
				<td><a href="displayCommunities.php?community=<?= $person->community ?>" >  <?= $person->community; ?> </a></td>
			</tr>


        <?php endforeach; ?>

      </table>

     <table class="table-bordered" style="display: inline-block;">
		
		<!--Browse By Shops-->
	        <th> Browse by Shops </th>

			<?php foreach($people as $person): ?>

			<tr>
				<td><a href="displayBPS.php?name=<?= $person->name ?>" >  <?= $person->name; ?> </a></td>
			</tr>


        <?php endforeach; ?>

      </table>

     <table class="table-bordered" style="display: inline-block;">
		
		<!--Browse By Product Group-->
	        <th> Browse by Product Group </th>

			<?php foreach($productGroups as $person): ?>

			<tr>
				<td><a href="productCategory.php?groups=<?= $person->groups ?>" >  <?= $person->groups; ?> </a></td>
			</tr>


        <?php endforeach; ?>

      </table>

     <table class="table-bordered" style="display: inline-block;">
		
		<!--Browse By Category-->
	        <th> Browse by Category </th>

			<?php foreach($categoryGroups as $person): ?>

			<tr>
				<td><a href="productSubcategory.php?category=<?= $person->category ?>" >  <?= $person->category; ?> </a></td>
			</tr>


        <?php endforeach; ?>

      </table>

     <table class="table-bordered" style="display: inline-block;">
		
		<!--Browse By Subcategory-->
	        <th> Browse by Subcategory </th>

			<?php foreach($subcategoryGroups as $person): ?>

			<tr>
				<td><a href="productSubcategoryDisplay.php?subcategory=<?= $person->subcategory ?>" >  <?= $person->subcategory; ?> </a></td>
			</tr>


        <?php endforeach; ?>

      </table>


    </div>
  </div>
</div>


<!--All Products with images created in a stack-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<div class="row">

    <div class="container" style="width:600px;">

      <?php foreach($products as $person):?>

      <div class="col-md-4">

        <div class="thumbnail"> <img src="<?= $person->image?>" alt="Lights">

          <div class="caption">

            <p style="text-align:center;"><?= $person->name ?></p>

            <p style="text-align:center;color:#04B745;"><b>$<?= $person->price ?></b></p>


			
			<!-- Button currently sends you to the cart -->

            <form method="post" action="cart.php?action=addcart"> 

              <p style="text-align:center;color:#04B745;">

                <button type="submit" class="btn btn-warning">Add To Cart</button>

                <input type="hidden" name="Product_ID" value="<?= $person->Product_ID?>">

              </p>

            </form>

          </div>

        </div>

      </div>

      <?php endforeach;?>

    </div>

  </div>





<!--All Products-->
<!--
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All Products</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
          <tr>
            <th> Product Name </td>
			<th> Product ID </th>

          </tr>

        <?php foreach($products as $person): ?>

          <tr>
            <td> <?= $person->name ?></td>
			<td> <?= $person->Product_ID ?></td>

          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>

-->