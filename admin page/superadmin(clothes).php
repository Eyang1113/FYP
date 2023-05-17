<?php include "db_conn.php"; ?>
<html>
<head>
    <title>Clothes</title>
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
            <h2>Clothes List</h2>
            <hr><br>
            <div class="addbtn">
                <button onclick="document.location='admin(clothes_add).php'">Add Clothes</button>
            </div>
            <br><br><br>
            <table>
                <tr>
                    <th>Clothes ID</th>
                    <th>Clothes Name</th>
                    <th>Clothes Price</th>
                    <th>Clothes Stock</th>
                    <th>Clothes Detail</th>
                    <th>Clothes Image</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $result = mysqli_query($conn, "SELECT * FROM clothes");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["clothes_id"]; ?></td>
                    <td><?php echo $row["clothes_name"]; ?></td>
                    <td><?php echo $row["clothes_price"]; ?></td>
                    <td><?php echo $row["clothes_stock"]; ?></td>
                    <td><?php echo $row["clothes_detail"]; ?></td>
                    <td><?php echo $row["clothes_image"]; ?></td>
                    <td><a href="admin(clothes_edit).php?edit&clothesid=<?php echo $row['clothes_id']; ?>">Edit</a></td>
                    <td><a href="superadmin(clothes).php?del&clothesid=<?php echo $row['clothes_id']; ?>" onclick="return confirmation();">Delete</a></td>
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
        answer = confirm("Do you want to delete this clothes?");
        return answer;
    }
</script>
<?php
    if(isset($_REQUEST["del"])){
        $clothesid = $_REQUEST["clothesid"];
        mysqli_query($conn, "DELETE FROM clothes WHERE clothes_id = $clothesid");
        header("Location: superadmin(clothes).php");
    }