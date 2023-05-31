<?php
include("fyprodbconnection.php");
session_start();

if (!isset($_SESSION['loggedin'])) {
    echo "<script>alert('Please login first!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit;
} else {
    include("header(loggedin).php");
    $user_id = $_SESSION['id'];
}

// Handle update quantity form submission
if (isset($_POST['update_quantity'])) {
    $cart_item_ids = $_POST['cart_item_id'];
    $quantities = $_POST['quantity'];

    foreach ($cart_item_ids as $index => $cart_item_id) {
        $quantity = $quantities[$index];

        $update_quantity_sql = "UPDATE cart SET quantity = $quantity WHERE id = $cart_item_id";
        mysqli_query($connect, $update_quantity_sql);
    }
}

// Handle remove from cart form submission
if (isset($_POST['remove_from_cart'])) {
    $cart_item_id = $_POST['cart_item_id'];
    $remove_item_sql = "DELETE FROM cart WHERE id = $cart_item_id";
    mysqli_query($connect, $remove_item_sql);
    header('Location: cart.php');
    exit;
}

// Handle checkout button click
if (isset($_POST['checkout'])) {
    // Redirect to the payment page
    header('Location: make_payment.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="cart.css?<?php echo time(); ?>">
    <script>
        function confirmRemove() {
            return confirm('Are you sure you want to remove this item from your cart?');
        }

        function updateCartQuantity(cartItemId, newQuantity) {
            // Send an AJAX request to update the quantity in the database
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'cart.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    console.log('Quantity updated in the database');
                } else {
                    console.error('Error updating quantity in the database');
                }
            };
            const params = `update_quantity=true&cart_item_id[]=${cartItemId}&quantity[]=${newQuantity}`;
            xhr.send(params);
        }
    </script>
</head>
<body>
    <h1>Shopping Cart</h1>
    <form action="" method="post">
        <table>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Actions</th>
            </tr>

            <?php
            $total = 0;
            $find_cart_sql = "SELECT * FROM cart WHERE user_id = $user_id";
            $result_cart = mysqli_query($connect, $find_cart_sql);
            if (mysqli_num_rows($result_cart) > 0) {
                while ($row_cart = mysqli_fetch_assoc($result_cart)) {
                    $cart_item_id = $row_cart['id'];
                    $product_image = $row_cart['product_image'];
                    $product_name = $row_cart['product_name'];
                    $product_price = $row_cart['product_price'];
                    $quantity = $row_cart['quantity'];
                    $product_total = $product_price * $quantity;

                    echo "<tr>";
                    echo "<td><img src='$product_image' class='img-class'></td>";
                    echo "<td>$product_name</td>";
                    echo "<td>$product_price</td>";
                    echo "<td>
                        <select name='quantity[]' onchange='updateCartQuantity($cart_item_id, this.value)'>";
                            for ($i = 1; $i <= 30; $i++) {
                                $selected = ($i == $quantity) ? 'selected' : '';
                                echo "<option value='$i' $selected>$i</option>";
                            }
                    echo "</select>
                    </td>";
                    echo "<td>$product_total</td>";
                    echo "<td>
                        <input type='hidden' name='cart_item_id[]' value='$cart_item_id'>
                        <button class='remove-button' type='submit' name='remove_from_cart' onclick='return confirmRemove()'>Remove</button>
                    </td>";

                    echo "</tr>";

                    $total += $product_total;
                }
            }
            ?>

            <tr class="total-row">
                <td colspan="3" align="right">Total:</td>
                <td colspan="2"><?php echo $total; ?></td>
                <td></td>
            </tr>
        </table>
        <br>
        <div class="checkout-container">
            <a href="mainpage.php" class="continue-shopping-link">Continue Shopping</a>
            <?php if (isset($_SESSION['loggedin'])) { ?>
                <button class="checkout-button" type="submit" name="checkout">Checkout</button>
            <?php } else { ?>
                <p>Please log in to your account first. Thank you ~ </p>
            <?php } ?>
        </div>
    </form>
    <?php include 'footer.php'; ?>
</body>
</html>
