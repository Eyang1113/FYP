<?php include "db_conn.php"; ?>
<html>
<head>
    <title>Shoe</title>
    <link rel="stylesheet" href="style(Product).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include "admin(header).php"; ?>
    <div class="left"> 
        <div class="contentL">
            <h2>Category List</h2>
            <table>
                <tr>
                    <td><a href="admin(bag).php">BAG</a></td>
                </tr>
                <tr>
                    <td><a href="admin(clothes).php">CLOTHES</a></td>
                </tr>
                <tr>
                    <td><a href="admin(racquet).php">RACQUET</a></td>
                </tr>
                <tr>
                    <td><a href="admin(shoe).php">SHOE</a></td>
                </tr>
                <tr>
                    <td><a href="admin(string).php">STRING</a></td>
                </tr>
                <tr>
                    <td><a href="admin(shuttlecock).php">SHUTTLECOCK</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="right"> 
        <div class="contentR">
            <h2>Shoe List</h2>
            <hr><br>
            <div class="addbtn">
                <button onclick="document.location='admin(shoe_add).php'">Add Shoe</button>
            </div>
            <br><br><br>
            <table>
                <tr>
                    <th>Shoe ID</th>
                    <th>Shoe Name</th>
                    <th>Shoe Price</th>
                    <th>Shoe Stock</th>
                    <th>Shoe Detail</th>
                    <th>Shoe Image</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $result = mysqli_query($conn, "SELECT * FROM shoe");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["shoe_id"]; ?></td>
                    <td><?php echo $row["shoe_name"]; ?></td>
                    <td><?php echo $row["shoe_price"]; ?></td>
                    <td><?php echo $row["shoe_stock"]; ?></td>
                    <td><?php echo $row["shoe_detail"]; ?></td>
                    <td><?php echo $row["shoes_images"]; ?></td>
                    <td><a href="admin(shoe_edit).php?edit&shoeid=<?php echo $row['shoe_id']; ?>">Edit</a></td>
                    <td><a href="admin(shoe).php?del&shoeid=<?php echo $row['shoe_id']; ?>" onclick="return confirmation();">Delete</a></td>
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
        answer = confirm("Do you want to delete this shoe?");
        return answer;
    }
</script>
<?php
    if(isset($_REQUEST["del"])){
        $shoeid = $_REQUEST["shoeid"];
        mysqli_query($conn, "DELETE FROM shoe WHERE shoe_id = $shoeid");
        header("Location: admin(shoe).php");
    }