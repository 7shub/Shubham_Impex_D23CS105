<?php
include '../php_tools/db_connect.php'; // Include the database connection file

// Get the order_id from the URL parameter
$order_id = isset($_GET['order_id']) ? mysqli_real_escape_string($conn, $_GET['order_id']) : '';

if (!$order_id) {
    die("Order ID is not provided.");
}

// Function to retrieve data based on selected table
function fetch_order_data($conn, $order_id, $table) {
    $query = "SELECT * FROM $table WHERE order_id = '$order_id'";
    return mysqli_query($conn, $query);
}

// Determine which table's data to display
$table_to_display = isset($_GET['table']) ? $_GET['table'] : '';
$result = null;
if ($table_to_display) {
    $result = fetch_order_data($conn, $order_id, $table_to_display);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>More Order Details</title>
    <style>
      body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 20px; }
      h1 { text-align: center; font-size: 24px; margin-bottom: 20px; }
      .buttons { text-align: center; margin-bottom: 20px; }
      .button { padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer; text-decoration: none; margin: 5px; border-radius: 5px; }
      .button:hover { background-color: #0056b3; }
      table { width: 100%; border-collapse: collapse; margin-top: 20px; background-color: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
      th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
      th { background-color: #007bff; color: white; }
      tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>More Order Details for Order ID: <?php echo htmlspecialchars($order_id); ?></h1>

    <!-- Buttons for selecting which data to view -->
    <div class="buttons">
        <a href="more_order_details.php?order_id=<?php echo urlencode($order_id); ?>&table=goods_details" class="button">Goods Details</a>
        <a href="more_order_details.php?order_id=<?php echo urlencode($order_id); ?>&table=pricing" class="button">Pricing</a>
        <a href="more_order_details.php?order_id=<?php echo urlencode($order_id); ?>&table=shipment_details" class="button">Shipment Details</a>
    </div>

    <!-- Display selected table data -->
    <?php if ($result && mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <?php
                    // Dynamically generate column headers based on table selection
                    $columns = mysqli_fetch_fields($result);
                    foreach ($columns as $column) {
                        echo "<th>" . htmlspecialchars($column->name) . "</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch and display each row of data
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    foreach ($row as $cell) {
                        echo "<td>" . htmlspecialchars($cell) . "</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    <?php else: ?>
        <p style="text-align: center; color: red;">No data available for the selected option.</p>
    <?php endif; ?>

</body>
</html>

<?php
// Close the database connection
mysqli_close($conn);
?>
