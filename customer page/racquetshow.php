<?php
include("fyprodbconnection.php");

// Fetch racquet products from the database
$queryRacquet = "SELECT * FROM racquet ORDER BY RAND() LIMIT 3";
$resultRacquet = mysqli_query($connect, $queryRacquet);

// Fetch shoe products from the database
$queryShoe = "SELECT * FROM shoe ORDER BY RAND() LIMIT 3";
$resultShoe = mysqli_query($connect, $queryShoe);

// Fetch clothes products from the database
$queryClothes = "SELECT * FROM clothes ORDER BY RAND() LIMIT 3";
$resultClothes = mysqli_query($connect, $queryClothes);

// Fetch string products from the database
$queryString = "SELECT * FROM string ORDER BY RAND() LIMIT 3";
$resultString = mysqli_query($connect, $queryString);

// Fetch shuttlecock products from the database
$queryShuttlecock = "SELECT * FROM shuttlecock ORDER BY RAND() LIMIT 3";
$resultShuttlecock = mysqli_query($connect, $queryShuttlecock);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Product Show</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!-- Custom CSS -->
    <style>
    /* Custom CSS for Product Show */
    
    html,
    body {
      margin-top: 20px;
      padding: 0;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
    }
    
    .product-show-container {
      margin-top: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .product-swiper-wrapper {
      display: flex;
      max-width: 100%;
    }
    
    .product-swiper-slide {
      text-align: center;
      flex: 0 0 auto;
      margin-right: 15px;
      max-width: 100%;
    }
    
    .product-swiper-slide:last-child {
      margin-right: 0;
    }
    
    .product-swiper-slide img {
      display: block;
      width: 100%;
      height: auto;
      max-height: 200px;
      object-fit: contain;
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
        while ($row = mysqli_fetch_assoc($resultRacquet)) {
          echo '<div class="product-swiper-slide">';
          echo '<a href="racquetdetails.php?racquet_id='.$row["racquet_id"].'">';
          echo '<img src="'.$row["racquet_images"].'" alt="Racquet Image">';
          echo '<h3>'.$row["racquet_name"].'</h3>';
          echo '</a>';
          echo '</div>';
        }

        // Display shoe products
        while ($row = mysqli_fetch_assoc($resultShoe)) {
          echo '<div class="product-swiper-slide">';
          echo '<a href="shoesdetails.php?shoe_id='.$row["shoe_id"].'">';
          echo '<img src="'.$row["shoes_images"].'" alt="Shoe Image">';
          echo '<h3>'.$row["shoe_name"].'</h3>';
          echo '</a>';
          echo '</div>';
        }

        // Display clothes products
        while ($row = mysqli_fetch_assoc($resultClothes)) {
          echo '<div class="product-swiper-slide">';
          echo '<a href="clothesdetails.php?clothes_id='.$row["clothes_id"].'">';
          echo '<img src="'.$row["clothes_image"].'" alt="Clothes Image">';
          echo '<h3>'.$row["clothes_name"].'</h3>';
          echo '</a>';
          echo '</div>';
        }

        // Display string products
        while ($row = mysqli_fetch_assoc($resultString)) {
          echo '<div class="product-swiper-slide">';
          echo '<a href="stringdetails.php?string_id='.$row["string_id"].'">';
          echo '<img src="'.$row["string_image"].'" alt="String Image">';
          echo '<h3>'.$row["string_name"].'</h3>';
          echo '</a>';
          echo '</div>';
        }

        // Display shuttlecock products
        while ($row = mysqli_fetch_assoc($resultShuttlecock)) {
          echo '<div class="product-swiper-slide">';
          echo '<a href="shuttlecockdetails.php?shuttlecock_id='.$row["shuttlecock_id"].'">';
          echo '<img src="'.$row["shuttlecock_image"].'" alt="Shuttlecock Image">';
          echo '<h3>'.$row["shuttlecock_name"].'</h3>';
          echo '</a>';
          echo '</div>';
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

</body>
</html>
