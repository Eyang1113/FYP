<?php include "db_conn.php"; ?>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="style(User).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include "superadmin(header).php"; ?>
    <div class="right"> 
        <div class="content">
            <h2>Admin List</h2>
            <hr><br>
            <div>
                
            </div>
            <br><br><br>
            <table>
                <tr>
                    <th>Admin ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Admin Name</th>
                    <th>Action</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $result = mysqli_query($conn, "SELECT * FROM admin");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["admin_id"]; ?></td>
                    <td><?php echo $row["admin_name"]; ?></td>
                    <td><?php echo $row["admin_email"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><a href="superadmin(admin).php?del&adminid=<?php echo $row['admin_id']; ?>" onclick="return confirmation();">Delete</a></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    function confirmation(){
        answer = confirm("Do you want to delete this admin?");
        return answer;
    }
</script>
<?php
    if(isset($_REQUEST["del"])){
        $adminid = $_REQUEST["adminid"];
        mysqli_query($conn, "DELETE FROM admin WHERE admin_id = $adminid");
        header("Location: superadmin(admin).php");
    }
