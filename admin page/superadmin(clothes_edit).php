<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit clothes</title>
    <?php include "superadmin(header).php"; ?>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["edit"])){
            $clothesid = $_GET["clothesid"];
            $result = mysqli_query($conn, "SELECT * FROM clothes WHERE clothes_id = $clothesid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="">
            <h2>Edit Clothes</h2>
            <label>Clothes Name</label>
                <input type="text" name="name" placeholder="Clothes Name" value="<?php echo $row['clothes_name']; ?>">
            <label>Clothes Price</label>
                <input type="number" name="price" placeholder="Clothes Price" min="1" step=".01" value="<?php echo $row['clothes_price']; ?>">
            <label>Clothes Stock</label>
                <input type="number" name="stock" placeholder="Clothes Stock" min="1" value="<?php echo $row['clothes_stock']; ?>">
            <label>Clothes Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Clothes Detail"><?php echo $row['clothes_detail']; ?></textarea>
            <label>Clothes Image</label>
                <input type="text" name="image" placeholder="Clothes Image" value="<?php echo $row['clothes_image']; ?>">
            <br><button type="submit" name="savebtn">Update Product</button>
            <a href="superadmin(clothes).php" class="back">Back</a>
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
        $nimage = $_POST["image"];
        mysqli_query($conn, "UPDATE clothes SET clothes_name='$nname', clothes_price='$nprice', clothes_stock='$nstock', clothes_detail='$ndetail', clothes_image='$nimage' WHERE clothes_id=$clothesid");
?>
<script type="text/javascript">
    alert("Product Update");
</script>
<?php
    header("refresh:0.1; url=superadmin(clothes).php");
    }
?>