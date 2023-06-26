<?php
if (isset($_GET['search'])) {
    $customerSearch = $_GET['search'];

    if ($customerSearch === 'racquet') {
        header('Location: racquetlist.php');
        exit();
    } elseif ($customerSearch === 'shoe') {
        header('Location: shoeslist.php');
        exit();
    } elseif ($customerSearch === 'shuttlecock') {
        header('Location: shuttlecock.php');
        exit();
    } elseif ($customerSearch === 'string') {
        header('Location: string.php');
        exit();
    } elseif ($customerSearch === 'clothes') {
        header('Location: clothes.php');
        exit();
    } elseif ($customerSearch === 'bag') {
        header('Location: bag.php');
        exit();
    } else {
        $message = "Sorry, we don't have '$customerSearch' in our online store.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="description" content="Search Results">
    <title>Search Results</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="header">
        <nav>
            <h2>Fy<span style="color:red;">Pro</span></h2>
            <ul class="nav-links">
                <li><a href="mainpage.php">Home</a></li>
                <li><a href="#">Product</a>
                    <div class="dropdown-menu">
                        <ul>
                            <li><a href="racquetlist.php">Racquet</a></li>
                            <li><a href="shuttlecock.php">Shuttlecock</a></li>
                            <li><a href="string.php">String</a></li>
                            <li><a href="shoeslist.php">Shoes</a></li>
                            <li><a href="clothes.php">Clothes</a></li>
                            <li><a href="bag.php">Bag</a></li>
                        </ul>
                    </div>
                </li>
                <li><a href="Athlete.php">Athlete</a></li>
                <li><a href="Aboutus.php">About Us</a></li>
                <li>
                    <form action="search.php" method="GET">
                        <input style="height:35px;" type="text" name="search" id="search" placeholder="   Search for ......">
                        <button type="submit" class="btn">Search</button>
                    </form>
                </li>
                <li><a href="cart.php"><i class="fa fa-shopping-cart fa-lg" style="color:white;"></a></i></li>
                <li><a href="user_profile.php"><i class="fa fa-user fa-lg" style="color:white;"></a></i></li>
                <button class="btnLogout"><a href="logout.php">Log Out</a></button>
            </ul>
        </nav>
    </div>

    <div class="search-results">
        <?php if (isset($message)): ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>
        <!-- Display search results here -->
    </div>
</body>
</html>
