<?php
ob_start();
session_start();
if (!isset($_SESSION['loggedin'])) {
    include("header.php");
} else {
    include("header(loggedin).php");
}
include("fyprodbconnection.php");

// check if clothes_id is set in the URL
if (isset($_GET['clothes_id'])) {
    $clothes_id = $_GET['clothes_id'];

    // fetch product details from database
    $result = mysqli_query($connect, "SELECT * FROM clothes WHERE clothes_id = '$clothes_id'");
    $row = mysqli_fetch_assoc($result);
    if (!empty($row)) {
        $clothes_name = $row["clothes_name"];
        $clothes_price = $row["clothes_price"];
        $clothes_image = $row["clothes_image"];
        $clothes_category = $row["clothes_category"];
        $clothes_stock = $row["clothes_stock"];
        $clothes_id = $row["clothes_id"];
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
    <script>
        function showAlert() {
            alert("Added to cart successfully");
        }
    </script>
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
                    <input type="hidden" name="clothes_category" value="<?php echo $clothes_category; ?>">
                    <input type="hidden" name="clothes_id" value="<?php echo $clothes_id; ?>">
                    <input type="hidden" name="product_name" value="<?php echo $clothes_name; ?>">
                    <input type="hidden" name="product_price" value="<?php echo $clothes_price; ?>">
                    <input type="hidden" name="product_image" value="<?php echo $clothes_image; ?>">
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
    $clothes_id = $_POST['clothes_id'];
    $clothes_category = $_POST['clothes_category'];
    $clothes_name = $_POST['product_name'];
    $clothes_price = $_POST['product_price'];
    $clothes_image = $_POST['product_image'];
    $quantity = $_POST['quantity'];
    $total = $quantity * $clothes_price;

    $balance = $clothes_stock - $quantity;
    if ($balance >= 0) {
        mysqli_query($connect, "INSERT INTO cart(product_id, product_name, product_price, product_image, quantity, total_price, user_id, product_category) VALUES ('$clothes_id', '$clothes_name', '$clothes_price', '$clothes_image', '$quantity', '$total', '$user_id', '$clothes_category')");
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