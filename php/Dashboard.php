<?php
include '../php_tools/db_connect.php'; // Include the database connection file

// Fetch all users from the user table
$query = "SELECT email, unique_ID FROM user";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
       body { font-family: Arial, sans-serif; }
        h1 { color: #333; }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th { background-color: #f2f2f2; }
        .connect-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }
        .button {
            font-size: 25px;
            margin: 35px 0;
            padding: 11px 16px;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            transition: all 0.3s linear;
            display: inline-block;
            border-width: 3px;
            border-style: solid;
        }
        .button {
            font-family: 'Open Sans', sans-serif, Arial, Helvetica;
            font-size: 16px;
            color: #111;
        }

        /* Button Color */
        .button {
            border-color: #111;
        }

        /* Button Hover Color */
        .form:hover {
            color: #138808;
            border-color: #138808;
        }
        .chat:hover {
            color: #7FFFD4;
            border-color: #7FFFD4;
        }
        .logout:hover {
            color: #f44336;
            border-color: #f44336;
        }
    </style>
</head>
<body>

    <h1>Dashboard</h1>

    <div class="header">
        <a href="../php/order_form.php" class="button">Open Order Form</a>
        <a href="../chatapp/login.php" class="chat button">Chat</a>
        <a href="../php/logout.php" class="logout button">Logout</a>
    </div>

    <table>
        <tr>
            <th>Email</th>
            <th>Unique ID</th>
            <th>Action</th>
        </tr>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                echo "<td>" . htmlspecialchars($row['unique_ID']) . "</td>";
                echo "<td>";
                echo "<a href='order_details.php?client_id=" . urlencode($row['unique_ID']) . "' class='connect-button'>Connect</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found.</td></tr>";
        }
        ?>

    </table>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
