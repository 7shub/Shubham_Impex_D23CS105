<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Information Form</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f4f4f9;
      }

      form {
        display: grid;
        gap: 20px;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      h1 {
        grid-column: 1 / -1;
        text-align: center;
        font-size: 24px;
      }

      fieldset {
        border: 1px solid #ddd;
        padding: 15px;
        border-radius: 8px;
      }

      legend {
        font-weight: bold;
        font-size: 18px;
      }

      .form-group {
        display: grid;
        gap: 10px;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        margin-bottom: 20px;
      }

      label {
        display: block;
        font-size: 14px;
      }

      input,
      select,
      textarea {
        width: 100%;
        padding: 2px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
      }

      .file-upload-group {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
      }

      .file-upload-group label {
        flex: 1 1 200px;
      }

      .route-details-container {
        margin-top: 10px;
      }

      button {
        background-color: #007bff;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        border-radius: 4px;
      }

      button:hover {
        background-color: #0056b3;
      }

      .submit-button {
        grid-column: 1 / -1;
      }
      .upload-file {
        display: flex;
      }
      .upload-docs {
        font-size: 16px;
      }
    </style>
</head>
<body>
    <h2>Shipping Information Form</h2>
    <form action="insert_data.php" method="POST">
        <!-- Basic Details -->
        <fieldset>
            <legend>Basic Details</legend>
            <label for="order_id">Order ID:</label>
            <input type="text" name="order_id" id="order_id" required><br><br>

            <label for="direction">Direction:</label>
            <input type="text" name="direction" id="direction" required><br><br>

            <label for="customer">Customer:</label>
            <input type="text" name="customer" id="customer" required><br><br>

            <label for="consignee">Consignee:</label>
            <input type="text" name="consignee" id="consignee" required><br><br>

            <label for="transporter">Transporter:</label>
            <input type="text" name="transporter" id="transporter" required><br><br>

            <label for="land_shipping">Land Shipping:</label>
            <input type="text" name="land_shipping" id="land_shipping" required><br><br>

            <label for="order_data">Order Data:</label>
            <input type="text" name="order_data" id="order_data" required><br><br>

            <label for="client_id">Client ID:</label>
            <select name="client_id" id="client_id" required>
                <?php
                // Fetch unique_IDs from the user table for the dropdown
                include '../php_tools/db_connect.php';
                $query = "SELECT unique_ID FROM user";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['unique_ID'] . "'>" . $row['unique_ID'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No clients available</option>";
                }

                mysqli_close($conn);
                ?>
            </select><br><br>
        </fieldset>

        <!-- Goods Details -->
        <fieldset>
            <legend>Goods Details</legend>
            <label for="type_of_goods">Type of Goods:</label>
            <input type="text" name="type_of_goods" id="type_of_goods" required><br><br>

            <label for="name_of_goods">Name of Goods:</label>
            <input type="text" name="name_of_goods" id="name_of_goods" required><br><br>

            <label for="gross_weight">Gross Weight:</label>
            <input type="text" name="gross_weight" id="gross_weight" required><br><br>

            <label for="volume">Volume:</label>
            <input type="text" name="volume" id="volume" required><br><br>

            <label for="vessel">Vessel:</label>
            <input type="text" name="vessel" id="vessel" required><br><br>
        </fieldset>

        <!-- Pricing Details -->
        <fieldset>
            <legend>Pricing Details</legend>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" required><br><br>

            <label for="sale_price">Sale Price:</label>
            <input type="text" name="sale_price" id="sale_price" required><br><br>

            <label for="billing_on">Billing On:</label>
            <input type="text" name="billing_on" id="billing_on" required><br><br>
        </fieldset>

        <!-- Shipment Details -->
        <fieldset>
            <legend>Shipment Details</legend>
            <label for="carrier">Carrier:</label>
            <input type="text" name="carrier" id="carrier" required><br><br>

            <label for="operator">Operator:</label>
            <input type="text" name="operator" id="operator" required><br><br>

            <label for="agent">Agent:</label>
            <input type="text" name="agent" id="agent" required><br><br>

            <label for="loading_port">Loading Port:</label>
            <input type="text" name="loading_port" id="loading_port" required><br><br>

            <label for="dispatch_port">Dispatch Port:</label>
            <input type="text" name="dispatch_port" id="dispatch_port" required><br><br>

            <label for="voyage">Voyage:</label>
            <input type="text" name="voyage" id="voyage" required><br><br>

            <label for="no_of_containers">No of Containers:</label>
            <input type="text" name="no_of_containers" id="no_of_containers" required><br><br>
        </fieldset>

        <input type="submit" class="submit-button" value="Submit">
    </form>
</body>
</html>
