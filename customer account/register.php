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

if ($stmt = $connect->prepare('SELECT user_id, password FROM user WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		echo 'Username exists, please choose another!';
	} else {
		if ($stmt = $connect->prepare('INSERT INTO user (username, email, password) VALUES (?, ?, ?)')) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['username'], $_POST['email'], $password);
            $stmt->execute();
        } else {
            echo 'Could not prepare statement!';
        }
	}
	$stmt->close();
} else {
	echo 'Could not prepare statement!';
}
$connect->close();
?>