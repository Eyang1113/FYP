<?php 
session_start();

if (!isset($_SESSION['loggedin'])) {
    header('Location: index.php');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
</head>
<body>
<?php
        include('header.php');
    ?>
	<div class="sidebar-profile">
			<div class="sidebar">
				<ul>
					<li><a href="user_profile.php"><p>Account Information</p></a></li>
					<li><a href="edit_profile.php"><p>Edit Profile</p></a></li>
					<li><a href="change_password.php"><p>Change password</p></a></li>
				</ul>
			</div>
		</div>

	<div class="change-password">
		<form action="change_psw.php" method="post">
			<h1>Change Password</h1><hr>
			<?php if (isset($_GET['error'])) { ?>
				<p class="error"><?php echo $_GET['error']; ?></p>
			<?php } ?>

			<?php if (isset($_GET['success'])) { ?>
				<p class="success"><?php echo $_GET['success']; ?></p>
			<?php } ?>

			<label>Old Password</label>
			<input type="password" 
				name="old-password" 
				placeholder="Old Password">
				<br>

			<label>New Password</label>
			<input type="password" 
				name="new-password" 
				placeholder="New Password">
				<br>

			<label>Confirm New Password</label>
			<input type="password" 
				name="confirm-new-password" 
				placeholder="Confirm New Password">
				<br>

			<button type="submit">Save Password</button>
		</form>
	</div>
</body>
</html>
