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
if(isset($_GET['racquet_id'])) {
    $racquet_id = $_GET['racquet_id'];

    // fetch product details from database
    $result = mysqli_query($connect, "SELECT * FROM racquet WHERE racquet_id = '$racquet_id'");
    $row = mysqli_fetch_assoc($result);
    if(!empty($row)){
        $racquet_name = $row["racquet_name"];
        $racquet_price = $row["racquet_price"];
        $racquet_image = $row["racquet_images"];
        $racquet_category = $row["racquet_category"];
        $racquet_stock = $row["racquet_stock"];
        $racquet_id = $row["racquet_id"];
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
    <title><?php echo $racquet_name; ?></title>
    <link rel="stylesheet" href="racquetdetails.css?v=<?php echo time(); ?>">
    <script>
        function showAlert() {
            alert("Added to cart successfully");
        }
    </script>
</head>
<body>
    <div class="container">
        <h1 class="title"><?php echo $racquet_name; ?></h1>
        <hr>
        <div class="product-details">
            <div class="product-image">
                <img src="<?php echo $racquet_image; ?>">
            </div>
            <div class="product-info">
                <p class="product-price">RM <?php echo number_format($racquet_price, 2); ?></p>
                <p class="product-description"><?php echo $row["racquet_detail"]; ?></p>
                <form action="" method="post">
                    <input type="hidden" name="racquet_category" value="<?php echo $racquet_category; ?>">
                    <input type="hidden" name="racquet_id" value="<?php echo $racquet_id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $racquet_name; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $racquet_price; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $racquet_image; ?>">
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
    $racquet_id = $_POST['racquet_id'];
    $racquet_category = $_POST['racquet_category'];
    $racquet_name = $_POST['product_name'];
    $racquet_price = $_POST['product_price'];
    $racquet_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];
    $total = $quantity * $racquet_price;

    $balance = $racquet_stock - $quantity;
    if ($balance >= 0) {
        mysqli_query($connect, "INSERT INTO cart(product_id, product_name, product_price, product_image, quantity, total_price, user_id, product_category) VALUES ('$racquet_id', '$racquet_name', '$racquet_price', '$racquet_image', '$quantity', '$total', '$user_id', '$racquet_category')");
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