
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


//Include orders table
$sql = "SELECT * FROM orders WHERE username='$user'";

$statement = $connection->prepare($sql);
$statement->execute();
$orders = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>

<!--Payment-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>How Would you Like to Pay?</h2>

		<form>
			<input type="radio" name="pay" value="Cash" checked> Cash on Delivery<br>
			<input type="radio" name="pay" value="Credit"> Credit<br> 
		</form> 
	</div>
	<div class="form-group">
        <button type="submit" class="btn btn-info">Continue</button>
     </div>
    <div class="card-body">
      
    </div>
  </div>
</div>


