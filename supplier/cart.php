
<?php

error_reporting(0);


// Initialize the session
session_start();





//Select the products from the company database
$result = mysqli_query($connection, 'select * from products');



 
// Check if the user is already logged in, if yes then redirect him to index page
/*if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}
 */

require 'conndb.php';
require 'header.php';



//Create Order

$con = mysqli_connect($host, $username, $password, $db_name);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }





//get action string

$action = isset($_GET['action'])?$_GET['action']:"";



//Add to cart

if($action=='addcart' && $_SERVER['REQUEST_METHOD']=='POST') {


	//Finding the product by code

	$query = 'SELECT * FROM products WHERE Product_ID=:Product_ID';

	$statement = $connection->prepare($query);
	$statement->bindParam('Product_ID', $_POST['Product_ID']);
	$statement->execute();
	$cart = $statement->fetch();

	

	

	$currentQty = $_SESSION['products'][$_POST['Product_ID']]['qty']+1; //Incrementing the product qty in cart

	$_SESSION['products'][$_POST['Product_ID']] =array('qty'=>$currentQty,'name'=>$cart['name'],'image'=>$cart['image'],'price'=>$cart['price'], 'Product_ID'=>$cart['Product_ID'], 'Vendor_ID'=>$cart['Vendor_ID']);

	$cart='';

	header("Location: cart.php");

}



//Empty all

if($action=='emptyall') {

	$_SESSION['products'] =array();

	header("Location: cart.php");	

}

//Check out and empty the cart



	if ($action== 'checkout') {
		

		// Check if the user is already logged in, if yes then redirect him to index page
		if(!isset($_SESSION["loggedin"])){
			header("location: login.php");
			exit;
		}

		//make sure the dailyOrder is one higher than the daily variable
		$daily = dailyOrders+1;

		$dailyOrders += 1;
		//echo $dailyOrders;

		//$idNum = 
		//$daily = "SELECT id FROM orders ORDER BY ID DESC LIMIT 1""

		//$sql = 'SELECT answer FROM variables WHERE variable = "lastOrder"';




	
		$ranNum = random_int(100, 999);

		foreach($_SESSION['products'] as $key=>$cart):

		$name =  $cart['name'];
		$ID = $cart['Product_ID'];
		$VID = $cart['Vendor_ID'];
		$sku =  $cart['qty'];
		$price = $cart['price']*$sku;
		$user =  $_SESSION["username"];
		$image = $cart['image'];
		

		$BID = "BN" . date('Ydm') . $ranNum;
		//$BID = "BN" . date('Ymd') . $idNum;
		
		mysqli_query($con, "insert into orders(name, Product_ID, Vendor_ID, Booking_ID, price, sku, datecreation, status, username, image)
		values('$name', '$ID', '$VID', '$BID', '$price', '$sku', '".date('Y-m-d')."', 'awaiting payment',  '$user', '$image')");
		endforeach;

		$_SESSION['products'] =array();
				echo "Checkout success!";
	header("Location: orders.php");	


}





//Empty one by one

if($action=='empty') {

	$Product_ID = $_GET['Product_ID'];

	$products = $_SESSION['products'];

	unset($products[$Product_ID]);

	$_SESSION['products']= $products;

	header("Location: cart.php");	

}





 

 

 //Get all products

$query = "SELECT * FROM products";

$statement = $connection->prepare($query);

$statement->execute();

$products = $statement->fetchAll();



?>



<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>PHP registration form</title>



<!-- Bootstrap -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>

<div class="container" style="width:600px;">

  <?php if(!empty($_SESSION['products'])):?>

  <nav class="navbar navbar-inverse" style="background:blue;">

    <div class="container-fluid pull-left" style="width:300px;">

      <div class="navbar-header"> <a class="navbar-brand" href="#" style="color:#FFFFFF;">Shopping Cart
	 </a> </div>

    </div>

    <div class="pull-right" style="margin-top:7px;margin-right:7px;"><a href="cart.php?action=emptyall" class="btn btn-info">Empty cart</a></div>

  </nav>

  <table class="table table-striped">

    <thead>

      <tr>

        <th>Image</th>

        <th>Name</th>

        <th>Price</th>

        <th>Qty</th>

        <th>Actions</th>

      </tr>

    </thead>

    <?php foreach($_SESSION['products'] as $key=>$cart):?>

    <tr>

      <td><img src="<?php print $cart['image']?>" width="50"></td>

      <td><?php print $cart['name']?></td>

      <td>$<?php print $cart['price']?></td>

      <td><?php print $cart['qty']?></td>

      <td><a href="cart.php?action=empty&Product_ID=<?php print $key?>" class="btn btn-info">Remove</a></td>

	  
    </tr>

    <?php $total = $total+$cart['price']*$cart['qty'];?>

    <?php endforeach;?>


	<!-checkout button -->

    <tr>
	<td colspan="5" align="right"><h4>Total:$<?php print $total?></h4></td>
	</tr>
	<tr>
	<td colspan="5" align="right"><div ><a href="cart.php?action=checkout" class="btn btn-info">Purchase</a></div></td>
	</tr>


  </table>

  <?php endif;?>

  <nav class="navbar navbar-inverse" style="background:blue;">

    <div class="container-fluid">

      <div class="navbar-header"> <a class="navbar-brand" href="#" style="color:#FFFFFF;">Products</a> </div>

    </div>

  </nav>

  <div class="row">

    <div class="container" style="width:600px;">

      <?php foreach($products as $cart):?>

      <div class="col-md-4">

        <div class="thumbnail"> <img src="<?php print $cart['image']?>" alt="Lights">

          <div class="caption">

            <p style="text-align:center;"><?php print $cart['name']?></p>

            <p style="text-align:center;color:#04B745;"><b>$<?php print $cart['price']?></b></p>

            <form method="post" action="cart.php?action=addcart">

              <p style="text-align:center;color:#04B745;">

                <button type="submit" class="btn btn-warning">Add To Cart</button>

                <input type="hidden" name="Product_ID" value="<?php print $cart['Product_ID']?>">

              </p>

            </form>

          </div>

        </div>

      </div>

      <?php endforeach;?>

    </div>

  </div>

</div>

</body>

</html>