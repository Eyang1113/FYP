<?php include "db_conn.php"; ?>
<html>
<head>
    <title>Order</title>
    <link rel="stylesheet" href="style(User).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php include "admin(header).php"; ?>

    <div class="right"> 
        <div class="content">
            <h2>Order List</h2>
            <hr><br>
            <br><br><br>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Customer Name</th>
                    <th>Customer Contact</th>
                    <th>Payment Status</th>
                    <th>Action</th>
                </tr>
                <?php
                    mysqli_select_db($conn, "fypro");
                    $result = mysqli_query($conn, "SELECT * FROM orders");	
                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row["order_id"]; ?></td>
                    <td><?php echo $row["order_date"]; ?></td>
                    <td><?php echo $row["customer_name"]; ?></td>
                    <td><?php echo $row["customer_number"]; ?></td>
                    <td><?php echo $row["payment_status"]; ?></td>
                    <td><a href="admin(order_detail).php?detail&orderid=<?php echo $row['order_id']; ?>">View Detail</a></td></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>