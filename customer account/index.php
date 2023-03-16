<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Main Page</title>
    <link rel="stylesheet" href="style.css">
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
    
    <div class="wrapper">

        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
        <div class="form-box login">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" id="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" name="password" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password</a>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="login-register">
                    <p>Don't have an account?
                        <a href="#" class="register-link">Register</a>
                    </p>
                </div>
            </form>
        </div>

        <div class="form-box register">
            <h2>Registration</h2>
            <form action="register.php" method="post">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" id="username" name="username" required>
                    <label>Username</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="email" id="email" name="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                    title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    <label>Password</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" title="you must tick in this box" required>
                    I agree to the terms & conditions</label>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="login-register">
                    <p>Already have an account?
                        <a href="#" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>

    </div>

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
