<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])) {

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
            <h2>Fy<span>Pro</span></h2>
            <ul class="nav-links">
                <li><a href="admin(home).php">Home</a></li>
                <li><a href="admin(bag).php">Product</a></li>
                <li><a href="admin(user).php">User</a></li>
                <li><a href="#">Order</a></li>
                <li onclick="openPopup()"><a href="#">Account</a></li>
                <li class="btn"><a href="admin(logout).php">Logout</a></li>
            </ul>
        </nav>
    </div>
    <div class="popup" id="popup">
        <img src="image/acc.png">
        <h2>Hello, <?php echo $_SESSION['name']; ?></h2>
        <p><b>Username : </b><?php echo $_SESSION['admin_name']; ?></p>
        <p><b>E-mail : </b><?php echo $_SESSION['admin_email']; ?></p>
        <br>
        <p><a href="admin(change-password).php">Change Password</a></p>
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
    header("Location: admin(index).php");
    exit();
}
?>