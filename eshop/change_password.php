<?php
// Gets username and password from session
session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
// Error message variable
$message = '';

// Connects to the database
include_once("db_setup.php");

// Waits for form send
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password_input = $_POST['password_input'];
    $password_input_rp = $_POST['password_input_rp'];

    // Checks if the fields are empty
    if (empty($password_input) || empty($password_input_rp)) {
        $message = 'Error: all fields must not be empty';
    } else {
        // Checks if the passwords are same
        if ($password_input != $password_input_rp) {
            $message = 'Error: Your passwords do not match';
        } else {
            // Rewrites the password
            $sql = "UPDATE users SET password = '$password_input' WHERE username = '$username'";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            header("Location: user.php");
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
    <title>iWave | Login user</title>
</head>

<body>
    <div class="login-background-image">
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
                        <ul
                            class="navbar-nav d-lg-flex justify-content-lg-end w-100 me-auto mb-2 mb-lg-0 align-items-center">
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
                                <a class="navlinkicon" href="user.php"><i
                                        class="fa-regular fa-circle-user navlink-icon"></i></a>
                                <a class="navlinkicon" href="cart.php"><i
                                        class="fa-solid fa-cart-shopping navlink-icon"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- User login section -->
        <section class="container">
            <h2 class="heading-2 text-center">Change password</h2>
            <div class="container ">
                <form action="change_password.php" method="post"
                    class="login-form w-100 d-flex flex-column align-items-center mt-5 pt-3">
                    <div class="login-form-row mb-4 mt-3 d-flex align-items-center p-2">
                        <input type="password" name="password_input" class="login-form-input w-100"
                            placeholder="New password...">
                    </div>
                    <div class="login-form-row mb-4 mt-3 d-flex align-items-center p-2">
                        <input type="password" name="password_input_rp" class="login-form-input w-100"
                            placeholder="Repeat new password...">
                    </div>
                    <p class="text-danger text-center mt-2">
                        <?php echo $message; ?>
                    </p>
                    <input type="submit" class="button login-button mt-2" value="Change password">
                </form>
            </div>

        </section>
    </div>
</body>

</html>