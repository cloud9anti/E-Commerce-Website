<?php

// Initialize the session
session_start();

require 'conndb.php';

$sql = 'SELECT * FROM people';

$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>
<?php require 'header.php'; ?>


<!--All BPS-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Store Information in your Area</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>Store</th>
		  <th>Action</th>
          <th>Area</th>
		  <th>Community</th>
          <th>Venue</th>

        </tr>
        <?php foreach($people as $person): ?>

          <tr>
            <td> <a href="displayBPS.php?name=<?= $person->name ?>" >  <?= $person->name; ?> </a> </td>
            <td> <a href="viewShop.php?id=<?= $person->id ?>" class="btn btn-info">View Shop</a> </td>
            <td><a href="displayGroups.php?groups=<?= $person->groups ?>" >  <?= $person->groups; ?> </a></td>
            <td><a href="displayCommunities.php?community=<?= $person->community ?>" >  <?= $person->community; ?> </a></td>
            <td><a href="displayVenues.php?venue=<?= $person->venue ?>" >  <?= $person->venue; ?> </a></td>


          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
