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
        <div class="sidebar-profile">
			<div class="sidebar">
				<ul>
					<li><a href="user_profile.php"><p>Account Information</p></a></li>
					<li><a href="edit_profile.php"><p>Edit Profile</p></a></li>
					<li><a href="change_password.php"><p>Change password</p></a></li>
				</ul>
			</div>
		</div>

        <div class="edit-profile">
            <h1>Edit Profile</h1><hr>
            <form action="update_profile.php" method="post">
                <label for="username"><span>Username:</span></label>
                <input type="text" name="username" value="<?=$username?>" required><br>
                <label for="email"><span>Email:</span></label>
                <input type="email" name="email" value="<?=$email?>" readonly><br>
                <label for="contact"><span>Contact:</span></label>
                <input type="text" name="contact" value="<?=$contact?>" pattern="[0-9]{3}-[0-9]{7,8}" title="Follow this format 01X-XXXXXXX or 01X-XXXXXXXX"><br>
                <label for="address"><span></span>Address:</label>
                <input type="text" name="address" value="<?=$address?>"><br>
                <input type="submit" value="Save Account Information">
            </form>
        </div>
    </body>
</html>