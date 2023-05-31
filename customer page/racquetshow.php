<?php
include("fyprodbconnection.php");

// Fetch racquet products from the database
$query = "SELECT * FROM racquet ORDER BY RAND() LIMIT 3";
$result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Swiper demo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!-- Demo styles -->
  <style>
    html,
    body {
      margin-top: 20px;
      padding: 0;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
    }

    .swiper-container {
      width: 100%;
      height: 300px;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .product-show-container {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>
<body>
  <!-- Swiper -->
  <!-- Product Show -->
  <div class="product-show-container">
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <?php
        // Display racquet products
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="swiper-slide"><img src="'.$row["racquet_images"].'" alt="Product Image"></div>';
        }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper1 = new Swiper(".swiper-container", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>

  <?php
   include("footer.php"); 
  ?>
</body>
</html>
