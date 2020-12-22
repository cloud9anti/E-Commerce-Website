<?php
require 'conndb.php';

$message = '';
if (isset ($_POST['name'])  && isset($_POST['groups']) && isset($_POST['community']) && isset($_POST['venue']) && isset($_POST['active']) && isset($_POST['industry']) && isset($_POST['category']) && isset($_POST['subcategory'])) {
  $name = $_POST['name'];
  $groups = $_POST['groups'];
  $community = $_POST['community'];
  $venue = $_POST['venue'];
  $active = $_POST['active'];
  $industry = $_POST['industry'];
  $category = $_POST['category'];
  $subcategory = $_POST['subcategory'];
  $sql = 'INSERT INTO people(name, groups, community, venue, active, industry, category, subcategory) VALUES(:name, :groups, :community, :venue, :active, :industry, :category, :subcategory)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':groups' => $groups, ':community' => $community, ':venue' => $venue, ':active' => $active, ':industry' => $industry, ':category' => $category, ':subcategory' => $subcategory])) {
    $message = 'data inserted successfully';
  }
}
 ?>
<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a new BPS</h2>
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
          <input type="text" name="name" id="name" class="form-control">
        </div>
		<div class="form-group">
			<label for="active">Active?</label>
			<br>
         <input type="radio" name="active" value="Active">Yes
         <br>
         <input type="radio" name="active" value="Inactive">No
      </div>
        <div class="form-group">
          <label for="groups">Group</label>
          <input type="text" name="groups" id="groups" class="form-control">
        </div>
		<div class="form-group">
          <label for="community">Community</label>
          <select type="community" name="community" id="community" class="form-control">
			<option value = "Alexander">Alexander</option>
			<option value = "Competitor">Competitor</option>
			<option value = "Other">Other</option>
		  </select>
        </div>
		  <div class="form-group">
          <label for="venue">Venue</label>
          <input type="text" name="venue" id="venue" class="form-control">
        </div>
		  <div class="form-group">
          <label for="industry">Industry</label>
          <input type="text" name="industry" id="industry" class="form-control">
        </div>
		  <div class="form-group">
          <label for="category">Category</label>
          <input type="text" name="category" id="category" class="form-control">
        </div>
		  <div class="form-group">
          <label for="subcategory">Subcategory</label>
          <input type="text" name="subcategory" id="subcategory" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create BPS</button>
        </div>
      </form>
    </div>
  </div>
</div>