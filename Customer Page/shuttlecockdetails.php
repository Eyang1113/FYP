<?php
ob_start();
include("fyprodbconnection.php");
include("header.php");

// check if racquet_id is set in the URL
if(isset($_GET['shuttlecock_id'])) {
    $shuttlecock_id = $_GET['shuttlecock_id'];

    // fetch product details from database
    $result = mysqli_query($connect, "SELECT * FROM shuttlecock WHERE shuttlecock_id = '$shuttlecock_id'");
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){
        $shuttlecock_name = $row["shuttlecock_name"];
        $shuttlecock_price = $row["shuttlecock_price"];
        $shuttlecock_image = $row["shuttlecock_image"];
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "Product ID not specified.";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $shuttlecock_name; ?></title>
    <link rel="stylesheet" href="shuttlecockdetails.css">
</head>
<body>
    <div class="container">
        <h1 class="title"><?php echo $shuttlecock_name; ?></h1>
        <hr>
        <div class="product-details">
            <div class="product-image">
                <img src="<?php echo $shuttlecock_image; ?>">
            </div>
            <div class="product-info">
                <p class="product-price">RM <?php echo number_format($shuttlecock_price, 2); ?></p>
                <p class="product-description"><?php echo $row["shuttlecock_detail"]; ?></p>
                <form action="" method="post">
                    <input type="hidden" name="shuttlecock_id" value="<?php echo $shuttlecock_id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $shuttlecock_name; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $shuttlecock_price; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $shuttlecock_image; ?>">
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
            alert("Add to Cart successfullt");
        </script>
    ';
    $racquet_id = $_POST['shuttlecock_id'];
    $racquet_name = $_POST['product_name'];
    $racquet_price = $_POST['product_price'];
    $racquet_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];
    $total = $quantity * $shuttlecock_price;
    $insert_cart_sql = "INSERT INTO cart(product_id, product_name, product_price, product_image, quantity, total_price) VALUES($shuttlecock_id, '$shuttlecock_name', $shuttlecock_price, '$shuttlecock_image', $quantity, $total); ";

    // echo $racquet_id;
    // echo $racquet_name;
    // echo $racquet_price;
    // echo $racquet_image;
    // echo $quantity;
    // echo $total;

    mysqli_query($connect,  $insert_cart_sql);
    // redirect to cart page
    ob_clean();
    header('Location: cart.php');
    exit;
}
?>
