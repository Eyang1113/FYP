<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
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
        include('header.php');
?>
		<div class="user-profile">
			<h1>Profile</h1><hr>
			<div class="detail">
				<h3>Account Details</h3>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$username?></td>
					</tr>
					<tr>
						<td>Contact:</td>
						<td><?=$contact?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
                    <tr>
						<td>Address:</td>
						<td><?=$address?></td>
					</tr>
				</table>
				<button><a href="edit_profile.php">Edit Profile</a></button>
			</div>
		</div>
	</body>
</html>