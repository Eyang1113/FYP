<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="description" content="header of FyPro">
    <title>Header</title>
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
                <li><a href="Athlete.php">Athlete</a></li>
                <li><a href="Aboutus.php">About Us</a></li>
                <li>
                    <form action="searchbar.php" method="GET">
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
    
    
</body>
</html>