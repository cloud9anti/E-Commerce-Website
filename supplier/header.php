<!doctype html>

<?php

//if not an admin, send back to index.php
if ($_SESSION["admin"] == "user" || $_SESSION["admin"] == "admin") {

   // Redirect user to index page
  header("location: ../login.php");
} 

?>


<html lang="en">
  <head>
    <title>BPS Database</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="navbar-brand" href="index.php">[All BPS] <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="navbar-brand" href="groups.php">[Groups] <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="navbar-brand" href="communities.php">[Communities] <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="navbar-brand" href="venues.php">[Venues] <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="navbar-brand" href="cart.php">[Shopping Cart] <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="navbar-brand" href="orders.php">[My Orders] <span class="sr-only">(current)</span></a>
      </li>

	    <h1>   ---------------------------------------</h1>


	  <!-- Account buttons (top right) -->
	  <li class="nav-item active">
        <a class="navbar-brand" href="../login.php"><?php echo htmlspecialchars($_SESSION["username"]); ?> <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="navbar-brand" href="../login.php"> <?php if ($_SESSION["loggedin"] !== true) { echo "[Login]"; } ?><span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="navbar-brand" href="../logout.php"> <?php if ($_SESSION["loggedin"] == true) { echo "[Log Out]"; } ?> <span class="sr-only">(current)</span></a>
      </li>
	  <li class="nav-item active">
        <a class="navbar-brand" href="../register.php"> <?php if ($_SESSION["loggedin"] !== true) { echo "[Create Account]"; } ?><span class="sr-only">(current)</span></a>
      </li>


	  
      
      
    </ul>
  </div>
</nav>