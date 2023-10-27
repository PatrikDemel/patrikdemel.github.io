<?php
// Starts session
session_start();

// Checks if the user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
} else {
  //Connects to the database
  include_once("db_setup.php");

  $username = $_SESSION['username'];
  $password = $_SESSION['password'];

  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
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
  <title>iWave | User
    <?php echo $username; ?>
  </title>
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
  <!-- User section -->
  <section class="container d-lg-block d-sm-flex flex-sm-column align-items-center-exsm align-items-sm-center">
    <h2 class="heading-2">User info</h2>
    <!-- Usr info -->
    <div class="container">
      <div class="col-lg-6 col-sm-12 flex-column">
        <div class="row user-row d-flex flex-row my-4">
          <p class="my-0 py-2 px-0">
            <span class="fw-bold">First name: </span>
            <?php echo $row['first_name']; ?>
          </p>
        </div>
        <div class="row user-row d-flex flex-row my-4">
          <p class="my-0 py-2 px-0">
            <span class="fw-bold">Last name: </span>
            <?php echo $row['last_name']; ?>
          </p>
        </div>
        <div class="row user-row d-flex flex-row my-4">
          <p class="my-0 py-1 px-0">
            <span class="fw-bold">Email: </span>
            <?php echo $row['email']; ?>
          </p>
        </div>
        <div class="row user-row d-flex flex-row my-4">
          <p class="my-0 py-2 px-0">
            <span class="fw-bold">Username: </span>
            <?php echo $_SESSION['username']; ?>
          </p>
        </div>
        <div class="row user-row d-flex flex-row my-4">
          <p class="my-0 py-2 px-0"><a href="change_password.php" class="text-black">
              Change password</a></p>
        </div>
        <div class="row user-row d-flex flex-row my-4">
          <p class="my-0 py-2 px-0"><a href="logout.php" class="text-black">
              Log out</a></p>
        </div>
      </div>
    </div>
    <div class="container pb-5">
      <h2 class="heading-2">Ordered products</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col" style="background-color: var(--primary-color); color: var(--light-color); font-weight: 400">
              Product image</th>
            <th scope="col" style="background-color: var(--primary-color); color: var(--light-color); font-weight: 400">
              Product name</th>
            <th scope="col" style="background-color: var(--primary-color); color: var(--light-color); font-weight: 400">
              Order number</th>
            <th scope="col" style="background-color: var(--primary-color); color: var(--light-color); font-weight: 400">
              Order status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM products WHERE user_ordered = '$username'";
          $result = mysqli_query($conn, $sql);

          while ($row = mysqli_fetch_array($result)) {
            $image = $row["image"];
            $name = $row["name"];
            $order_number = $row["order_number"];
            $order_status = $row["order_status"];

            echo "dyk";
          }
          ?>
          <tr>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </div>

  </section>
</body>

</html>