<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "admin(header).php"; ?>
    <title>Edit Shuttlecock</title>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["edit"])){
            $shuttlecockid = $_GET["shuttlecockid"];
            $result = mysqli_query($conn, "SELECT * FROM shuttlecock WHERE shuttlecock_id = $shuttlecockid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="">
            <h2>Edit Shuttlecock</h2>
            <label>Shuttlecock Name</label>
                <input type="text" name="name" placeholder="Shuttlecock Name" value="<?php echo $row['shuttlecock_name']; ?>">
            <label>Shuttlecock Price</label>
                <input type="number" name="price" placeholder="Shuttlecock Price" min="1" step=".01" value="<?php echo $row['shuttlecock_price']; ?>">
            <label>Shuttlecock Stock</label>
                <input type="number" name="stock" placeholder="Shuttlecock Stock" min="1" value="<?php echo $row['shuttlecock_stock']; ?>">
            <label>Shuttlecock Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Shuttlecock Detail"><?php echo $row['shuttlecock_detail']; ?></textarea>
            <br><button type="submit" name="savebtn">Update Product</button>
        </form>
        <?php
            }
        ?>
    </div>
</body>
</html>
<?php
    if(isset($_POST["savebtn"])){
        $nname = $_POST["name"];
        $nprice = $_POST["price"];
        $nstock = $_POST["stock"];
        $ndetail = $_POST["detail"];
        mysqli_query($conn, "UPDATE shuttlecock SET shuttlecock_name='$nname', shuttlecock_price='$nprice', shuttlecock_stock='$nstock', shuttlecock_detail='$ndetail' WHERE shuttlecock_id=$shuttlecockid");
?>
<script type="text/javascript">
    alert("Product Update");
</script>
<?php
    header("refresh:0.1; url=admin(shuttlecock).php");
    }
?>