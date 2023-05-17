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
	<title>String List</title>
	<link rel="stylesheet" href="string.css">
</head>
<body>
	<div class="container">
		<h1 class="title">String List</h1>
		<hr>
		<div class="product-list">
			<?php
				$result = mysqli_query($connect, "SELECT * FROM string");

				while($row = mysqli_fetch_assoc($result)) {
					echo "<div class='product-item'>";
					echo "<div class='product-image'>";
					echo "<img class='product-image-front' src='" . $row["string_image"] . "'>";
					echo "<img class='product-image-back' src='" . $row["string_image"] . "'>";
					echo "</div>";
					echo "<div class='product-info'>";
					echo "<h3 class='product-name'>" . $row["string_name"] . "</h3>";
					echo "<p class='product-price'>RM " . number_format($row["string_price"], 2) . "</p>";
					echo "<a href='stringdetails.php?string_id=" . $row["string_id"] . "' class='product-button'>View Details</a>";
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
