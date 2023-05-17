<?php
session_start();
include('fyprodbconnection.php');
include("header.php");

// Retrieve the orders from the database
$get_orders_sql = "SELECT customer_name, customer_number, customer_address, order_item, order_total_price, order_date, payment_method, payment_status FROM orders";
$result_orders = mysqli_query($connect, $get_orders_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <link rel="stylesheet" href="order.css?<?php echo time(); ?>">
</head>
<body>
    <h1>Order Records</h1>
    <div class="order-list">
        <table>
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Number</th>
                    <th>Customer Address</th>
                    <th>Order Items</th>
                    <th>Total Price (RM)</th>
                    <th>Order Date</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result_orders) > 0) {
                    while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                        $customer_name = $row_orders['customer_name'];
                        $customer_number = $row_orders['customer_number'];
                        $customer_address = $row_orders['customer_address'];
                        $order_items = $row_orders['order_item'];
                        $order_total_price = $row_orders['order_total_price'];
                        $order_date = $row_orders['order_date'];
                        $payment_method = $row_orders['payment_method'];
                        $payment_status = $row_orders['payment_status'];

                        echo "<tr>";
                        echo "<td>$customer_name</td>";
                        echo "<td>$customer_number</td>";
                        echo "<td>$customer_address</td>";
                        echo "<td>$order_items</td>";
                        echo "<td>" . number_format($order_total_price, 2) . "</td>";
                        echo "<td>$order_date</td>";
                        echo "<td>$payment_method</td>";
                        echo "<td>$payment_status</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
