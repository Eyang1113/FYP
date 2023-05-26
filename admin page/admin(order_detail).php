<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["detail"])){
            $orderid = $_GET["orderid"];
            $result = mysqli_query($conn, "SELECT * FROM orders WHERE order_id = $orderid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form method="POST" action="" class="box">
            <h2>Order Detail</h2>
            <p>Order ID : <span><?php echo $row["order_id"]; ?></span></p>
            <p>Order Date : <span><?php echo $row["order_date"]; ?></span></p>
            <p>Customer Name : <span><?php echo $row["customer_name"]; ?></span></p>
            <p>Customer Number : <span><?php echo $row["customer_number"]; ?></span></p>
            <p>Address : <span><?php echo $row["customer_address"]; ?></span></p>
            <p>Order Item : <span><?php echo $row["order_item"]; ?></span></p>
            <p>Total Price : <span><?php echo $row["order_total_price"]; ?></span></p>
            <p>Payment Method : <span><?php echo $row["payment_method"]; ?></span></p>
            <input type="hidden" name="order_id" value="<?= $row['order_id']; ?>">
            <select name="delivery_status" class="select">
                <option selected disabled><?= $row['delivery_status']; ?></option>
                <option value="PENDING"><b>PENDING</b></option>
                <option value="COMPLETE"><b>COMPLETE</b></option>
            </select>
            <br>
            <div class=buttons>
                <button type="submit" name="savebtn" class="update"><b>Update Status</b></button><br><br>
                <button type="submit" onclick="return confirmation();" name="archivebtn" class="archive"><b>Archive</b></button><br><br>
                <button type="submit" name="generatepdf" class="generatepdf" formaction="generatepdf.php" formtarget="_blank"><b>Generate PDF</b></button><br><br>
                <a href="admin(order).php" class="bk"><b>Back</b></a>
            </div>
        </form>
    <?php
        }
    ?>
    </div>
</body>
</html>

<?php
if (isset($_POST["savebtn"])) {
    $orderid = $_POST["order_id"];
    $nstatus = $_POST["delivery_status"];
    mysqli_query($conn, "UPDATE orders SET delivery_status='$nstatus' WHERE order_id=$orderid");
    ?>
    <script type="text/javascript">
        alert("Status Updated");
        window.location.href = "admin(order).php";
    </script>
    <?php
}

if (isset($_POST["archivebtn"])) {
    $orderid = $_POST["order_id"];

    $result = mysqli_query($conn, "SELECT * FROM orders WHERE order_id=$orderid");
    $row = mysqli_fetch_assoc($result);
    $archiveDate = $row["order_date"];
    $archiveName = $row["customer_name"];
    $archiveNumber = $row["customer_number"];
    $archiveAddress = $row["customer_address"];
    $archiveItem = $row["order_item"];
    $archiveTotalPrice = $row["order_total_price"];
    $archivePaymentMethod = $row["payment_method"];

    mysqli_query($conn, "INSERT INTO archive_order (order_date, customer_name, customer_number, customer_address, order_item, order_total_price, payment_method) VALUES ('$archiveDate', '$archiveName', '$archiveNumber', '$archiveAddress', '$archiveItem', '$archiveTotalPrice', '$archivePaymentMethod')");
    mysqli_query($conn, "DELETE FROM orders WHERE order_id = $orderid");
    ?>
    <script type="text/javascript">
        alert("Order Archived");
        window.location.href = "admin(order).php";
    </script>
    <?php
}
?>
<script type="text/javascript">
    function confirmation(){
        return confirm("Do you want to archive this order?");
    }
</script>
