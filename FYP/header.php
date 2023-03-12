<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="description" content="header of FyPro">
    <title>Header</title>
    <link rel="stylesheet" href="header(customer).css?v=<?php echo time(); ?>">
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
                        <li><a href="Racquet.php">Racquet</a></li>
                        <li><a href="#">Shuttlecock</a></li>
                        <li><a href="#">String</a></li>
                        <li><a href="#">Shoes</a></li>
                        <li><a href="#">Clothes</a></li>
                        <li><a href="#">Bag</a></li>
                    </ul>
                </div>
                <li><a href="#">Athlete</a></li>
                <li><a href="Aboutus.php">About Us</a></li>
                <li>
                    <form>
                        <input style="height:35px;" type="text" name="search" id="search" placeholder="   Search for ......">
                        <button type="submit" class="btn">Search</button>
                    </form>
                </li>
                <li><a href="PaymentPage.php"><i class="fa fa-shopping-cart fa-lg" style="color:white;"></a></i></li>
                <li><a href=""><i class="fa fa-user fa-lg" style="color:white;"></a></i></li>
                <button class="btnLogin-popup">Login</button>
            </ul>
        </nav>
    </div>
    
    <script>


    </script>
    <script src="script.js"></script>
</body>
</html>