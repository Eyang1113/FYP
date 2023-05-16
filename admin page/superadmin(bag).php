<?php include "db_conn.php"; ?>
<html>
<head>
    <title>Bag</title>
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
            <h2>Bag List</h2>
            <hr><br>
            <div class="addbtn">
                <button onclick="document.location='superadmin(bag_add).php'">Add Bag</button>
            </div>
            <br><br><br>
            <table>
                <tr>
                    <th>Bag ID</th>
                    <th>Bag Name</th>
                    <th>Bag Price</th>
                    <th>Bag Stock</th>
                    <th>Bag Detail</th>
                    <th>Bag Image</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $result = mysqli_query($conn, "SELECT * FROM bag");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["bag_id"]; ?></td>
                    <td><?php echo $row["bag_name"]; ?></td>
                    <td><?php echo $row["bag_price"]; ?></td>
                    <td><?php echo $row["bag_stock"]; ?></td>
                    <td><?php echo $row["bag_detail"]; ?></td>
                    <td><?php echo $row["bag_image"]; ?></td>
                    <td><a href="superadmin(bag_edit).php?edit&bagid=<?php echo $row['bag_id']; ?>">Edit</a></td>
                    <td><a href="superadmin(bag).php?del&bagid=<?php echo $row['bag_id']; ?>" onclick="return confirmation();">Delete</a></td>
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
            answer = confirm("Do you want to delete this bag?");
            return answer;
        }
</script>
<?php
if(isset($_REQUEST["del"])){
        $bagid = $_REQUEST["bagid"];
        mysqli_query($conn, "DELETE FROM bag WHERE bag_id = $bagid");
        header("Location: superadmin(bag).php");
        exit;
    }
?>