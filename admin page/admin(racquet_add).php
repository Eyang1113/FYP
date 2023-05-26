<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Racquet</title>
    <?php include "admin(header).php"; ?>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="body">
        <form name="addfrm" method="post" action="">
            <h2>Add Racquet</h2>
            <label>Racquet Name</label>
                <input type="text" name="name" placeholder="Racquet Name" required>
            <label>Racquet Price</label>
                <input type="number" name="price" placeholder="Racquet Price" min="1" step=".01" required>
            <label>Racquet Stock</label>
                <input type="number" name="stock" placeholder="Racquet Stock" min="1" required>
            <label>Racquet Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Racquet Detail" required></textarea>
            <label>Racquet Image</label>
                <input type="file" name="image" accept="image/*" required>
            <br><button type="submit" name="savebtn">Add Racquet</button>
            <a href="admin(racquet).php" class="back">Back</a>
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
            // No image uploaded, prompt the user to choose one
            echo '<script type="text/javascript">';
            echo 'alert("Please choose an image");';
            echo '</script>';
            exit; // Stop further execution
        }
        mysqli_query($conn, "INSERT INTO racquet (racquet_name, racquet_price, racquet_stock, racquet_detail, racquet_images)
                                        VALUES ('$nname', '$nprice', '$nstock', '$ndetail', '$nimage')");
?>
<script type="text/javascript">
    alert("<?php echo $nname. ' saved' ?>");
</script>
<?php
    header("refresh:0.1; url=admin(racquet).php");
    }
?>