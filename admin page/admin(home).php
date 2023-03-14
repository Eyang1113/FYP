<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="style(LoginRegisterCPassword).css?v=<?php echo time(); ?>">
</head>
</head>
<body>
<?php include "admin(header).php"; ?>
     <div class="body">
          <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
          <nav class="home-nav">
               <a href="admin(change-password).php">Change Password</a>
          <a href="admin(logout).php">Logout</a>
          </nav>
     </div>
</body>
</html>

<?php 
}else{
     header("Location: admin(index).php");
     exit();
}
 ?>