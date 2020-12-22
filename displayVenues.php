<?php

// Initialize the session
session_start();

require 'conndb.php';
$venue = $_GET['venue'];

$sql = 'SELECT * FROM people WHERE venue=:venue';

$statement = $connection->prepare($sql);
$statement->execute([':venue' => $venue ]);
$people = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>
<?php require 'header.php'; ?>

<!--All from this area-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Everything from the venue [<?= $venue ?>] </h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>BPS</th>
		  <th>Active</th>
		  <th>Area</th>
          <th>Community</th>
          <th>Industry</th>
		  <th>Category</th>
          <th>Subcategory</th>

        </tr>
        <?php foreach($people as $person): ?>

          <tr>
           <td><a href="displayBPS.php?name=<?= $person->name ?>" >  <?= $person->name; ?> </a></td>
			<td><?= $person->active; ?></td>
            <td><a href="displayGroups.php?groups=<?= $person->groups ?>" >  <?= $person->groups; ?> </a></td>
            <td><a href="displayCommunities.php?community=<?= $person->community ?>" >  <?= $person->community; ?> </a></td>
			<td><?= $person->industry ?> </td>
			<td><?= $person->category ?> </td>
			<td><?= $person->subcategory ?> </td>
    
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
