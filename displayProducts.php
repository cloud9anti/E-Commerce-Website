<?php

// Initialize the session
session_start();

require 'conndb.php';
$id = $_GET['id'];

$sql = 'SELECT * FROM products WHERE Product_ID=:id';

$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$products = $statement->fetchAll(PDO::FETCH_OBJ);




//get action string

$action = isset($_GET['action'])?$_GET['action']:"";





 ?>
<?php require 'header.php';?>

<!-- Bootstrap -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


<!--All that have this product-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
	        <?php foreach($products as $person): ?>
      <h2>Product Details for <?= $person->name ?> </h2>
	  
	          <?php endforeach; ?>


    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>

          <th>Name</th>
		  <th>Details</th>
          <th>Amount in stock</th>



        </tr>
        <?php foreach($products as $person): ?>

          <tr>

			<td><?= $person->name ?> </td>
			<td><?= $person->details ?> </td>
			<td><?= $person->sku ?> </td>


          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>

</div>


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
