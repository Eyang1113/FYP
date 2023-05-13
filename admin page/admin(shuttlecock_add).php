<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Shuttlecock</title>
    <?php include "admin(header).php"; ?>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="body">
        <form name="addfrm" method="post" action="">
            <h2>Add Shuttlecock</h2>
            <label>Shuttlecock Name</label>
                <input type="text" name="name" placeholder="Shuttlecock Name">
            <label>Shuttlecock Price</label>
                <input type="number" name="price" placeholder="Shuttlecock Price" min="1" step=".01">
            <label>Shuttlecock Stock</label>
                <input type="number" name="stock" placeholder="Shuttlecock Stock" min="1">
            <label>Shuttlecock Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Shuttlecock Detail"></textarea>
            <br><button type="submit" name="savebtn">Add Shuttlecock</button>
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
        mysqli_query($conn, "INSERT INTO shuttlecock (shuttlecock_name, shuttlecock_price, shuttlecock_stock, shuttlecock_detail)
                                        VALUES ('$nname', '$nprice', '$nstock', '$ndetail')");
?>
<script type="text/javascript">
    alert("<?php echo $nname. ' saved' ?>");
</script>
<?php
    header("refresh:0.1; url=admin(shuttlecock).php");
    }
?>