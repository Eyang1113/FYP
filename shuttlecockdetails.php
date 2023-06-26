<?php
ob_start();
session_start();
if (!isset($_SESSION['loggedin'])) {
    include("header.php");
} else {
    include("header(loggedin).php");
}
include("fyprodbconnection.php");

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
        $shuttlecock_category = $row["shuttlecock_category"];
        $shuttlecock_stock = $row["shuttlecock_stock"];
        $shuttlecock_id = $row["shuttlecock_id"];
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
    <link rel="stylesheet" href="shuttlecockdetails.css?v=<?php echo time(); ?>">
    <script>
        function showAlert() {
            alert("Added to cart successfully");
        }
    </script>
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
                    <input type="hidden" name="shuttlecock_category" value="<?php echo $shuttlecock_category; ?>">
                    <input type="hidden" name="shuttlecock_id" value="<?php echo $shuttlecock_id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $shuttlecock_name; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $shuttlecock_price; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $shuttlecock_image; ?>">
                    <input type="number" name="quantity" value="1" min="1" required>
                    <button class="add-to-cart" type="submit" name="add_to_cart" >Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <?php include ('footer.php'); ?>
</body>
</html>

<?php
if (isset($_POST["add_to_cart"])) {
    $user_id = $_SESSION['id'];
    $shuttlecock_id = $_POST['shuttlecock_id'];
    $shuttlecock_category = $_POST['shuttlecock_category'];
    $shuttlecock_name = $_POST['product_name'];
    $shuttlecock_price = $_POST['product_price'];
    $shuttlecock_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];
    $total = $quantity * $shuttlecock_price;

    $balance = $shuttlecock_stock - $quantity;
    if ($balance >= 0) {
        mysqli_query($connect, "INSERT INTO cart(product_id, product_name, product_price, product_image, quantity, total_price, user_id, product_category) VALUES ('$shuttlecock_id', '$shuttlecock_name', '$shuttlecock_price', '$shuttlecock_image', '$quantity', '$total', '$user_id', '$shuttlecock_category')");
        // redirect to cart page
        ob_clean();
        header('Location: cart.php');
        exit;
    } else {
        // Display alert box
        echo "<script>alert('Your Quantity is more than the stock that we have. Please change.');</script>";
    }
}
?>

