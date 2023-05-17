<?php
session_start();
include('fyprodbconnection.php');
include("header.php");

// Retrieve the cart items
$find_cart_sql = "SELECT * FROM cart";
$result_cart = mysqli_query($connect, $find_cart_sql);

// Calculate the total price
$total = 0;
if (mysqli_num_rows($result_cart) > 0) {
    while ($row_cart = mysqli_fetch_assoc($result_cart)) {
        $product_name = $row_cart['product_name'];
        $product_price = $row_cart['product_price'];
        $quantity = $row_cart['quantity'];
        $product_total = $product_price * $quantity;

        $total += $product_total;
    }
}

// Handle form submission
if (isset($_POST['make_payment'])) {
    // Check if there are products in the cart
    if (mysqli_num_rows($result_cart) > 0) {
        $customer_name = $_POST['customer_name'];
        $customer_number = $_POST['customer_number'];
        $customer_address = $_POST['customer_address'];
        $payment_method = $_POST['payment_method']; // Get the selected payment method

        // Prepare the order_items as a string
        mysqli_data_seek($result_cart, 0); // Reset the result pointer to the beginning
        $order_items = "";
        if (mysqli_num_rows($result_cart) > 0) {
            while ($row_cart = mysqli_fetch_assoc($result_cart)) {
                $product_name = $row_cart['product_name'];
                $product_price = $row_cart['product_price'];
                $quantity = $row_cart['quantity'];
                $product_total = $product_price * $quantity;

                $order_items .= "$product_name - RM " . number_format($product_price, 2) . " x $quantity = RM " . number_format($product_total, 2) . "\n";
            }
        }

        // Insert the order into the database
        $insert_order_sql = "INSERT INTO orders (customer_name, customer_number, customer_address, order_item, order_total_price, order_date, payment_method) VALUES ('$customer_name', '$customer_number', '$customer_address', '$order_items', $total, CURDATE(), '$payment_method')";
        mysqli_query($connect, $insert_order_sql);

        // Clear the cart after successful order placement
        $clear_cart_sql = "DELETE FROM cart";
        mysqli_query($connect, $clear_cart_sql);

        // Redirect to the order record page
        ob_start(); // Start output buffering
        header("Location: orders.php");
        ob_end_flush(); // Flush output buffer and redirect
        exit();
    } else {
        $notification = "Fail to make a payment because there are no products in your cart!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Make Payment</title>
    <link rel="stylesheet" href="make_payment.css?<?php echo time(); ?>">
</head>
<body>
    <h1>Make Payment</h1>
    <div class="payment-details">
        <h2>Order Summary</h2>
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
                    mysqli_data_seek($result_cart, 0); // Reset the result pointer to the beginning
                    $total = 0; // Initialize total to 0
                    if (mysqli_num_rows($result_cart) > 0) {
                        while ($row_cart = mysqli_fetch_assoc($result_cart)) {
                            $product_name = $row_cart['product_name'];
                            $product_price = $row_cart['product_price'];
                            $quantity = $row_cart['quantity'];
                            $product_total = $product_price * $quantity;

                            echo "<tr>";
                            echo "<td>$product_name</td>";
                            echo "<td>" . number_format($product_price, 2) . "</td>";
                            echo "<td>$quantity</td>";
                            echo "<td>" . number_format($product_total, 2) . "</td>";
                            echo "</tr>";

                            $total += $product_total;
                        }
                    }
                ?>
            </tbody>
        </table>

        <h3>Total: <?php echo "RM " . number_format($total, 2); ?></h3>
    </div>

    </div>
    <div class="payment-form">
        <h2>Customer Information</h2>
        <form action="" method="post">
                <div class="form-group">
                    <label for="customer_name">Customer Name :</label>
                    <input type="text" name="customer_name" required>
                    <br><br>
                    <label for="customer_number">Customer Number :</label>
                    <input type="text" name="customer_number" required>
                    <br><br>
                    <label for="customer_address">Customer Address :</label>
                    <input type="text" name="customer_address" required>
                    <br><br>
                    <label for="payment_method">Payment Method :</label>
                    <select name="payment_method" required>
                        <option value="" disabled selected>Select Payment Method</option>
                        <option value="TNG">TNG</option>
                        <option value="FPX">FPX</option>
                        <option value="VISA">VISA</option>
                    </select>
                    <br><br> <!-- Add line breaks to create space between the select and button -->
                    <div class="form-group">
                        <button type="submit" name="make_payment">Make a Payment</button>
                    </div>
                </div>
            </form>

    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
