<?php
require 'conndb.php';
$id = $_GET['id'];
$sql = 'DELETE FROM people WHERE id=:id';
$statement = $connection->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: index.php");
}