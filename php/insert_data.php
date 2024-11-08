<?php
include '../php_tools/db_connect.php'; // Include database connection

// Retrieve form data and sanitize input to prevent SQL injection
$order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
$direction = mysqli_real_escape_string($conn, $_POST['direction']);
$customer = mysqli_real_escape_string($conn, $_POST['customer']);
$consignee = mysqli_real_escape_string($conn, $_POST['consignee']);
$transporter = mysqli_real_escape_string($conn, $_POST['transporter']);
$land_shipping = mysqli_real_escape_string($conn, $_POST['land_shipping']);
$order_data = mysqli_real_escape_string($conn, $_POST['order_data']);
$client_id = mysqli_real_escape_string($conn, $_POST['client_id']);

$type_of_goods = mysqli_real_escape_string($conn, $_POST['type_of_goods']);
$name_of_goods = mysqli_real_escape_string($conn, $_POST['name_of_goods']);
$gross_weight = mysqli_real_escape_string($conn, $_POST['gross_weight']);
$volume = mysqli_real_escape_string($conn, $_POST['volume']);
$vessel = mysqli_real_escape_string($conn, $_POST['vessel']);

$price = mysqli_real_escape_string($conn, $_POST['price']);
$sale_price = mysqli_real_escape_string($conn, $_POST['sale_price']);
$billing_on = mysqli_real_escape_string($conn, $_POST['billing_on']);

$carrier = mysqli_real_escape_string($conn, $_POST['carrier']);
$operator = mysqli_real_escape_string($conn, $_POST['operator']);
$agent = mysqli_real_escape_string($conn, $_POST['agent']);
$loading_port = mysqli_real_escape_string($conn, $_POST['loading_port']);
$dispatch_port = mysqli_real_escape_string($conn, $_POST['dispatch_port']);
$voyage = mysqli_real_escape_string($conn, $_POST['voyage']);
$no_of_containers = mysqli_real_escape_string($conn, $_POST['no_of_containers']);

// Insert into basic details table
$insert_basic = "INSERT INTO basic_details (order_id, direction, customer, consignee, transporter, land_shipping,Order_Data) 
                 VALUES ('$order_id', '$direction', '$customer', '$consignee', '$transporter', '$land_shipping','$order_data')";
$basic_result = mysqli_query($conn, $insert_basic);

// Check if the insertion into basic_details was successful
if ($basic_result) {
    // Insert into goods details table
    $insert_goods = "INSERT INTO goods_details (order_id, type_of_goods, name_of_goods, gross_weight, volume, vessel) 
                     VALUES ('$order_id', '$type_of_goods', '$name_of_goods', '$gross_weight', '$volume', '$vessel')";
    $goods_result = mysqli_query($conn, $insert_goods);

    // Check if the insertion into goods-details was successful
    if ($goods_result) {
        // Insert into pricing details table
        $insert_pricing = "INSERT INTO pricing (order_id, price, sale_price, billing_on) 
                           VALUES ('$order_id', '$price', '$sale_price', '$billing_on')";
        $pricing_result = mysqli_query($conn, $insert_pricing);

        // Check if the insertion into pricing was successful
        if ($pricing_result) {
            // Insert into shipment details table
            $insert_shipment = "INSERT INTO shipment_details (order_id, carrier, operator, agent, loading_port, dispatch_port, voyage, no_of_containers) 
                                VALUES ('$order_id', '$carrier', '$operator', '$agent', '$loading_port', '$dispatch_port', '$voyage', '$no_of_containers')";
            $shipment_result = mysqli_query($conn, $insert_shipment);

            // Check if the insertion into shipment-details was successful
            if ($shipment_result) {
              $order_map = "INSERT INTO order_map (order_id,Client_ID) 
                                VALUES ('$order_id', '$client_id')";
              $order_map_result = mysqli_query($conn, $order_map);
              if($order_map_result){
                echo '<script>alert("Shipping information has been successfully inserted!")</script>';
                header('location: ../php/Dashboard.php');
              }else {
                echo "Error inserting into order-map-result: " . mysqli_error($conn);
            }
            } else {
                echo "Error inserting into shipment-details: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting into pricing: " . mysqli_error($conn);
        }
    } else {
        echo "Error inserting into goods-details: " . mysqli_error($conn);
    }
} else {
    echo "Error inserting into basic_details: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
