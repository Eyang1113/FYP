<?php
include("fyprodbconnection.php");
include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Shuttlecock List</title>
	<link rel="stylesheet" href="shuttlecock.css">
</head>
<body>
	<div class="container">
		<h1 class="title">Shuttlecock List</h1>
		<hr>
		<div class="product-list">
			<?php
				$result = mysqli_query($connect, "SELECT * FROM shuttlecock");

				while($row = mysqli_fetch_assoc($result)) {
					echo "<div class='product-item'>";
					echo "<div class='product-image'>";
					echo "<img class='product-image-front' src='" . $row["shuttlecock_image"] . "'>";
					echo "<img class='product-image-back' src='" . $row["shuttlecock_images"] . "'>";
					echo "</div>";
					echo "<div class='product-info'>";
					echo "<h3 class='product-name'>" . $row["shuttlecock_name"] . "</h3>";
					echo "<p class='product-price'>RM " . number_format($row["shuttlecock_price"], 2) . "</p>";
					echo "<a href='shuttlecockdetails.php?shuttlecock_id=" . $row["shuttlecock_id"] . "' class='product-button'> View Details</a>";
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
