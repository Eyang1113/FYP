<?php
include("fyprodbconnection.php");
session_start();

if (!isset($_SESSION['loggedin'])) {
    include("header.php");
} else {
    include("header(loggedin).php");
}

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    // Retrieve the orders
    $retrieve_orders_sql = "SELECT * FROM orders WHERE user_id = $user_id ORDER BY order_id DESC";
    $result_orders = mysqli_query($connect, $retrieve_orders_sql);
} else {
    $result_orders = false;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <link rel="stylesheet" href="order.css?<?php echo time(); ?>">
</head>
<body>
<h1>Order Records</h1>
<table>
    <thead>
    <tr>
        <th>Order ID</th>
        <th>Customer Name</th>
        <th>Customer Number</th>
        <th>Customer Address</th>
        <th>Order Items</th>
        <th>Total Price (RM)</th>
        <th>Order Date</th>
        <th>Payment Method</th>
        <th>Delivery Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($result_orders && mysqli_num_rows($result_orders) > 0) {
        while ($row_orders = mysqli_fetch_assoc($result_orders)) {
            $order_id = $row_orders['order_id'];
            $customer_name = $row_orders['customer_name'];
            $customer_number = $row_orders['customer_number'];
            $customer_address = $row_orders['customer_address'];
            $order_items_json = $row_orders['order_item'];
            $order_total_price = $row_orders['order_total_price'];
            $order_date = $row_orders['order_date'];
            $payment_method = $row_orders['payment_method'];
            $delivery_status = $row_orders['delivery_status'];

            // Decode the JSON string to an array
            $order_items = json_decode($order_items_json, true);

            echo "<tr>";
            echo "<td>$order_id</td>";
            echo "<td>$customer_name</td>";
            echo "<td>$customer_number</td>";
            echo "<td>$customer_address</td>";
            echo "<td>";
                if (is_array($order_items)) {
                    foreach ($order_items as $item) {
                        $item_name = $item['name'];
                        $item_price = $item['price'];
                        $item_quantity = $item['quantity'];

                        echo "$item_name x $item_quantity<br>";
                    }
                } else {
                    echo "Invalid order items.";
                }
                echo "</td>";
            echo "<td>RM " . number_format($order_total_price, 2) . "</td>";
            echo "<td>$order_date</td>";
            echo "<td>$payment_method</td>";
            echo "<td>$delivery_status</td>";
            echo "<td><form method='post' action='generate_pdf.php' target='_blank'><input type='hidden' name='order_id' value='$order_id'><button type='submit' name='generatepdf' class='generatepdf'><b>Generate PDF</b></button></form><br><br></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>No orders found.</td></tr>";
    }
    ?>
    </tbody>
</table>

<?php include("footer.php"); ?>
</body>
</html>
