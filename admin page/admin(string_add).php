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
                <input type="text" name="name" placeholder="String Name">
            <label>String Price</label>
                <input type="number" name="price" placeholder="String Price" min="1" step=".01">
            <label>String Stock</label>
                <input type="number" name="stock" placeholder="String Stock" min="1">
            <label>String Detail</label>
                <textarea cols="60" rows="4" name="detail" placeholder="String Detail"></textarea>
            <br><button type="submit" name="savebtn">Add String</button>
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
        mysqli_query($conn, "INSERT INTO string (string_name, string_price, string_stock, string_detail)
                                        VALUES ('$nname', '$nprice', '$nstock', '$ndetail')");
?>
<script type="text/javascript">
    alert("<?php echo $nname. ' saved' ?>");
</script>
<?php
    header("refresh:0.1; url=admin(string).php");
    }
?>