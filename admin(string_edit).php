<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "admin(header).php"; ?>
    <title>Edit String</title>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
        if(isset($_GET["edit"])){
            $stringid = $_GET["stringid"];
            $result = mysqli_query($conn, "SELECT * FROM string WHERE string_id = $stringid");
            $row = mysqli_fetch_assoc($result);
    ?>
    <div class="body">
        <form name="editfrm" method="post" action="" enctype="multipart/form-data">
            <h2>Edit String</h2>
            <label>String Name</label>
                <input type="text" name="name" placeholder="String Name" value="<?php echo $row['string_name']; ?>">
            <label>String Price</label>
                <input type="number" name="price" placeholder="String Price" min="1" step=".01" value="<?php echo $row['string_price']; ?>">
            <label>String Stock</label>
                <input type="number" name="stock" placeholder="String Stock" min="1" value="<?php echo $row['string_stock']; ?>">
            <label>String Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="String Detail"><?php echo $row['string_detail']; ?></textarea>
            <label>String Image</label>
                <input type="file" name="image" accept="image/*">
            <br><button type="submit" name="savebtn">Update Product</button>
            <button type="submit" name="archivebtn">Archive Product</button>
            <a href="admin(string).php" class="back">Back</a>
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
            $nimage = $row['string_image'];
        }
        mysqli_query($conn, "UPDATE string SET string_name='$nname', string_price='$nprice', string_stock='$nstock', string_detail='$ndetail', string_image='$nimage' WHERE string_id=$stringid");
?>
<script type="text/javascript">
    alert("Product Update");
</script>
<?php
    header("refresh:0.1; url=admin(string).php");
    }
    if(isset($_POST["archivebtn"])){
        $archiveName = $row['string_name'];
        $archivePrice = $row['string_price'];
        $archiveStock = $row['string_stock'];
        $archiveDetail = $row['string_detail'];
        $archiveImage = $row['string_image'];

        mysqli_query($conn, "INSERT INTO archive_product (product_name, product_price, product_stock, product_detail, product_image) VALUES ('$archiveName', '$archivePrice', '$archiveStock', '$archiveDetail', '$archiveImage')");

        mysqli_query($conn, "DELETE FROM string WHERE string_id=$stringid");

        ?>
        <script type="text/javascript">
            alert("Product Archived");
        </script>
        <?php
        header("refresh:0.1; url=admin(string).php");
    }
?>