<?php
include("fyprodbconnection.php");
session_start();
if (!isset($_SESSION['loggedin'])) {
	include("header.php");
}
else
	include("header(loggedin).php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Shoes List</title>
	<link rel="stylesheet" href="shoeslist.css?v=<?php echo time(); ?>">
</head>
<body>
	<div class="container">
		<h1 class="title">Shoes List</h1>
		<hr>
		<div class="product-list">
			<?php
				$result = mysqli_query($connect, "SELECT * FROM shoe");

				while($row = mysqli_fetch_assoc($result)) {
					echo "<div class='product-item'>";
					echo "<div class='product-image'>";
					echo "<img class='product-image-front' src='" . $row["shoes_images"] . "'>";
					echo "<img class='product-image-back' src='" . $row["shoes_images"] . "'>";
					echo "</div>";
					echo "<div class='product-info'>";
					echo "<h3 class='product-name'>" . $row["shoe_name"] . "</h3>";
					echo "<p class='product-price'>RM " . number_format($row["shoe_price"], 2) . "</p>";
					echo "<a href='shoesdetails.php?shoe_id=" . $row["shoe_id"] . "' class='product-button'> View Details</a>";
					echo "</div>";
					echo "</div>";
				}
			?>
		</div>
	</div>
	<?php 
	include 'footer.php'; 
	?>
</body>
</html>
