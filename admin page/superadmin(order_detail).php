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
            <select name="payment_status" class="select">
                <option selected disabled><?= $row['payment_status']; ?></option>
                <option value="PENDING"><b>PENDING</b></option>
                <option value="COMPLETE"><b>COMPLETE</b></option>
            </select>
            <br>
            <div class=buttons>
                <button type="submit" name="savebtn" class="update"><b>Update Status</b></button><br><br>
                <button type="submit"  onclick="return confirmation();" name="del" class="delete"><b>Delete</b></button><br><br>
                <button type="submit" name="back" class="bk"><b>Back</b></button>
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
    $nstatus = $_POST["payment_status"];
    mysqli_query($conn, "UPDATE orders SET payment_status='$nstatus' WHERE order_id=$orderid");
    ?>
    <script type="text/javascript">
        alert("Status Update");
    </script>
    <?php
    header("refresh:0.1; url=superadmin(order).php");
}
?>

<script type="text/javascript">
            function confirmation(){
                answer = confirm("Do you want to delete this order?");
                return answer;
            }
    </script>
<?php
if (isset($_POST["del"])) {
    $orderid = $_REQUEST["order_id"];
    mysqli_query($conn, "DELETE FROM orders WHERE order_id = $orderid");
    header("refresh:0.1; url=superadmin(order).php");
}
?>

<?php
if (isset($_POST["back"])) {
    header("refresh:0.1; url=superadmin(order).php");
}
?>
