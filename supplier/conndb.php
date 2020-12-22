<?php
$dsn = 'mysql:host=localhost;dbname=rankhadd';
$host = 'localhost';
$db_name = 'rankhadd';
$username = 'root';
$password = 'usbw';
$options = [];
try {
$connection = new PDO('mysql:host='.$host.';dbname='.$db_name, $username, $password, $options);
} catch(PDOException $e) {
}


//user connection (same database)
$db_server = 'localhost';


 
// Attempt to connect to MySQL database 
$link = mysqli_connect($db_server, $username, $password, $db_name);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


//track the daily number of orders

static $dailyOrders = 0;

?>