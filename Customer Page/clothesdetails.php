<?php
include("fyprodbconnection.php");
ob_start();
if (!isset($_SESSION['loggedin'])) {
	include("header.php");
}
else
	include("header(loggedin).php");

// check if clothes_id is set in the URL
if(isset($_GET['clothes_id'])) {
    $clothes_id = $_GET['clothes_id'];

    // fetch product details from database
    $result = mysqli_query($connect, "SELECT * FROM clothes WHERE clothes_id = '$clothes_id'");
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){
        $clothes_name = $row["clothes_name"];
        $clothes_price = $row["clothes_price"];
        $clothes_image = $row["clothes_image"];
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
    <title><?php echo $clothes_name; ?></title>
    <link rel="stylesheet" href="clothesdetails.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <h1 class="title"><?php echo $clothes_name; ?></h1>
        <hr>
        <div class="product-details">
            <div class="product-image">
                <img src="<?php echo $clothes_image; ?>" alt="Clothes Image">
            </div>
            <div class="product-info">
                <p class="product-price">RM <?php echo number_format($clothes_price, 2); ?></p>
                <p class="product-description"><?php echo $row["clothes_detail"]; ?></p>
                <form action="" method="post">
                    <input type="hidden" name="clothes_id" value="<?php echo $clothes_id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $clothes_name; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $clothes_price; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $clothes_image; ?>">
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
    $clothes_id = $_POST['clothes_id'];
    $clothes_name = $_POST['product_name'];
    $clothes_price = $_POST['product_price'];
    $clothes_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];
    $total = $quantity * $clothes_price;
    $insert_cart_sql = "INSERT INTO cart(product_id, product_name, product_price, product_image, quantity, total_price) VALUES ('$clothes_id', '$clothes_name', '$clothes_price', '$clothes_image', '$quantity', '$total')";

    mysqli_query($connect, $insert_cart_sql);
    // redirect to cart page
    ob_clean();
    header('Location: cart.php');
    exit;
}
?>
