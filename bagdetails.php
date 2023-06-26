<?php
ob_start();
session_start();
if (!isset($_SESSION['loggedin'])) {
    include("header.php");
} else {
    include("header(loggedin).php");
}
include("fyprodbconnection.php");

// check if bag_id is set in the URL
if (isset($_GET['bag_id'])) {
    $bag_id = $_GET['bag_id'];

    // fetch product details from database
    $result = mysqli_query($connect, "SELECT * FROM bag WHERE bag_id = '$bag_id'");
    $row = mysqli_fetch_assoc($result);
    if (!empty($row)) {
        $bag_name = $row["bag_name"];
        $bag_price = $row["bag_price"];
        $bag_image = $row["bag_image"];
        $bag_category = $row["bag_category"];
        $bag_stock = $row["bag_stock"];
        $bag_id = $row["bag_id"];
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
    <script>
        function showAlert() {
            alert("Added to cart successfully");
        }
    </script>
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
                    <input type="hidden" name="bag_category" value="<?php echo $bag_category; ?>">
                    <input type="hidden" name="bag_stock" value="<?php echo $bag_stock; ?>">
                    <input type="hidden" name="bag_id" value="<?php echo $bag_id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $bag_name; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $bag_price; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $bag_image; ?>">
                    <input type="number" name="quantity" value="1" min="1" required>
                    <button class="add-to-cart" type="submit" name="add_to_cart" >Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>
</html>

<?php
if (isset($_POST["add_to_cart"])) {
    $user_id = $_SESSION['id'];
    $bag_id = $_POST['bag_id'];
    $bag_category = $_POST['bag_category'];
    $bag_name = $_POST['product_name'];
    $bag_price = $_POST['product_price'];
    $bag_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];
    $total = $quantity * $bag_price;

    $balance = $bag_stock - $quantity;
    if ($balance >= 0) {
        mysqli_query($connect, "INSERT INTO cart(product_id, product_name, product_price, product_image, quantity, total_price, user_id, product_category) VALUES ('$bag_id', '$bag_name', '$bag_price', '$bag_image', '$quantity', '$total', '$user_id', '$bag_category')");
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