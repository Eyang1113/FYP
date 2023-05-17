<?php
include("fyprodbconnection.php");
ob_start();
if (!isset($_SESSION['loggedin'])) {
	include("header.php");
}
else
	include("header(loggedin).php");
// check if racquet_id is set in the URL
if(isset($_GET['bag_id'])) {
    $bag_id = $_GET['bag_id'];

    // fetch product details from database
    $result = mysqli_query($connect, "SELECT * FROM bag WHERE bag_id = '$bag_id'");
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){
        $bag_name = $row["bag_name"];
        $bag_price = $row["bag_price"];
        $bag_image = $row["bag_image"];
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
    <title><?php echo $bag_name; ?></title>
    <link rel="stylesheet" href="bagdetails.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <h1 class="title"><?php echo $bag_name; ?></h1>
        <hr>
        <div class="product-details">
            <div class="product-image">
                <img src="<?php echo $bag_image; ?>">
            </div>
            <div class="product-info">
                <p class="product-price">RM <?php echo number_format($bag_price, 2); ?></p>
                <p class="product-description"><?php echo $row["bag_detail"]; ?></p>
                <form action="" method="post">
                    <input type="hidden" name="bag_id" value="<?php echo $bag_id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $bag_name; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $bag_price; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $bag_image; ?>">
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
            alert("Add to Cart successfull");
        </script>
    ';
    $bag_id = $_POST['bag_id'];
    $bag_name = $_POST['product_name'];
    $bag_price = $_POST['product_price'];
    $bag_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];
    $total = $quantity * $racquet_price;
    $insert_cart_sql = "INSERT INTO cart(product_id, product_name, product_price, product_image, quantity, total_price) VALUES($bag_id, '$bag_name', $bag_price, '$bag_image', $quantity, $total); ";

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
