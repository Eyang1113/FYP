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
$stmt = $con->prepare('UPDATE user SET username=?, email=?, contact=?, address=? WHERE user_id=?');
$stmt->bind_param('ssssi', $_POST['username'], $_POST['email'], $_POST['contact'], $_POST['address'], $_SESSION['id']);
if ($stmt->execute()) {
    header('Location: user_profile.php');
} else {
    echo 'Error updating profile: ' . $stmt->error;
}
$stmt->close();
$con->close();
?>