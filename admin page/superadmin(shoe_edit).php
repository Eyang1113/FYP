<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Shoe</title>
    <?php include "superadmin(header).php"; ?>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["edit"])){
            $shoeid = $_GET["shoeid"];
            $result = mysqli_query($conn, "SELECT * FROM shoe WHERE shoe_id = $shoeid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="">
            <h2>Edit Shoe</h2>
            <label>Shoe Name</label>
                <input type="text" name="name" placeholder="Shoe Name" value="<?php echo $row['shoe_name']; ?>">
            <label>Shoe Price</label>
                <input type="number" name="price" placeholder="Shoe Price" min="1" step=".01" value="<?php echo $row['shoe_price']; ?>">
            <label>Shoe Stock</label>
                <input type="number" name="stock" placeholder="Shoe Stock" min="1" value="<?php echo $row['shoe_stock']; ?>">
            <label>Shoe Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Shoe Detail"><?php echo $row['shoe_detail']; ?></textarea>
            <label>Shoe Name</label>
                <input type="text" name="image" placeholder="Shoe Image" value="<?php echo $row['shoes_images']; ?>">
            <br><button type="submit" name="savebtn">Update Product</button>
            <a href="superadmin(shoe).php" class="back">Back</a>
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
        mysqli_query($conn, "UPDATE shoe SET shoe_name='$nname', shoe_price='$nprice', shoe_stock='$nstock', shoe_detail='$ndetail', shoes_images='$nimage' WHERE shoe_id=$shoeid");
?>
<script type="text/javascript">
    alert("Product Update");
</script>
<?php
    header("refresh:0.1; url=superadmin(shoe).php");
    }
?>