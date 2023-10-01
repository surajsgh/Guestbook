<?php include 'templates/header.php'?>

<?php 
  $email = $address_1 = $address_2 = $city = '';
  $emailError = $address_1Error = $address_2Error = $cityError = '';

  function testData($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if(isset($_POST['submit'])) {
    if($_POST['email']) {
      $email = testData($_POST['email']);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }
    else {
      $emailError = "Email is empty.";
    }

    if($_POST['address_1']) {
      $address_1 = testData($_POST['address_1']);
    }
    else {
      $address_1Error = 'Address 1 is empty.';
    }

    if($_POST['address_2']) {
      $address_2 = testData($_POST['address_2']);
    }
    else {
      $address_2Error = 'Address 2 is empty.';
    }

    if($_POST['city']) {
      $city = testData($_POST['city']);
    }
    else {
      $cityError = 'City is empty.';
    }

    if($email && $address_1 && $address_2 && $city) {
      $sql = "INSERT INTO contacts (email, address_1, address_2, city) VALUES ('$email', '$address_1', '$address_2', '$city')";
      if(mysqli_query($conn, $sql)) {
        header('Location: guestnotes.php');
      }
      else {
        echo "Error: ". mysqli_error($conn);
      }
    }
  }
?>

  <form class="row g-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <div class="col-md-12">
      <label for="inputEmail4" class="form-label">Email</label>
      <input type="email" name="email" class="form-control <?php echo $emailError ? 'is-invalid' : null ?>" id="inputEmail4">
      <div class="invalid-feedback">
        <?php echo $emailError ?>
      </div>
    </div>
    <div class="col-12">
      <label for="inputAddress" class="form-label">Address</label>
      <input type="text" name="address_1" class="form-control <?php echo $address_1Error ? 'is-invalid' : null ?>" id="inputAddress" placeholder="1234 Main St">
      <div class="invalid-feedback">
        <?php echo $address_1Error ?>
      </div>
    </div>
    <div class="col-12">
      <label for="inputAddress2" class="form-label">Address 2</label>
      <input type="text" name="address_2" class="form-control <?php echo $address_2Error ? 'is-invalid' : null ?>" id="inputAddress2" placeholder="Apartment, studio, or floor">
      <div class="invalid-feedback">
        <?php echo $address_2Error ?>
      </div>
    </div>
    <div class="col-md-6">
      <label for="inputCity" class="form-label">City</label>
      <input type="text" name="city" class="form-control <?php echo $cityError ? 'is-invalid' : null ?>" id="inputCity">
      <div class="invalid-feedback">
        <?php echo $cityError ?>
      </div>
    </div>
    <div class="col-12">
      <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

<?php include 'templates/footer.php' ?>