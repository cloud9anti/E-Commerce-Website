<?php

// Initialize the session
session_start();

require 'conndb.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM people WHERE id=:id';

$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$people = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['name']) ) {
  $id = $_POST['id'];
  $name = $_POST['name'];

  $sql = 'UPDATE products SET name=:name WHERE id=:id';
  $statement = $connection->prepare($sql);


}



//Include products table
$sql = "SELECT * FROM products WHERE Vendor_ID ='$id' ";

$statement = $connection->prepare($sql);
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_OBJ);


//if the user tries to access the shop while inactive, the user is redirected to the home page.
if  ($people->active!=="Active") {
    // Redirect user to index page
    header("location: index.php");
	}
 ?>



<?php require 'header.php'; ?>


<!–– List of all products from this store ––>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
       <h2>Product List:</h2>
    </div>
	<div class="container">
	 <div class="card mt-5">
	     <div class="card-body">
		 <table>
		  <?php  foreach($products as $person): ?>

		  <?php  if ($person->Vendor_ID == $id) { ?>

		  <tr>
		    <td> <a href="displayProducts.php?id=<?= $person->Product_ID ?>" >  <?= $person->name; ?> </a> </td>
			 </tr>

			 <?php };  ?>

			 <?php endforeach;  ?>
			</table>
     
		</div>
	 </div>

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


<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Home page for  <?= $people->name ?></h2>
    </div>
	<div class="container">
	 <div class="card mt-5">
	   <div class="card-body">
	    <table class="table table-bordered">
		<tr>
	        <td>Address:</td>
			</tr>
			  <tr>
			  <td>Thanon/Soi:</td>
			  </tr>
			  <tr>
	          <td>Post Code:</td>
			  </tr>
			  <tr>
	          <td>Website:</td>
			  </tr>
			  <tr>
			  <td>Email: <?= $people->email; ?></td>
			  <td> <?= $people->email; ?> </td>
			  </tr>
			  <tr>
	          <td>Line ID:</td>
			  </tr>
			  <tr>
			  <td>Facebook:</td>
			  </tr>
			  <tr>
			  <td>Instagram:</td>
			  </tr>
			  <tr>
	          <td>Google Maps:</td>
			  </tr>
			  <tr>
			  <td>Opening Hours:</td>
		</tr>

</div>
</div>

      </table>
    </div>
  </div>
</div>



<!–– Details of all products from this store ––>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">

      <h2>Product Details:</h2>
    </div>

	<div class="container">
	 <div class="card mt-5">
	   <div class="card-body">
	    <table class="table table-bordered">
		<tr>
			  <td>Product Name:</td>
			  <td>  <?= $person->Product_ID ?> </td>
			  </tr>
			  <tr>
	        <td>Details:</td>
			</tr>
			  <tr>
			  <td>Pic 1:</td>
			  </tr>
			  <tr>
	          <td>Pic 2:</td>
			  </tr>
			  <tr>
	          <td>Pic 3:</td>
			  </tr>
			  <tr>
			  <td>Pic 4:</td>
			  </tr>
			  <tr>
	          <td>Product Code:</td>
			  </tr>
			  <tr>
			  <td>SKU:</td>
			  </tr>
			  <tr>
			  <td>Price (1 unit):</td>
			  </tr>
			  <tr>
	          <td>Price (1 pack):</td>
			  </tr>
			  <tr>
			  <td>Store ID:</td>
			  <td>   </td>
		</tr>




</div>
</div>

      </table>
    </div>
  </div>
</div>

