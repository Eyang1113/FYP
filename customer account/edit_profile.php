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
        <title>Edit Profile Page</title>
    </head>
    <body class="loggedin">
    <?php
        include('header.php');
    ?>
        <div class="edit-profile">
            <h1>Edit Profile</h1><hr>
            <form action="update_profile.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?=$username?>" required><br>
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?=$email?>" required><br>
                <label for="contact">Contact:</label>
                <input type="text" name="contact" value="<?=$contact?>" required><br>
                <label for="address">Address:</label>
                <input type="text" name="address" value="<?=$address?>" required><br>
                <input type="submit" value="Save Changes">
            </form>
        </div>
    </body>
</html>