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
                <tr>
                    <td><a href="admin(archive).php">ARCHIVED PRODUCT</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="right"> 
        <div class="contentR">
            <h2>Shoe List</h2>
            <hr><br>
            <div class="actions">
                <form method="GET" action="admin(shoe).php">
                    <div class="search-form">
                        <input type="text" name="search" placeholder="Search by Shoe Name" class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </form>
                <button class="add-button" onclick="document.location='admin(shoe_add).php'">Add Shoe</button>
            </div>
            <table>
                <tr>
                    <th>Shoe ID</th>
                    <th>Shoe Name</th>
                    <th>Shoe Price</th>
                    <th>Shoe Stock</th>
                    <th>Shoe Detail</th>
                    <th>Shoe Image</th>
                    <th>Action</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM shoe WHERE shoe_name LIKE '%$search%'";
                    $result = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($result);
                    
                    if ($count == 0) {
                        echo "<tr><td colspan='8'>No results found.</td></tr>";
                    } 
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["shoe_id"]; ?></td>
                    <td><?php echo $row["shoe_name"]; ?></td>
                    <td><?php echo $row["shoe_price"]; ?></td>
                    <td><?php echo $row["shoe_stock"]; ?></td>
                    <td><?php echo $row["shoe_detail"]; ?></td>
                    <td><?php echo $row["shoes_images"]; ?></td>
                    <td><a href="admin(shoe_edit).php?edit&shoeid=<?php echo $row['shoe_id']; ?>">More</a></td>
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