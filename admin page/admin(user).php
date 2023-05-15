<?php include "db_conn.php"; ?>
<html>
<head>
    <title>User</title>
    <link rel="stylesheet" href="style(User).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include "admin(header).php"; ?>

    <div class="right"> 
        <div class="content">
            <h2>User List</h2>
            <hr><br>
            <br><br><br>
            <table>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Address</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $result = mysqli_query($conn, "SELECT * FROM user");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["user_id"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["contact"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
