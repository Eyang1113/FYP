<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Bag</title>
    <?php include "admin(header).php"; ?>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="body">
        <form name="addfrm" method="post" action="">
            <h2>Add bag</h2>
            <label>Bag Name</label>
                <input type="text" name="name" placeholder="Bag Name">
            <label>Bag Price</label>
                <input type="number" name="price" placeholder="Bag Price" min="1" step=".01">
            <label>Bag Stock</label>
                <input type="number" name="stock" placeholder="Bag Stock" min="1">
            <label>Bag Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Bag Detail"></textarea>
            <br><button type="submit" name="savebtn">Add Bag</button>
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
        mysqli_query($conn, "INSERT INTO bag (bag_name, bag_price, bag_stock, bag_detail)
                                        VALUES ('$nname', '$nprice', '$nstock', '$ndetail')");
?>
<script type="text/javascript">
    alert("<?php echo $nname. ' saved' ?>");
</script>
<?php
    header("refresh:0.1; url=admin(bag).php");
    }
?>