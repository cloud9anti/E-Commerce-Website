
<?php

error_reporting(0);


// Initialize the session
session_start();




 
// Check if the user is already logged in, if yes then redirect him to index page
if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}
 

require 'conndb.php';
require 'header.php';


$user = $_SESSION["username"];

//debugging
//echo $user;

//Include orders table
$sql = "SELECT * FROM orders WHERE username='$user'";

$statement = $connection->prepare($sql);
$statement->execute();
$orders = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>

<!--My Orders-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>My Orders</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
          <tr>
			<th> Booking Number </th>
			<th> SKU </th>
			<th> Product ID </th>
			<th> Vendor ID </th>
			<th> Order Date </th>
			<th> Order Status </th>
			<th> Price </th>
			<th> Action </th>

          </tr>

        <?php foreach($orders as $person): ?>

          <tr>
			<td> <?= $person->Booking_ID ?></td>
            <td> <?= $person->sku ?></td>
			<td> <?= $person->Product_ID ?></td>
			<td> <?= $person->Vendor_ID ?></td>
			<td> <?= $person->datecreation ?></td>
			<td> <?= $person->status ?></td>
			<td> <?= $person->price ?></td>
			<td> <a href="payment.php?id=<?= $person->Order_ID ?>" class="btn btn-info">Pay</a> </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>


