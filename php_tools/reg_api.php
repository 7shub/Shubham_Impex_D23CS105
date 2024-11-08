<?php
$host = 'localhost'; // Replace with your host
$db = 'project_3'; // Replace with your database name
$user = 'root'; // Replace with your DB username
$pass = ''; // Replace with your DB password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Set usertype to 'client'
$usertype = "client";

// Retrieve form data and sanitize inputs
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password hashing

// Handle image upload
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = 'uploads/' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $image);
} else {
    // Assign default image if no image is uploaded
    $image = 'uploads/default_image.png'; // Ensure you have a default image in the 'uploads' folder
}

// Generate unique ID for the user
$unique_ID = uniqid('user_');

// Insert data into the database using direct SQL query
$sql = "INSERT INTO user (usertype, email, password, image, unique_ID) 
        VALUES ('$usertype', '$email', '$password', '$image', '$unique_ID')";

// Execute the query and check if successful
if ($conn->query($sql) === TRUE) {
    echo "Signup successful!";
} else {
    echo "Error: " . $conn->error; // Debug: check for SQL execution errors
}

// Close the connection
$conn->close();
?>

