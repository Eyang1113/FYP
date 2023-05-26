<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit clothes</title>
    <?php include "admin(header).php"; ?>
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
        <form name="editfrm" method="post" action="" enctype="multipart/form-data">
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
                <input type="file" name="image" accept="image/*" required>
            <br><button type="submit" name="savebtn">Update Product</button>
            <button type="submit" name="archivebtn">Archive Product</button>
            <a href="admin(clothes).php" class="back">Back</a>
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
        // Check if a new image file was uploaded
        if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['image'];
            $imagePath = 'image/' . $file['name'];
            move_uploaded_file($file['tmp_name'], $imagePath);
            $nimage = $imagePath;
        } else {
            // No new image uploaded, retain the existing image path
            $nimage = $row['clothes_image'];
        }
        mysqli_query($conn, "UPDATE clothes SET clothes_name='$nname', clothes_price='$nprice', clothes_stock='$nstock', clothes_detail='$ndetail', clothes_image='$nimage' WHERE clothes_id=$clothesid");
?>
<script type="text/javascript">
    alert("Product Update");
</script>
<?php
    header("refresh:0.1; url=admin(clothes).php");
    }
    if(isset($_POST["archivebtn"])){
        $archiveName = $row['clothes_name'];
        $archivePrice = $row['clothes_price'];
        $archiveStock = $row['clothes_stock'];
        $archiveDetail = $row['clothes_detail'];
        $archiveImage = $row['clothes_image'];

        mysqli_query($conn, "INSERT INTO archive_product (product_name, product_price, product_stock, product_detail, product_image) VALUES ('$archiveName', '$archivePrice', '$archiveStock', '$archiveDetail', '$archiveImage')");

        mysqli_query($conn, "DELETE FROM clothes WHERE clothes_id=$clothesid");

        ?>
        <script type="text/javascript">
            alert("Product Archived");
        </script>
        <?php
        header("refresh:0.1; url=admin(clothes).php");
    }
?>