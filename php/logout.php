<?php 
include '../php_tools/db_connect.php'; // Including the database connection
session_start();

// Check if the admin is logged in
if (isset($_SESSION['adminid'])) {
    $logout_id = $_SESSION['adminid']; // Get the admin ID from the session
    $status = "Offline Now"; // Set the status to "Offline Now"
    
    // Update the status in the database
    $update = mysqli_query($conn, "UPDATE admin SET status = '$status' WHERE adminid = '$logout_id'");

    if ($update) {
        session_unset(); // Remove all session variables
        session_destroy(); // Destroy the session
        header('location: ../php/home.php'); // Redirect to login page
        exit();
    } else {
        echo "Error updating status. Please try again.";
    }
} else {
    header('location: ../php/home.php'); // If no session, redirect to login page
    exit();
}
?>
