<?php
include("fyprodbconnection.php");
session_start();
if (!isset($_SESSION['loggedin'])) {
    include("header.php");
} else {
    include("header(loggedin).php");
}

// Retrieve cart items
$user_id = $_SESSION['id'];
$cart_sql = "SELECT * FROM cart WHERE user_id = $user_id";
$result_cart = mysqli_query($connect, $cart_sql);

// Check if there are any cart items
if (mysqli_num_rows($result_cart) <= 0) {
    echo "<h2>Your cart is empty.</h2>";
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <link rel="stylesheet" href="receipt.css?<?php echo time(); ?>">
</head>
<body>
    <div class="receipt">
        <div class="header">
            <h1>Receipt</h1>
        </div>
        <div class="content">
            <div class="order-details">
                <h2>Order Details</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price (RM)</th>
                            <th>Quantity</th>
                            <th>Total (RM)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0; // Initialize total to 0
                        while ($row_cart = mysqli_fetch_assoc($result_cart)) {
                            $product_id = $row_cart['product_id'];
                            $quantity = $row_cart['quantity'];

                            // Fetch product information from the 'products' table
                            $product_sql = "SELECT * FROM products WHERE product_id = $product_id";
                            $result_product = mysqli_query($connect, $product_sql);
                            $product_info = mysqli_fetch_assoc($result_product);

                            $product_name = $product_info['product_name'];
                            $product_price = $product_info['product_price'];
                            $product_total = $product_price * $quantity;

                            echo "<tr>";
                            echo "<td>$product_name</td>";
                            echo "<td>" . number_format($product_price, 2) . "</td>";
                            echo "<td>$quantity</td>";
                            echo "<td>" . number_format($product_total, 2) . "</td>";
                            echo "</tr>";

                            $total += $product_total;
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="customer-details">
                <h2>Customer Details</h2>
                <?php
                // Fetch user information from the database
                $user_sql = "SELECT * FROM user WHERE user_id = $user_id";
                $result_user = mysqli_query($connect, $user_sql);
                $user_info = mysqli_fetch_assoc($result_user);

                $customer_name = $user_info['username'];
                $customer_number = $user_info['contact'];
                $customer_address = $user_info['address'];

                echo "<p><strong>Name:</strong> $customer_name</p>";
                echo "<p><strong>Contact Number:</strong> $customer_number</p>";
                echo "<p><strong>Address:</strong> $customer_address</p>";
                ?>
            </div>

            <div class="payment-details">
                <h2>Payment Details</h2>
                <?php
                // Retrieve payment method from the form submission
                $payment_method = $_POST['payment_method'];

                echo "<p><strong>Payment Method:</strong> $payment_method</p>";
                echo "<p><strong>Total:</strong> RM " . number_format($total, 2) . "</p>";
                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>This is the footer.</p>
    </div>
</body>
</html>
