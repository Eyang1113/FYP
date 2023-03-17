<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="style(Home).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include "admin(header).php"; ?>
    <?php
        $result_bag = mysqli_query($conn, "SELECT * FROM bag");	
        $count_bag = mysqli_num_rows($result_bag);
        $result_clothes = mysqli_query($conn, "SELECT * FROM clothes");	
        $count_clothes = mysqli_num_rows($result_clothes);
        $result_racquet = mysqli_query($conn, "SELECT * FROM racquet");	
        $count_racquet = mysqli_num_rows($result_racquet);
        $result_shoe = mysqli_query($conn, "SELECT * FROM shoe");	
        $count_shoe = mysqli_num_rows($result_shoe);
        $result_string = mysqli_query($conn, "SELECT * FROM string");	
        $count_string = mysqli_num_rows($result_string);
        $result_shuttlecock = mysqli_query($conn, "SELECT * FROM shuttlecock");	
        $count_shuttlecock = mysqli_num_rows($result_shuttlecock);
        $result_user = mysqli_query($conn, "SELECT * FROM user");	
        $count_user = mysqli_num_rows($result_user);
    ?>
    <div class="main">
        <div class="row">
            <h3>Summary</h3>
            <hr><br>
            <div class="block">
                <p>Number Of Bag</p>
                <span> = <?php echo $count_bag; ?></span><br>
                <a href="admin(bag).php">View Bag List</a>
            </div>
            <div class="block">
                <p>Number Of Clothes</p>
                <span> = <?php echo $count_clothes; ?></span><br>
                <a href="admin(clothes).php">View Clothes List</a>
            </div>
            <div class="block">
                <p>Number Of Racquet</p>
                <span> = <?php echo $count_racquet; ?></span><br>
                <a href="admin(racquet).php">View Racquet List</a>
            </div>
            <div class="block">
                <p>Number Of Shoe</p>
                <span> = <?php echo $count_shoe; ?></span><br>
                <a href="admin(shoe).php">View Shoe List</a>
            </div>
            <div class="block">
                <p>Number Of String</p>
                <span> = <?php echo $count_string; ?></span><br>
                <a href="admin(string).php">View String List</a>
            </div>
            <div class="block">
                <p>Number Of Shuttlecock</p>
                <span> = <?php echo $count_shuttlecock; ?></span><br>
                <a href="admin(shuttlecock).php">View Shuttlecock List</a>
            </div>
            <div class="blockO">
                <p>Number Of Order</p>
                <span> = 0 </span><br>
                <a href="#">View Order List</a>
            </div>
            <div class="blockU">
                <p>Number Of User</p>
                <span> = <?php echo $count_user; ?></span><br>
                <a href="#">View User List</a>
            </div>
        </div>
        <br><br>
        <div class="row">
            <h3>Login History</h3>
            <hr><br>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Admin Name</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Date & Time</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $result = mysqli_query($conn, "SELECT * FROM loginhistory");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["time"]; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>