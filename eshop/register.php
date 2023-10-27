<?php
// Error message variable
$message = '';

// Connects to the database 
include_once("db_setup.php");

// Checks if the form is sent
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_rp = $_POST['password_rp'];

    // Checks if any of the fields is empty
    if (empty($first_name) || empty($last_name) || empty($email) || empty($username) || empty($password) || empty($password_rp)) {
        $message = 'Error: All fields must not be empty';
    }
    // Checks if the password fields match
    else if ($password != $password_rp) {
        $message = 'Errror: Your passwords do not match';
    }
    // Checks validation
    else if (strlen($first_name) > 30 || strlen($last_name) > 30 || strlen($email) > 255 || strlen($password) > 255) {
        $message = 'Error: Your inputs are invalid';
    } else {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        // Checks if the username is already in use
        if (mysqli_num_rows($result) === 0) {
            $sql = "INSERT INTO users VALUES ('$first_name', '$last_name', '$email', '$username', '$password')";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            // Starts the session
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;

            // Redirects the user to the page
            header("Location: user.php");

        } else {
            $message = 'Error: this username is already in use.';
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
    <title>iWave | Login register</title>
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
        <h2 class="heading-2 text-center">Register user</h2>
        <div class="container mb-5">
            <form action="register.php" method="post" class="login-form w-100 d-flex flex-column align-items-center ">
                <div class="login-form-row mb-4 d-flex align-items-center">
                    <i class="fa-regular fa-pen-to-square login-form-icon"></i>
                    <input type="text" name="first_name" placeholder="First name..." class="login-form-input w-100">
                </div>
                <div class="login-form-row mb-4 mt-3 d-flex align-items-center">
                    <i class="fa-regular fa-pen-to-square login-form-icon"></i>
                    <input type="text" name="last_name" placeholder="Last name..." class="login-form-input w-100">
                </div>
                <div class="login-form-row mb-4 mt-3 d-flex align-items-center">
                    <i class="fa-regular fa-pen-to-square login-form-icon"></i>
                    <input type="email" name="email" placeholder="Email..." class="login-form-input w-100">
                </div>
                <div class="login-form-row mb-4 mt-3 d-flex align-items-center">
                    <i class="fa-regular fa-circle-user login-form-icon"></i>
                    <input type="text" name="username" placeholder="Username..." class="login-form-input w-100">
                </div>
                <div class="login-form-row mb-4 mt-3 d-flex align-items-center">
                    <i class="fa-regular fa-circle-user login-form-icon"></i>
                    <input type="password" name="password" placeholder="Password..." class="login-form-input w-100">
                </div>
                <div class="login-form-row mb-4 mt-3 d-flex align-items-center">
                    <i class="fa-regular fa-circle-user login-form-icon"></i>
                    <input type="password" name="password_rp" placeholder="Repeat password..."
                        class="login-form-input w-100">
                </div>
                <p class="text-danger text-center mt-4">
                    <?php echo $message; ?>
                </p>
                <input type="submit" class="button login-button mt-2" value="Register">
            </form>
        </div>

    </section>

</body>

</html>