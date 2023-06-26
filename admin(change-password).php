<?php 
session_start();

if (isset($_SESSION['admin_id']) && isset($_SESSION['admin_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" href="style(LoginRegisterCPassword).css?v=<?php echo time(); ?>">
</head>
</head>
<body>
	<div class="body">
		<form action="admin(change-p).php" method="post">
			<h2>Change Password</h2>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>

			<?php if (isset($_GET['success'])) { ?>
				<p class="success"><?php echo $_GET['success']; ?></p>
			<?php } ?>

			<label>Old Password</label>
			<input type="password" 
				name="op" 
				placeholder="Old Password">
				<br>

			<label>New Password</label>
			<input type="password" 
				name="np" 
				placeholder="New Password"
				pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
				required>
				<br>

			<label>Confirm New Password</label>
			<input type="password" 
				name="c_np" 
				placeholder="Confirm New Password">
				<br>

			<button type="submit">CHANGE</button>
			<a href="admin(home).php" class="ca">HOME</a>
		</form>
	</div>
</body>
</html>

<?php 
}else{
     header("Location: admin(index).php");
     exit();
}
 ?>