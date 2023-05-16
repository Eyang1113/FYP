<?php
session_start();
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'fypro';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST['old-password'], $_POST['new-password'], $_POST['confirm-new-password']) ) {
	exit('Please fill all the password fields!');
}

if ($stmt = $con->prepare('SELECT password FROM user WHERE user_id = ?')) {
	$stmt->bind_param('i', $_SESSION['id']);
	$stmt->execute();
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($password);
        $stmt->fetch();
        if (password_verify($_POST['old-password'], $password)) {
            if ($stmt = $con->prepare('UPDATE user SET password=? WHERE user_id=?')) {
                $new_password = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
                $stmt->bind_param('si', $new_password, $_SESSION['id']);
                $stmt->execute();
            }
        } else {
            echo 'Incorrect old password!';
        }
    } else {
        echo 'Incorrect old password!';
    }
	$stmt->close();
}
?>