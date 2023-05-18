<?php include "db_conn.php"; ?>
<html>
<head>
    <title>String</title>
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
            <h2>String List</h2>
            <hr><br>
            <div class="actions">
                <form method="GET" action="admin(string).php">
                    <div class="search-form">
                        <input type="text" name="search" placeholder="Search by String Name" class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </form>
                <button class="add-button" onclick="document.location='admin(string_add).php'">Add String</button>
            </div>
            <table>
                <tr>
                    <th>String ID</th>
                    <th>String Name</th>
                    <th>String Price</th>
                    <th>String Stock</th>
                    <th>String Detail</th>
                    <th>String Image</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM string WHERE string_name LIKE '%$search%'";
                    $result = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($result);
                    
                    if ($count == 0) {
                        echo "<tr><td colspan='8'>No results found.</td></tr>";
                    } 
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["string_id"]; ?></td>
                    <td><?php echo $row["string_name"]; ?></td>
                    <td><?php echo $row["string_price"]; ?></td>
                    <td><?php echo $row["string_stock"]; ?></td>
                    <td><?php echo $row["string_detail"]; ?></td>
                    <td><?php echo $row["string_image"]; ?></td>
                    <td><a href="admin(string_edit).php?edit&stringid=<?php echo $row['string_id']; ?>">Edit</a></td>
                    <td><a href="admin(string).php?del&stringid=<?php echo $row['string_id']; ?>" onclick="return confirmation();">Delete</a></td>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    function confirmation(){
        answer = confirm("Do you want to delete this string?");
        return answer;
    }
</script>
<?php
    if(isset($_REQUEST["del"])){
        $stringid = $_REQUEST["stringid"];
        mysqli_query($conn, "DELETE FROM string WHERE string_id = $stringid");
        header("Location: admin(string).php");
    }