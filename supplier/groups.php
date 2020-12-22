<?php
require 'conndb.php';

$sql = 'SELECT DISTINCT groups FROM people';

$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);


 ?>
<?php require 'header.php'; ?>

<!--All groups-->
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All Groups</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">

        <?php foreach($people as $person): ?>

          <tr>
            <td> <a href="displayGroups.php?groups=<?= $person->groups ?>" >  <?= $person->groups; ?> </a> </td>

           
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
</div>
