<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Shoe</title>
    <?php include "admin(header).php"; ?>
    <link rel="stylesheet" href="style(EditAdd).css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="body">
        <form name="addfrm" method="post" action="">
            <h2>Add Shoe</h2>
            <label>Shoe Name</label>
                <input type="text" name="name" placeholder="Shoe Name">
            <label>Shoe Price</label>
                <input type="number" name="price" placeholder="Shoe Price" min="1" step=".01">
            <label>Shoe Stock</label>
                <input type="number" name="stock" placeholder="Shoe Stock" min="1">
            <label>Shoe Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="Shoe Detail"></textarea>
            <br><button type="submit" name="savebtn">Add Shoe</button>
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
        mysqli_query($conn, "INSERT INTO shoe (shoe_name, shoe_price, shoe_stock, shoe_detail)
                                        VALUES ('$nname', '$nprice', '$nstock', '$ndetail')");
?>
<script type="text/javascript">
    alert("<?php echo $nname. ' saved' ?>");
</script>
<?php
    header("refresh:0.1; url=admin(shoe).php");
    }
?>