<?php
include("fyprodbconnection.php");
session_start();
$user_id = $_SESSION['id'];
if (!isset($_SESSION['loggedin'])) {
	include("header.php");
}
else
	include("header(loggedin).php");

// Handle remove from cart form submission
if(isset($_POST['remove_from_cart'])) {
    $cart_item_id = $_POST['cart_item_id'];
    $remove_item_sql = "DELETE FROM cart WHERE id = $cart_item_id";
    mysqli_query($connect, $remove_item_sql);
    header('Location: cart.php');
    exit;
}

// Handle checkout button click
if(isset($_POST['checkout'])) {
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
</head>
<body>
    <h1>Shopping Cart</h1>
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
        $find_cart_sql = "SELECT * FROM cart where user_id = $user_id";
        $result_cart = mysqli_query($connect, $find_cart_sql);
        if(mysqli_num_rows($result_cart) > 0){
            while($row_cart = mysqli_fetch_assoc($result_cart)){
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
                echo "<td>$quantity</td>";
                echo "<td>$product_total</td>";
                echo "<td>
                <form action='' method='post'>
                  <input type='hidden' name='cart_item_id' value='$cart_item_id'>
                  <button class='remove-button' type='submit' name='remove_from_cart'>Remove</button>
                </form>
              </td>";
        
                echo "</tr>";

                $total += $product_total;
            }
        }
        ?>
        
        <tr class="total-row">
            <td colspan="3" align="right">Total:</td>
            <td><?php echo $total; ?></td>
            <td colspan="2"></td>
        </tr>
    </table>
    <br>
    <div class="checkout-container">
        <a href="mainpage.php" class="continue-shopping-link">Continue Shopping</a>
        <?php if (isset($_SESSION['loggedin'])) { ?>
            <form action="" method="post">
                <button class="checkout-button" type="submit" name="checkout">Checkout</button>
            </form>
        <?php } else { ?>
            <p>Please log in to your account first. Thank you ~ </p>
        <?php } ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
