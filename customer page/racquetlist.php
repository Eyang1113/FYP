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
	<title>Racquet List</title>
	<link rel="stylesheet" href="racquetlist.css?v=<?php echo time(); ?>">
</head>
<body>
	<div class="container">
		<h1 class="title">Racquet List</h1>
		<hr>
		<div class="product-list">
			<?php
				$result = mysqli_query($connect, "SELECT * FROM racquet");

				while($row = mysqli_fetch_assoc($result)) {
					echo "<div class='product-item'>";
					echo "<div class='product-image'>";
					echo "<img class='product-image-front' src='" . $row["racquet_images"] . "'>";
					echo "<img class='product-image-back' src='" . $row["racquet_images"] . "'>";
					echo "</div>";
					echo "<div class='product-info'>";
					echo "<h3 class='product-name'>" . $row["racquet_name"] . "</h3>";
					echo "<p class='product-price'>RM " . number_format($row["racquet_price"], 2) . "</p>";
					echo "<a href='racquetdetails.php?racquet_id=" . $row["racquet_id"] . "' class='product-button'> View Details</a>";
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
