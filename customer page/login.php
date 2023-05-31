<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fypro';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['email'], $_POST['password'])) {
	exit('Please fill both the email and password fields!');
}

if ($stmt = $con->prepare('SELECT user_id, password, verified FROM user WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($user_id, $password, $verified);
		$stmt->fetch();

		if (password_verify($_POST['password'], $password)) {
			if ($verified == 1) {
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['id'] = $user_id;
				header('Location: mainpage.php');
				exit;
			} else {
				echo "<script>alert('Your account is not verified! Please check your email for verification.');</script>";
				header("refresh:0.1; url=index.php");
				exit;
			}
		} else {
			echo "<script>alert('Incorrect email and/or password!');</script>";
			header("refresh:0.1; url=index.php");
			exit;
		}
	} else {
		echo "<script>alert('Incorrect email and/or password!');</script>";
		header("refresh:0.1; url=index.php");
		exit;
	}

	$stmt->close();
}

?>