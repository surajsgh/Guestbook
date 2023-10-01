<?php include 'templates/header.php'?>

<?php
  $query = "SELECT * FROM contacts";
  $result = mysqli_query($conn, $query);
  $contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php if(empty($contacts)):?>
  <h2>No Records Found</h2>
<?php endif ?>

<?php foreach($contacts as $contact): ?>

  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1"><?php echo $contact['email'] ?>g</h5>
        <small><?php echo $contact['address_1'] ?></small>
      </div>
      <p class="mb-1"><?php echo $contact['address_2'] ?>.</p>
      <small><?php echo $contact['city'] ?></small>
    </a>
  </div>

<?php endforeach ?>
  
<?php include 'templates/footer.php' ?>