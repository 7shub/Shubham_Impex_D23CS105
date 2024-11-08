<?php
include '../php_tools/db_connect.php'; // Include the database connection file

// Get client_id from URL parameter
$client_id = isset($_GET['client_id']) ? mysqli_real_escape_string($conn, $_GET['client_id']) : '';

if (!$client_id) {
    die("Client ID is not provided.");
}

// Fetch all order IDs for the given client from the order_map table
$order_ids = [];
$order_map_query = "SELECT order_id FROM order_map WHERE Client_ID = '$client_id'";
$order_map_result = mysqli_query($conn, $order_map_query);

if (mysqli_num_rows($order_map_result) > 0) {
    while ($row = mysqli_fetch_assoc($order_map_result)) {
        $order_ids[] = "'" . mysqli_real_escape_string($conn, $row['order_id']) . "'";
    }
}

// Check if there are any order IDs found
if (empty($order_ids)) {
    die("No orders found for this client.");
}

// Fetch all orders from Basic_Details for the retrieved order IDs
$order_ids_string = implode(",", $order_ids);
$query = "SELECT * FROM Basic_Details WHERE order_id IN ($order_ids_string)";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Details</title>
    <style>
      body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 20px; }
      h1 { text-align: center; font-size: 24px; margin-bottom: 20px; }
      table { width: 100%; border-collapse: collapse; margin-bottom: 20px; background-color: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
      th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
      th { background-color: #007bff; color: white; }
      tr:nth-child(even) { background-color: #f2f2f2; }
      a { color: #007bff; text-decoration: none; }
      a:hover { text-decoration: underline; }
      .more-details-button {
          padding: 5px 10px;
          background-color: #28a745;
          color: white;
          border: none;
          border-radius: 3px;
          cursor: pointer;
          text-decoration: none;
      }
      .more-details-button:hover {
          background-color: #218838;
      }
    </style>
</head>
<body>
    <h1>Order Details for Client ID: <?php echo htmlspecialchars($client_id); ?></h1>

    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Direction</th>
                <th>Customer</th>
                <th>Consignee</th>
                <th>Transporter</th>
                <th>Land Shipping</th>
                <th>Order Data</th>
                <th>More Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['order_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['direction']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Customer']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Consignee']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Transporter']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Land_Shipping']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Order_Data']) . "</td>";
                    echo "<td><a href='more_order_details.php?order_id=" . urlencode($row['order_id']) . "' class='more-details-button'>More Details</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No orders found for this client.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
