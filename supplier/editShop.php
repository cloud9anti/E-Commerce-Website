<?php
require 'conndb.php';

// Initialize the session
session_start();

$id = $_SESSION["vendor"];




$sql = 'SELECT * FROM people WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name']) && isset($_POST['active']) ) {
  $name = $_POST['name'];
  $groups = $_POST['groups'];
  $community = $_POST['community'];
  $venue = $_POST['venue'];
  $active = $_POST['active'];
  $industry = $_POST['industry'];
  $category = $_POST['category'];
  $subcategory = $_POST['subcategory'];
  $sql = 'UPDATE people SET name=:name, active=:active WHERE id=:id';
  $statement = $connection->prepare($sql);




  if ($statement->execute([':name' => $name, ':active' => $active, ':id' => $id])) {

    header("Location: index.php");
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update <?= $person->name ?></h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
			<a href="addItem.php?id=<?= $person->id ?>" class="btn btn-info">Add Product</a>
        </div>

		<div class="form-group">
			<label for="active">Active?</label>
			<br>
         <input type="radio" name="active" value="Active">Yes
         <br>
         <input type="radio" name="active" value="Inactive">No
      </div>
       
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update BPS</button>
        </div>
      </form>
    </div>
  </div>
</div>
