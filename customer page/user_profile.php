<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	echo "<script>alert('Please login first!');</script>";
	echo "<script>window.location.href = 'index.php';</script>";
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fypro';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT username, password, email, contact, address FROM user WHERE user_id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($username, $password, $email, $contact, $address);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>User Profile Page</title>
	</head>
	<body class="loggedin">
	<?php
if (!isset($_SESSION['loggedin'])) {
	include("header.php");
}
else
	include("header(loggedin).php");

?>
		
		<div class="poster-profile">
			<img class ="poster" src="poster profile.jpg">
			<div class="poster-text">
			<strong>Hi, <?=$username?></strong>
			<p>Welcome to your profile</p>
			</div>
		</div>

		<div class="sidebar-profile">
			<div class="sidebar">
				<ul>
					<li><a href="user_profile.php"><p>Account Information</p></a></li>
					<li><a href="edit_profile.php"><p>Edit Profile</p></a></li>
					<li><a href="change_password.php"><p>Change Password</p></a></li>
				</ul>
			</div>
		</div>
		
		<div class="user-profile">
			<div class="detail">
				<legend class="legend"><span><b>Account Information</b></span><hr></legend>

				<div class="dashboard">
					<ul>
					<li>
						<h3><?=$username?></h3>
						<p>
							<?=$email?><br>
							<?=$contact?>
						</p>
					</li>
				</ul>
				<hr>
				<ul>
					<li>
						<h3>My Addresses</h3>
						<p>
							<?=$address?>
						</p>
					</li>
				</ul>
				</div>
				
			</div>
		</div>
		<?php 
			include 'footer.php'; 
		?>
	</body>
</html>