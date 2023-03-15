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
                <input type="text" name="name" placeholder="Racquet Name">
            <label>Racquet Price</label>
                <input type="number" name="price" placeholder="Racquet Price" min="1" step=".01">
            <label>Racquet Stock</label>
                <input type="number" name="stock" placeholder="Racquet Stock" min="1">
            <label>Racquet Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Racquet Detail"></textarea>
            <br><button type="submit" name="savebtn">Add Racquet</button>
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
        mysqli_query($conn, "INSERT INTO racquet (racquet_name, racquet_price, racquet_stock, racquet_detail)
                                        VALUES ('$nname', '$nprice', '$nstock', '$ndetail')");
?>
<script type="text/javascript">
    alert("<?php echo $nname. ' saved' ?>");
</script>
<?php
    header("refresh:0.1; url=admin(racquet).php");
    }
?>