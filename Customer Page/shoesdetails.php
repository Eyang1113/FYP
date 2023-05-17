<?php
ob_start();
include("fyprodbconnection.php");
include("header.php");

// check if shoe_id is set in the URL
if(isset($_GET['shoe_id'])) {
    $shoe_id = $_GET['shoe_id'];

    // fetch product details from database
    $result = mysqli_query($connect, "SELECT * FROM shoe WHERE shoe_id = '$shoe_id'");
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){
        $shoe_name = $row['shoe_name'];
        $shoe_price = $row['shoe_price'];
        $shoe_image = $row['shoes_images'];
    } else {
        echo 'Product not found.';
        exit;
    }
} else {
    echo 'Product ID not specified.';
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $shoe_name; ?></title>
    <link rel="stylesheet" href="shoesdetails.css">
</head>
<body>
    <div class="container">
        <h1 class="title"><?php echo $shoe_name; ?></h1>
        <hr>
        <div class="product-details">
            <div class="product-image">
                <img src="<?php echo $shoe_image; ?>" alt="Shoe Image">
            </div>
            <div class="product-info">
                <p class="product-price">RM <?php echo number_format($shoe_price, 2); ?></p>
                <p class="product-description"><?php echo $row["shoe_detail"]; ?></p>
                <form action="" method="post">
                    <input type="hidden" name="shoe_id" value="<?php echo $shoe_id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $shoe_name; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $shoe_price; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $shoe_image; ?>">
                    <input type="number" name="quantity" value="1" min="1" required>
                    <button class="add-to-cart" type="submit" name="add_to_cart">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <?php include ('footer.php'); ?>
</body>
</html>

<?php
// handle add to cart form submission
if(isset($_POST['add_to_cart'])) {
    echo '
        <script>
            alert("Added to Cart successfully");
        </script>
    ';
    $shoe_id = $_POST['shoe_id'];
    $shoe_name = $_POST['product_name'];
    $shoe_price = $_POST['product_price'];
    $shoe_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];
    $total = $quantity * $shoe_price;
    $insert_cart_sql = "INSERT INTO cart(product_id, product_name, product_price, product_image, quantity, total_price) VALUES('$shoe_id', '$shoe_name', '$shoe_price', '$shoe_image', '$quantity', '$total')";

    mysqli_query($connect,  $insert_cart_sql);
    // redirect to cart page
    ob_clean();
    header('Location: cart.php');
    exit;
}
?>