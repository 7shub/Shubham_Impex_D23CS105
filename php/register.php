<?php
include '../php_tools/db_connect.php'; // Including the database connection
session_start();

// If user is already logged in, redirect them to home page
if (isset($_SESSION['adminid'])) {
    header("location: ../php/Dashboard.php");
    exit();
}

if (isset($_POST['submit'])) { // If the user clicks the submit button
    $adminid = rand(time(), 1000000000); // Creating random number for adminid
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password'])); // Hashing the password with md5
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword'])); // Hashing the confirm password with md5

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // Check if the email is valid
        $select = mysqli_query($conn, "SELECT * FROM admin WHERE email = '$email'");
        
        if (mysqli_num_rows($select) > 0) {
            $alert[] = "User already exists!";
        } else {
            if ($password != $cpassword) {
                $alert[] = "Passwords do not match!";
            } else {
                $insert = mysqli_query($conn, "INSERT INTO admin (adminid, email, password, status) 
                    VALUES ('$adminid', '$email', '$password', 'Offline Now')"); // Set status to "Offline Now" during registration

                if ($insert) {
                    $_SESSION['adminid'] = $adminid; // Save adminid in session
                    header('location: login.php');
                    exit();
                } else {
                    $alert[] = "Connection failed, please retry!";
                }
            }
        }
    } else {
        $alert[] = "$email is not a valid email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Register</title>
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Create Account</h3>
            <?php 
                if (isset($alert)) {
                    foreach ($alert as $msg) {
                        echo '<div class="alert">'.$msg.'</div>';
                    }
                }
            ?>
            <input type="email" name="email" placeholder="Enter Email" class="box" required>
            <input type="password" name="password" placeholder="Enter Password" class="box" required>
            <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
            <input type="submit" name="submit" class="btn" value="Register">
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </form>
    </div>
</body>
</html>
