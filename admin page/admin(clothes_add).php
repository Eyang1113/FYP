<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Clothes</title>
    <?php include "admin(header).php"; ?>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="body">
        <form name="addfrm" method="post" action="">
            <h2>Add Clothes</h2>
            <label>Clothes Name</label>
                <input type="text" name="name" placeholder="Clothes Name">
            <label>Clothes Price</label>
                <input type="number" name="price" placeholder="Clothes Price" min="1" step=".01">
            <label>Clothes Stock</label>
                <input type="number" name="stock" placeholder="Clothes Stock" min="1">
            <label>Clothes Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Clothes Detail"></textarea>
            <br><button type="submit" name="savebtn">Add Clothes</button>
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
        mysqli_query($conn, "INSERT INTO clothes (clothes_name, clothes_price, clothes_stock, clothes_detail)
                                        VALUES ('$nname', '$nprice', '$nstock', '$ndetail')");
?>
<script type="text/javascript">
    alert("<?php echo $nname. ' saved' ?>");
</script>
<?php
    header("refresh:0.1; url=admin(clothes).php");
    }
?>