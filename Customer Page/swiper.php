<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

  <!-- Demo styles -->
  <style>
    html,body {
      background-color: #000;
      position: relative;
      height: 100%;
    }

    body {
      background: black;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      background: #24262b;
      display:flex;
      justify-content: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 90%;
      height: 80%;
    }

  </style>
</head>

<body>
  <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img class="swiper-slide img" src="https://i.pinimg.com/originals/5f/7f/db/5f7fdb6180ec14aaf83b89641825e33b.jpg" alt="This is our official main page"></div>
      <div class="swiper-slide">

        <a href="Racquet.php" class="swiper-slide img">
            <img class="swiper-slide img" src="https://w0.peakpx.com/wallpaper/587/891/HD-wallpaper-badminton-racket-sports-equipment-closeup.jpg" alt="This is a nice racquet">
        </a>
      </div>
      <div class="swiper-slide"><img class="swiper-slide img" src="https://lzd-img-global.slatic.net/g/p/50f5ac55c547e1a5c37221ec919cdce3.jpg_2200x2200q80.jpg_.webp" alt="This is a nice racquet grips"></div>
      <div class="swiper-slide"><img class="swiper-slide img" src="https://thumbs.dreamstime.com/b/shuttlecock-badminton-racket-shoe-wooden-background-65335530.jpg" alt="this is a nice badminton shoes"></div>
      <div class="swiper-slide"><img class="swiper-slide img" src="https://badminton-shop.com/wp-content/themes/zerv-wptheme/dist/imgs/stock-photos/placeholder-badminton.jpg" alt="Thisis a badminton clothes"></div>
      <div class="swiper-slide"><img class="swiper-slide img" src="https://c1.wallpaperflare.com/preview/648/281/193/badminton-bat-ball-balls.jpg" alt="This is another badminton accessories"></div>
      <div class="swiper-slide"><img class="swiper-slide img" src="https://stadiumastro-kentico.s3.amazonaws.com/stadiumastro/media/sa-images/2018/july/4/chongwei.jpg?ext=.jpg" alt="Lee chong wei"></div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  
  <!-- Swiper JS -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
</body>

</html>