<?php include "db_conn.php"; ?>
<html>
<head>
    <title>Shuttlecock</title>
    <link rel="stylesheet" href="style(Product).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include "superadmin(header).php"; ?>
    <div class="left"> 
        <div class="contentL">
            <h2>Category List</h2>
            <table>
                <tr>
                    <td><a href="superadmin(bag).php">BAG</a></td>
                </tr>
                <tr>
                    <td><a href="superadmin(clothes).php">CLOTHES</a></td>
                </tr>
                <tr>
                    <td><a href="superadmin(racquet).php">RACQUET</a></td>
                </tr>
                <tr>
                    <td><a href="superadmin(shoe).php">SHOE</a></td>
                </tr>
                <tr>
                    <td><a href="superadmin(string).php">STRING</a></td>
                </tr>
                <tr>
                    <td><a href="superadmin(shuttlecock).php">SHUTTLECOCK</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="right"> 
        <div class="contentR">
            <h2>Shuttlecock List</h2>
            <hr><br>
            <div class="addbtn">
                <button onclick="document.location='admin(shuttlecock_add).php'">Add Shuttlecock</button>
            </div>
            <br><br><br>
            <table>
                <tr>
                    <th>Shuttlecock ID</th>
                    <th>Shuttlecock Name</th>
                    <th>Shuttlecock Price</th>
                    <th>Shuttlecock Stock</th>
                    <th>Shuttlecock Detail</th>
                    <th>Shuttlecock Image</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $result = mysqli_query($conn, "SELECT * FROM shuttlecock");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["shuttlecock_id"]; ?></td>
                    <td><?php echo $row["shuttlecock_name"]; ?></td>
                    <td><?php echo $row["shuttlecock_price"]; ?></td>
                    <td><?php echo $row["shuttlecock_stock"]; ?></td>
                    <td><?php echo $row["shuttlecock_detail"]; ?></td>
                    <td><?php echo $row["shuttlecock_image"]; ?></td>
                    <td><a href="admin(shuttlecock_edit).php?edit&shuttlecockid=<?php echo $row['shuttlecock_id']; ?>">Edit</a></td>
                    <td><a href="superadmin(shuttlecock).php?del&shuttlecockid=<?php echo $row['shuttlecock_id']; ?>" onclick="return confirmation();">Delete</a></td>
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
        answer = confirm("Do you want to delete this shuttlecock?");
        return answer;
    }
</script>
<?php
    if(isset($_REQUEST["del"])){
        $shuttlecockid = $_REQUEST["shuttlecockid"];
        mysqli_query($conn, "DELETE FROM shuttlecock WHERE shuttlecock_id = $shuttlecockid");
        header("Location: superadmin(shuttlecock).php");
    }