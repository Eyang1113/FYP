<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Shoe</title>
    <?php include "superadmin(header).php"; ?>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="body">
        <form name="addfrm" method="post" action="">
            <h2>Add Shoe</h2>
            <label>Shoe Name</label>
                <input type="text" name="name" placeholder="Shoe Name" required>
            <label>Shoe Price</label>
                <input type="number" name="price" placeholder="Shoe Price" min="1" step=".01" required>
            <label>Shoe Stock</label>
                <input type="number" name="stock" placeholder="Shoe Stock" min="1" required>
            <label>Shoe Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Shoe Detail" required></textarea>
            <label>Shoe Image</label>
                <input type="text" name="image" placeholder="Shoe Image" required>
            <br><button type="submit" name="savebtn">Add Shoe</button>
            <a href="superadmin(shoe).php" class="back">Back</a>
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
        $nimage = $_POST["image"];
        mysqli_query($conn, "INSERT INTO shoe (shoe_name, shoe_price, shoe_stock, shoe_detail, shoes_images)
                                        VALUES ('$nname', '$nprice', '$nstock', '$ndetail', '$nimage')");
?>
<script type="text/javascript">
    alert("<?php echo $nname. ' saved' ?>");
</script>
<?php
    header("refresh:0.1; url=superadmin(shoe).php");
    }
?>