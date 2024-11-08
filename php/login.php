<?php
include '../php_tools/db_connect.php'; // Including the database connection
session_start();

if (isset($_POST['submit'])) { // If the user clicks the submit button
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password'])); // Hash the entered password with md5

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Check if the email is valid
        // Query to find the user with the provided email and hashed password
        $select = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email' AND password = '$password'");

        if (mysqli_num_rows($select) > 0) {
            $row = mysqli_fetch_assoc($select);
            $_SESSION['adminid'] = $row['adminid']; // Store adminid in session
            header('location: ../php/Dashboard.php'); // Redirect to home page
        } else {
            $alert[] = "Incorrect email or password!";
        }
    } else {
        $alert[] = "$email is not a valid email!";
    }
}

if (isset($_SESSION['adminid'])) {
    header("location: ../php/Dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Welcome Back</h3>
            <?php 
                if (isset($alert)) {
                    foreach ($alert as $msg) {
                        echo '<div class="alert">'.$msg.'</div>';
                    }
                }
            ?>
            <input type="email" name="email" placeholder="Enter Email" class="box" required>
            <input type="password" name="password" placeholder="Enter Password" class="box" required>
            <input type="submit" name="submit" class="btn" value="Login">
            <p>Don't have an account? <a href="register.php">Register now</a></p>
        </form>
    </div>
</body>
</html>
