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
        <form name="editfrm" method="post" action="" enctype="multipart/form-data">
            <h2>Edit Shuttlecock</h2>
            <label>Shuttlecock Name</label>
                <input type="text" name="name" placeholder="Shuttlecock Name" value="<?php echo $row['shuttlecock_name']; ?>">
            <label>Shuttlecock Price</label>
                <input type="number" name="price" placeholder="Shuttlecock Price" min="1" step=".01" value="<?php echo $row['shuttlecock_price']; ?>">
            <label>Shuttlecock Stock</label>
                <input type="number" name="stock" placeholder="Shuttlecock Stock" min="1" value="<?php echo $row['shuttlecock_stock']; ?>">
            <label>Shuttlecock Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Shuttlecock Detail"><?php echo $row['shuttlecock_detail']; ?></textarea>
            <label>Shuttlecock Image</label>
                <input type="file" name="image" accept="image/*" required>
            <br><button type="submit" name="savebtn">Update Product</button>
            <button type="submit" name="archivebtn">Archive Product</button>
            <a href="admin(shuttlecock).php" class="back">Back</a>
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
            $nimage = $row['shuttlecock_image'];
        }
        mysqli_query($conn, "UPDATE shuttlecock SET shuttlecock_name='$nname', shuttlecock_price='$nprice', shuttlecock_stock='$nstock', shuttlecock_detail='$ndetail', shuttlecock_image='$nimage' WHERE shuttlecock_id=$shuttlecockid");
?>
<script type="text/javascript">
    alert("Product Update");
</script>
<?php
    header("refresh:0.1; url=admin(shuttlecock).php");
    }
    if(isset($_POST["archivebtn"])){
        $archiveName = $row['shuttlecock_name'];
        $archivePrice = $row['shuttlecock_price'];
        $archiveStock = $row['shuttlecock_stock'];
        $archiveDetail = $row['shuttlecock_detail'];
        $archiveImage = $row['shuttlecock_image'];

        mysqli_query($conn, "INSERT INTO archive_product (product_name, product_price, product_stock, product_detail, product_image) VALUES ('$archiveName', '$archivePrice', '$archiveStock', '$archiveDetail', '$archiveImage')");

        mysqli_query($conn, "DELETE FROM shuttlecock WHERE shuttlecock_id=$shuttlecockid");

        ?>
        <script type="text/javascript">
            alert("Product Archived");
        </script>
        <?php
        header("refresh:0.1; url=admin(shuttlecock).php");
    }
?>