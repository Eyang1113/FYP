<?php 
session_start();

if (isset($_SESSION['superadmin_id']) && isset($_SESSION['superadmin_name'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Header</title>
    <link rel="stylesheet" href="style(Adminheader).css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="header">
        <nav>
            <h2>Fy<span>Pro</span><span class="admin">(superadmin panel)</span></h2>
            <ul class="nav-links">
                <li><a href="superadmin(home).php">Home</a></li>
                <li><a href="superadmin(bag).php">Product</a></li>
                <li><a href="superadmin(user).php">User</a></li>
                <li><a href="superadmin(admin).php">Admin</a></li>
                <li><a href="superadmin(order).php">Order</a></li>
                <li onclick="openPopup()"><a>Account</a></li>
                <li class="btn"><a href="superadmin(logout).php">Logout</a></li>
            </ul>
        </nav>
    </div>
    <div class="popup" id="popup">
        <img src="image/acc.png">
        <h2>Hello, <?php echo $_SESSION['name']; ?></h2>
        <p><b>Username : </b><?php echo $_SESSION['superadmin_name']; ?></p>
        <p><b>E-mail : </b><?php echo $_SESSION['superadmin_email']; ?></p>
        <br>
        <p><a href="superadmin(change-password).php">Change Password</a></p>
        <button type="button" onclick="closePopup()">OK</button>
    </div>
    <script>
        let popup = document.getElementById("popup");
        function openPopup(){
            popup.classList.add("open-popup");
        }
        function closePopup(){
            popup.classList.remove("open-popup");
        }
    </script>
</body>
</html>
<?php 
}else{
    header("Location: superadmin(index).php");
    exit();
}
?>