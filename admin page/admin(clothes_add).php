<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Clothes</title>
    <?php include "admin(header).php"; ?>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="body">
        <form name="addfrm" method="post" action="" enctype="multipart/form-data">
            <h2>Add Clothes</h2>
            <label>Clothes Name</label>
                <input type="text" name="name" placeholder="Clothes Name" required>
            <label>Clothes Price</label>
                <input type="number" name="price" placeholder="Clothes Price" min="1" step=".01" required>
            <label>Clothes Stock</label>
                <input type="number" name="stock" placeholder="Clothes Stock" min="1" required>
            <label>Clothes Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Clothes Detail" required></textarea>
            <label>Clothes Image</label>
                <input type="file" name="image" accept="image/*" required>
            <br><button type="submit" name="savebtn">Add Clothes</button>
            <a href="admin(clothes).php" class="back">Back</a>
        </form>
</body>
</html>
<?php
    include "db_conn.php";
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
            $nimage = $row['image'];
        }
        mysqli_query($conn, "INSERT INTO clothes (clothes_name, clothes_price, clothes_stock, clothes_detail, clothes_image)
                                        VALUES ('$nname', '$nprice', '$nstock', '$ndetail', '$nimage')");
?>
<script type="text/javascript">
    alert("<?php echo $nname. ' saved' ?>");
</script>
<?php
    header("refresh:0.1; url=admin(clothes).php");
    }
?>