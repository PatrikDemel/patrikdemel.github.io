<?php
// Message variables
$sent_message = '';
$error_messages = '';

// Connects to the database
include("db_setup.php");

// Waits for form send
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Saves fields into variables
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Checks if any of the fields is empty
  if (empty($name) || empty($email) || empty($message)) {
    $error_messages = 'Error: all fields must not be empty';
  } else {
    // Checks if any of the fields is invalid
    if (strlen($name) > 30 || strlen($email) > 255) {
      $error_messages = 'Error: Some of your inputs are invalid.';
    } else {
      // Saves fields into database
      $sql = "INSERT INTO messages VALUES (NULL,'$name','$email','$message')";
      $result = mysqli_query($conn, $sql);
      $sent_message = 'Your form has been sent. We will reach you as soon as possible.';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Font Awesome Import -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap CSS import -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <!-- Bootstrap JS import -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <!-- Custom CSS import -->
  <link rel="stylesheet" href="./css/styles.css" />
  <!-- Title and Icon -->
  <link rel="icon" href="./assets/favicon.svg" />
  <title>iWave | Contact</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-white">
    <div class="container pt-2">
      <a class="navbar-brand" href="index.html"><img src="./assets/logo.png" alt="logo" class="w-75" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#nav">
        <i class="navbar-toggler-icon"></i>
      </button>

      <div class="offcanvas offcanvas-end" id="nav">
        <div class="offcanvas-header justify-content-end">
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav d-lg-flex justify-content-lg-end w-100 me-auto mb-2 mb-lg-0 align-items-center">
            <li class="nav-item nav-item-mobile-margin mx-lg-4">
              <a class="navlink" href="index.html">Home</a>
            </li>
            <li class="nav-item nav-item-mobile-margin mx-lg-4">
              <a class="navlink" href="products.php">Products</a>
            </li>
            <li class="nav-item nav-item-mobile-margin mx-lg-4">
              <a class="navlink" href="contact.php">Contact</a>
            </li>
            <li class="nav-item nav-item-mobile-margin mx-lg-4">
              <a class="navlinkicon" href="user.php"><i class="fa-regular fa-circle-user navlink-icon"></i></a>
              <a class="navlinkicon" href="cart.php"><i class="fa-solid fa-cart-shopping navlink-icon"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Contact section -->
  <section class="container d-flex flex-sm-column flex-lg-row align-items-center-exsm align-items-sm-center">
    <div class="col-lg-6 col-sm-10">
      <div class="row">
        <h2 class="heading-2">Contact us</h2>
        <form action="contact.php" method="post"
          class="d-flex flex-column align-items-sm-center align-items-lg-stretch">
          <input type="text" name="name" class="form-input" placeholder="Name..." />
          <input type="email" name="email" class="form-input" placeholder="Email..." />
          <textarea name="message" class="form-input" cols="30" rows="10" placeholder="Message..."
            style="resize: none"></textarea>
          <input type="submit" class="button contact-button mt-4" value="Send" />
          <p class="text-black mt-3 text-sm-center text-lg-start">
            <?php echo $sent_message; ?>
          </p>
          <p class="text-danger">
            <?php echo $error_messages; ?>
          </p>
        </form>
      </div>
    </div>
    <div class="col-lg-6 col-sm-10">
      <div class="row d-flex justify-content-end mt-5 pt-5">
        <img src="./imgs/contact-image.svg" alt="ilustrační obrázek" class="contact-image w-75" />
      </div>
    </div>
  </section>
</body>

</html>