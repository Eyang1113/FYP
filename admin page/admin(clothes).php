<?php include "db_conn.php"; ?>
<html>
<head>
    <title>Clothes</title>
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
            <h2>Clothes List</h2>
            <hr><br>
            <div class="actions">
                <form method="GET" action="admin(clothes).php">
                    <div class="search-form">
                        <input type="text" name="search" placeholder="Search by Clothes Name" class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </form>
                <button class="add-button" onclick="document.location='admin(clothes_add).php'">Add Clothes</button>
            </div>
            <table>
                <tr>
                    <th>Clothes ID</th>
                    <th>Clothes Name</th>
                    <th>Clothes Price</th>
                    <th>Clothes Stock</th>
                    <th>Clothes Detail</th>
                    <th>Clothes Image</th>
                    <th>Action</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM clothes WHERE clothes_name LIKE '%$search%'";
                    $result = mysqli_query($conn, $query);
                    $count = mysqli_num_rows($result);
                    
                    if ($count == 0) {
                        echo "<tr><td colspan='8'>No results found.</td></tr>";
                    } 
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["clothes_id"]; ?></td>
                    <td><?php echo $row["clothes_name"]; ?></td>
                    <td><?php echo $row["clothes_price"]; ?></td>
                    <td><?php echo $row["clothes_stock"]; ?></td>
                    <td><?php echo $row["clothes_detail"]; ?></td>
                    <td><?php echo $row["clothes_image"]; ?></td>
                    <td><a href="admin(clothes_edit).php?edit&clothesid=<?php echo $row['clothes_id']; ?>">More</a></td>
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