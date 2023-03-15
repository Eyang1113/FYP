<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Racquet</title>
    <?php include "admin(header).php"; ?>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["edit"])){
            $racquetid = $_GET["racquetid"];
            $result = mysqli_query($conn, "SELECT * FROM racquet WHERE racquet_id = $racquetid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="">
            <h2>Edit Racquet</h2>
            <label>Racquet Name</label>
                <input type="text" name="name" placeholder="Racquet Name" value="<?php echo $row['racquet_name']; ?>">
            <label>Racquet Price</label>
                <input type="number" name="price" placeholder="Racquet Price" min="1" step=".01" value="<?php echo $row['racquet_price']; ?>">
            <label>Racquet Stock</label>
                <input type="number" name="stock" placeholder="Racquet Stock" min="1" value="<?php echo $row['racquet_stock']; ?>">
            <label>Racquet Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Racquet Detail"><?php echo $row['racquet_detail']; ?></textarea>
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
        mysqli_query($conn, "UPDATE racquet SET racquet_name='$nname', racquet_price='$nprice', racquet_stock='$nstock', racquet_detail='$ndetail' WHERE racquet_id=$racquetid");
?>
<script type="text/javascript">
    alert("Product Update");
</script>
<?php
    header("refresh:0.1; url=admin(racquet).php");
    }
?>