<?php include "db_conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Shoe</title>
    <?php include "admin(header).php"; ?>
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
        <form name="editfrm" method="post" action="" enctype="multipart/form-data">
            <h2>Edit Shoe</h2>
            <label>Shoe Name</label>
                <input type="text" name="name" placeholder="Shoe Name" value="<?php echo $row['shoe_name']; ?>">
            <label>Shoe Price</label>
                <input type="number" name="price" placeholder="Shoe Price" min="1" step=".01" value="<?php echo $row['shoe_price']; ?>">
            <label>Shoe Stock</label>
                <input type="number" name="stock" placeholder="Shoe Stock" min="1" value="<?php echo $row['shoe_stock']; ?>">
            <label>Shoe Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Shoe Detail"><?php echo $row['shoe_detail']; ?></textarea>
            <label>Shoe Image</label>
                <input type="file" name="image" accept="image/*">
            <br><button type="submit" name="savebtn">Update Product</button>
            <button type="submit" name="archivebtn">Archive Product</button>
            <a href="admin(shoe).php" class="back">Back</a>
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
            $nimage = $row['shoes_images'];
        }
        mysqli_query($conn, "UPDATE shoe SET shoe_name='$nname', shoe_price='$nprice', shoe_stock='$nstock', shoe_detail='$ndetail', shoes_images='$nimage' WHERE shoe_id=$shoeid");
?>

<script type="text/javascript">
    alert("Product Update");
</script>

<?php
    header("refresh:0.1; url=admin(shoe).php");
}

if(isset($_POST["archivebtn"])){
    $archiveName = $row['shoe_name'];
    $archivePrice = $row['shoe_price'];
    $archiveStock = $row['shoe_stock'];
    $archiveDetail = $row['shoe_detail'];
    $archiveImage = $row['shoe_image'];

    mysqli_query($conn, "INSERT INTO archive_product (product_name, product_price, product_stock, product_detail, product_image) VALUES ('$archiveName', '$archivePrice', '$archiveStock', '$archiveDetail', '$archiveImage')");

    mysqli_query($conn, "DELETE FROM shoe WHERE shoe_id=$shoeid");

?>

<script type="text/javascript">
    alert("Product Archived");
</script>

<?php
    header("refresh:0.1; url=admin(shoe).php");
}
?>
