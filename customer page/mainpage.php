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
        <title>Main Page</title>
        <style>
        </style>
    </head>
    <body>

        <?php
            include('header(loggedin).php');
            include('swiper.php');
            include('footer.php');
        ?>

</html>
