<?php
require 'conndb.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM people WHERE id=:id';
$statement = $connection->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['name'])  && isset($_POST['groups']) && isset($_POST['community']) && isset($_POST['venue']) && isset($_POST['active']) && isset($_POST['industry']) && isset($_POST['category']) && isset($_POST['subcategory']) ) {
  $name = $_POST['name'];
  $groups = $_POST['groups'];
  $community = $_POST['community'];
  $venue = $_POST['venue'];
  $active = $_POST['active'];
  $industry = $_POST['industry'];
  $category = $_POST['category'];
  $subcategory = $_POST['subcategory'];
  $sql = 'UPDATE people SET name=:name, groups=:groups, community=:community, venue=:venue, active=:active, industry=:industry, category=:category, subcategory=:subcategory WHERE id=:id';
  $statement = $connection->prepare($sql);




  if ($statement->execute([':name' => $name, ':groups' => $groups, ':community' => $community, ':venue' => $venue, ':active' => $active, ':id' => $id, ':industry' => $industry, ':category' => $category, ':subcategory' => $subcategory])) {

    header("Location: index.php");
  }
}
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update BPS</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input value="<?= $person->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>

		<div class="form-group">
			<label for="active">Active?</label>
			<br>
         <input type="radio" name="active" checked="checked" value="Active">Yes
         <br>
         <input type="radio" name="active" value="Inactive">No
      </div>
        <div class="form-group">
          <label for="groups">Group</label>
          <input value="<?= $person->groups; ?>" name="groups" id="groups" class="form-control">
        </div>
        <div class="form-group">
          <label for="community">Community</label>
           <select value="<?= $person->community; ?>" type="community" name="community" id="community" class="form-control">
			<option value = "Alexander">Alexander</option>
			<option value = "Competitor">Competitor</option>
			<option value = "Other">Other</option>
		  </select>
        </div>
		  <div class="form-group">
          <label for="venue">Venue</label>
          <input type="text" value="<?= $person->venue; ?>" name="venue" id="venue" class="form-control">
        </div>
		  <div class="form-group">
          <label for="industry">Industry</label>
          <input type="text" value="<?= $person->industry; ?>" name="industry" id="industry" class="form-control">
        </div>
		  <div class="form-group">
          <label for="category">Category</label>
          <input type="text" value="<?= $person->category; ?>" name="category" id="category" class="form-control">
        </div>
		  <div class="form-group">
          <label for="subcategory">Subcategory</label>
          <input type="text" value="<?= $person->subcategory; ?>" name="subcategory" id="subcategory" class="form-control">

		            <button type="submit" class="btn btn-info">Update BPS</button>
        </div>
        

        
      </form>
    </div>
  </div>
</div>
