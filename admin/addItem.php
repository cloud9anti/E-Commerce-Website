<?php
require 'conndb.php';

 


$message = '';
if (isset ($_POST['name'])  && isset($_POST['details']) && isset($_POST['sku']) && isset($_POST['price'])) {
  $name = $_POST['name'];
  $details = $_POST['details'];
  $sku = $_POST['sku'];
  $price = $_POST['price'];
  $image = $_POST['image'];
  $groups = $_POST['groups'];
  $category = $_POST['category'];
  $subcategory = $_POST['subcategory'];
    $id = $_GET['id'];

	 //set the default image
	if ($image == '') {
		$image = "images/default.png";
	}

  $sql = "INSERT INTO products(name, details, sku, price, image, groups, category, subcategory, Vendor_ID) VALUES(:name, :details, :sku, :price, :image, :groups, :category, :subcategory, $id)";
  $statement = $connection->prepare($sql);
  if ($statement->execute([':name' => $name, ':details' => $details, ':sku' => $sku, ':price' => $price, ':groups' => $groups, ':category' => $category, ':subcategory' => $subcategory, ':image' => $image ])) {
    $message = 'data inserted successfully';
  }
}
 ?>
<?php require 'header.php'; ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a new Item</h2>
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
          <label for="details">Details (Optional)</label>
          <input type="text" name="details" id="details" class="form-control">
        </div>

		  <div class="form-group">
          <label for="sku">Sku (Number of items being sold)</label>
          <input type="text" name="sku" id="sku" class="form-control">
        </div>
		  <div class="form-group">
          <label for="price">Price in $USD</label>
          <input type="text" name="price" id="price" class="form-control">
        </div>
		  <div class="form-group">
          <label for="groups">Group (Please choose one)</label>
           <select type="groups" name="groups" id="groups" class="form-control">
			<option value = "food">Food</option>
			<option value = "drinks">Drinks</option>
			<option value = "clothing">Clothing</option>
			<option value = "items">Items</option>
			<option value = "other">Other</option>
		   </select>
        </div>
		  <div class="form-group">
          <label for="category">Category (Hot Drinks, Office Supplies, Dress, Dessert...)</label>
          <input type="text" name="category" id="category" class="form-control">
        </div>
		  <div class="form-group">
          <label for="subcategory">Subcategory (Hot Coffee, Paper, Sundress, Donut...)</label>
          <input type="text" name="subcategory" id="subcategory" class="form-control">
        </div>
		  <div class="form-group">
          <label for="image">Image (If left blank, a default image will be used)</label>
          <input type="text" name="image" id="image" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Create Item</button>
        </div>
      </form>
    </div>
  </div>
</div>