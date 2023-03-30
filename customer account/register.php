<?php

$connect = mysqli_connect("localhost","root","","fypro");
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (!isset($_POST['username'], $_POST['email'], $_POST['password'])) {
	exit('Please complete the registration form!');
}

if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) ) {
	exit('Please complete the registration form');
}

if ($stmt = $connect->prepare('SELECT user_id FROM user WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		echo '<script>alert("Username already exists, please choose another!");</script>';
		echo '<script>window.location.href = "index.php";</script>';
		exit;
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement for username check!';
	exit;
}

if ($stmt = $connect->prepare('SELECT user_id FROM user WHERE email = ?')) {
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		echo '<script>alert("Email are incorrect, please enter a correct email!");</script>';
		echo '<script>window.location.href = "index.php";</script>';
		exit;
	}
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		echo '<script>alert("Email already exists, please choose another!");</script>';
		echo '<script>window.location.href = "index.php";</script>';
		exit;
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement for email check!';
	exit;
}

if ($stmt = $connect->prepare('INSERT INTO user (username, email, password) VALUES (?, ?, ?)')) {
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	$stmt->bind_param('sss', $_POST['username'], $_POST['email'], $password);
	$stmt->execute();
	echo '<script>alert("Registration successful!");</script>';
	echo '<script>window.location.href = "index.php";</script>';
	$stmt->close();
} else {
	echo 'Could not prepare statement for user insertion!';
	exit;
}

$connect->close();

?>