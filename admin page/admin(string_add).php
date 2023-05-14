<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "admin(header).php"; ?>
    <title>Add String</title>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="body">
        <form name="addfrm" method="post" action="">
            <h2>Add String</h2>
            <label>String Name</label>
                <input type="text" name="name" placeholder="String Name" required>
            <label>String Price</label>
                <input type="number" name="price" placeholder="String Price" min="1" step=".01" required>
            <label>String Stock</label>
                <input type="number" name="stock" placeholder="String Stock" min="1" required>
            <label>String Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="String Detail" required></textarea>
            <label>String Image</label>
                <input type="text" name="image" placeholder="String Image" required>
            <br><button type="submit" name="savebtn">Add String</button>
            <a href="admin(string).php" class="back">Back</a>
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
        mysqli_query($conn, "INSERT INTO string (string_name, string_price, string_stock, string_detail, string_image)
                                        VALUES ('$nname', '$nprice', '$nstock', '$ndetail', $nimage')");
?>
<script type="text/javascript">
    alert("<?php echo $nname. ' saved' ?>");
</script>
<?php
    header("refresh:0.1; url=admin(string).php");
    }
?>