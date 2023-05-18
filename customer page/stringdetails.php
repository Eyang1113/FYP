<?php
ob_start();
session_start();
if (!isset($_SESSION['loggedin'])) {
    include("header.php");
} else {
    include("header(loggedin).php");
}
include("fyprodbconnection.php");

// check if string_id is set in the URL
if(isset($_GET['string_id'])) {
    $string_id = $_GET['string_id'];

    // fetch product details from database
    $result = mysqli_query($connect, "SELECT * FROM string WHERE string_id = '$string_id'");
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){
        $string_name = $row["string_name"];
        $string_price = $row["string_price"];
        $string_image = $row["string_image"];
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
    <title><?php echo $string_name; ?></title>
    <link rel="stylesheet" href="stringdetails.css?v=<?php echo time(); ?>">
    <script>
        function showAlert() {
            alert("Added to cart successfully");
        }
    </script>
</head>
<body>
    <div class="container">
        <h1 class="title"><?php echo $string_name; ?></h1>
        <hr>
        <div class="product-details">
            <div class="product-image">
                <img src="<?php echo $string_image; ?>" alt="String Image">
            </div>
            <div class="product-info">
                <p class="product-price">RM <?php echo number_format($string_price, 2); ?></p>
                <p class="product-description"><?php echo $row["string_detail"]; ?></p>
                <form action="" method="post">
                    <input type="hidden" name="string_id" value="<?php echo $string_id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $string_name; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $string_price; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $string_image; ?>">
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
    $user_id = $_SESSION['id'];
    $string_id = $_POST['string_id'];
    $string_name = $_POST['product_name'];
    $string_price = $_POST['product_price'];
    $string_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];
    $total = $quantity * $string_price;
    $insert_cart_sql = "INSERT INTO cart(product_id, product_name, product_price, product_image, quantity, total_price, user_id) VALUES($string_id, '$string_name', $string_price, '$string_image', $quantity, $total, $user_id)";

    mysqli_query($connect, $insert_cart_sql);
    // redirect to cart page
    ob_clean();
    header('Location: cart.php');
    exit;
}
?>







