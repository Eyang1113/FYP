<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Bag</title>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["edit"])){
            $bagid = $_GET["bagid"];
            $result = mysqli_query($conn, "SELECT * FROM bag WHERE bag_id = $bagid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="" enctype="multipart/form-data">
            <h2>Edit Bag</h2>
            <label>Bag Name</label>
                <input type="text" name="name" placeholder="Bag Name" value="<?php echo $row['bag_name']; ?>">
            <label>Bag Price</label>
                <input type="number" name="price" placeholder="Bag Price" min="1" step=".01" value="<?php echo $row['bag_price']; ?>">
            <label>Bag Stock</label>
                <input type="number" name="stock" placeholder="Bag Stock" min="1" value="<?php echo $row['bag_stock']; ?>">
            <label>Bag Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Bag Detail"><?php echo $row['bag_detail']; ?></textarea>
            <label>Bag Image</label>
                <input type="file" name="image" accept="image/*" required>
            <br><button type="submit" name="savebtn">Update Product</button>
            <button type="submit" name="archivebtn">Archive Product</button>
            <a href="admin(bag).php" class="back">Back</a>
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
            $nimage = $row['bag_image'];
        }
        mysqli_query($conn, "UPDATE bag SET bag_name='$nname', bag_price='$nprice', bag_stock='$nstock', bag_detail='$ndetail', bag_image='$nimage' WHERE bag_id=$bagid");
?>
<script type="text/javascript">
    alert("Product Updated");
</script>
<?php
    header("refresh:0.1; url=admin(bag).php");
    }

    if(isset($_POST["archivebtn"])){
        $archiveName = $row['bag_name'];
        $archivePrice = $row['bag_price'];
        $archiveStock = $row['bag_stock'];
        $archiveDetail = $row['bag_detail'];
        $archiveImage = $row['bag_image'];

        mysqli_query($conn, "INSERT INTO archive_product (product_name, product_price, product_stock, product_detail, product_image) VALUES ('$archiveName', '$archivePrice', '$archiveStock', '$archiveDetail', '$archiveImage')");

        mysqli_query($conn, "DELETE FROM bag WHERE bag_id=$bagid");

        ?>
        <script type="text/javascript">
            alert("Product Archived");
        </script>
        <?php
        header("refresh:0.1; url=admin(bag).php");
    }
?>
