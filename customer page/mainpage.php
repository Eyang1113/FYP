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
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');

            .title {
                text-align: center;
                font-family: 'Roboto', sans-serif;
                font-size: 28px;
                font-weight: bold;
                margin-top: 10px;
                margin-left: 10px;
                margin-bottom: 20px;
                color: white;
            }
        </style>
    </head>
    <body>

        <?php
            include('header(loggedin).php');
        ?>

        <div class="title">Online Badminton Accessories Shop</div>

        <?php
            include('swiper.php');
            include('footer.php');
        ?>

</html>
