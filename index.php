<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>title of name</title>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      function dynamicNavbar() {
        let buttonOut = document.getElementById("button-logout"),
          userIcon = document.getElementById("user-icon"),
          buttonLog = document.getElementById("button-login"),
          historyOrder = document.querySelectorAll(".navbar li:nth-of-type(4)"),
          email = "<?php echo $_SESSION['email'] ?? ''; ?>"

        if (email === '') {
          buttonLog.style.display = "flex"
          buttonOut.style.display = "none"
          userIcon.style.display = "none"
          historyOrder.forEach(history => history.style.display = "none");
        } else {
          buttonLog.style.display = "none"
          buttonOut.style.display = "flex"
          userIcon.style.display = "flex"
          historyOrder.forEach(history => history.style.opacity = "1");
        }
      }
      dynamicNavbar()

    })
  </script>
  <link rel="stylesheet" href="style.css" />
  <style>
  </style>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="img/title.png" type="image/x-icon">
</head>

<body>
  <tb class="global-container-page">
    <header>
      <a href="index.php" class="logo" id="logo">
        <img src="img/logo.png" alt="logo" />
      </a>

      <ul class="navbar">
        <li><a href="#home" class="action">Beranda</a></li>
        <li><a href="#info" class="action">Info kamar</a></li>
        <li><a href="sewa_hotel/form_pesanan.php" class="action">Pesan Kamar</a></li>
        <li><a href="sewa_hotel/list_history_page.php" id="history" class="action">Pesanan Anda</a></li>
      </ul>

      <ul class="container-login">
        <li id="button-login"><a href="login/index.php">Masuk</a></li>
        <li id="button-logout"><a href="logout.php" onclick="return confirm('are you sure want to log out of this account?\n\n Email: <?= $_SESSION['email'] ?>')">Logout</a></li>
        <li id="user-icon"><a href="" class="user-icon"><i class="fa-solid fa-user-secret" title="<?= $_SESSION['email']; ?>"></i></a></li>
      </ul>
    </header>

    <!-- Home -->
    <section class="home" id="home">
      <div class="home-text" style="z-index: 3;">
        <span>Welcome <sup style="font-size: 16px;">To</sup> The World <sub style="font-size: 16px;">Of</sub></span>
        <h1>Hotel Angkasa</h1>
        <h2>Hotel nyaman dan elegan!</h2>
        <a href="#trending" class="btn">Populer</a>
      </div>
      <div class="home-img" style="z-index: 3;">
        <img src="img/hotel.png" alt="home-img" />
      </div>
      <div class="bubles">
        <span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span>
      </div>
    </section>

    <!-- INFO -->
    <section class="info" id="info">
      <div class="heading-info">
        <span>Kamar Tersedia</span>
        <h1>Tentukan Jenis Kamar</h1>
      </div>
      <div class="shop-container">
        <div class="box">
          <div class="box-img">
            <img src="img/tipea.jpg" alt="shop1" />
          </div>

          <!-- detail room -->
          <h2>Tipe A<br /></h2>
          <span>Nikmati kenyamanan tidur yang luar biasa di kamar kami dengan kasur queen size yang luas. Dirancang untuk memberikan pengalaman menginap yang relaks dan menyegarkan, kamar ini menawarkan ruang yang cukup untuk dua orang. Dilengkapi dengan fasilitas modern dan suasana yang hangat, kamar ini cocok untuk pasangan atau tamu yang menginginkan kenyamanan ekstra selama menginap.</span>
          <span>Kamar Tersedia : </span>
          <form action="sewa_hotel/type_kamar/main_description.php" method="get">
            <button type="submit" name="typeA" class="tombol">Lihat Detail</button>
          </form>
        </div>
        <div class="box">
          <div class="box-img">
            <img src="img/tipeb.jpg" alt="shop1" />
          </div>
          <h2>Tipe B</h2>
          <span>Kamar ini menawarkan dua tempat tidur single yang dapat menjadi pilihan ideal bagi teman perjalanan atau keluarga yang ingin tidur terpisah namun tetap dekat. Dengan ruang yang luas dan desain yang nyaman, kamar ini dilengkapi dengan berbagai fasilitas untuk memastikan kenyamanan Anda selama menginap. Solusi sempurna untuk pengalaman menginap yang praktis dan nyaman.</span>
          <span>Kamar Tersedia : </span>
          <form action="sewa_hotel/type_kamar/main_description.php" method="get">
            <button type="submit" name="typeB" class="tombol">Lihat Detail</button>
          </form>
        </div>
        <div class="box">
          <div class="box-img">
            <img src="img/tipec.jpg" alt="shop1" />
          </div>
          <h2>Tipe C</h2>
          <span>Kamar ini dirancang untuk satu tamu yang menginginkan kenyamanan dan fungsionalitas. Dilengkapi dengan tempat tidur single yang nyaman, kamar ini menawarkan ruang yang efisien dan tenang untuk beristirahat. Ideal untuk perjalanan solo atau tamu yang membutuhkan akomodasi yang sederhana namun nyaman, dengan fasilitas lengkap untuk memenuhi kebutuhan Anda.</span>
          <span>Kamar Tersedia : </span>
          <form action="sewa_hotel/type_kamar/main_description.php" method="get">
            <button type="submit" name="typeC" class="tombol">Lihat Detail</button>
          </form>
        </div>
        <div class="box">
          <div class="box-img">
            <img src="img/tipec.jpg" alt="shop1" />
          </div>
          <h2>Tipe D</h2>
          <span>Kamar ini dirancang untuk satu tamu yang menginginkan kenyamanan dan fungsionalitas. Dilengkapi dengan tempat tidur single yang nyaman, kamar ini menawarkan ruang yang efisien dan tenang untuk beristirahat. Ideal untuk perjalanan solo atau tamu yang membutuhkan akomodasi yang sederhana namun nyaman, dengan fasilitas lengkap untuk memenuhi kebutuhan Anda.</span>
          <span>Kamar Tersedia : </span>
          <form action="sewa_hotel/type_kamar/main_description.php" method="get">
            <button type="submit" name="typeD" class="tombol">Lihat Detail</button>
          </form>
        </div>
    </section>

    <!-- TRENDING ROOMS -->
    <section class="trending-rooms" id="trending">
      <div class="heading-trend">
        <h1>Kamar Populer</h1>
        <span>Berikut pilihan kamar yang populer di hotel Angkasa</span>
      </div>
      <div class="piramid-image">
        <div class="first-box-image">
          <div class="img-content">
            <img src="img/tipea.jpg" alt="a">
            <span>Duluxe Room</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipeb.jpg" alt="b">
            <span>Suite Room</span>
            <div></div>
          </div>
        </div>
        <div class="middle-box-image">
          <div class="img-content">
            <img src="img/tipea.jpg" alt="a">
            <span>Superior Room</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipeb.jpg" alt="a">
            <span>Standard Room</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipea.jpg" alt="a">
            <span>Executive Room</span>
            <div></div>
          </div>
        </div>
        <div class="last-box-image">
          <div class="img-content">
            <img src="img/tipeb.jpg" alt="a">
            <span>Familiy Room</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipea.jpg" alt="a">
            <span>Junior Suite</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipeb.jpg" alt="a">
            <span>VVIP Room</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipea.jpg" alt="a">
            <span>VIP Room</span>
            <div></div>
          </div>
        </div>
      </div>
    </section>

    <!-- ABOUT -->
    <section class="contact" id="contact">
      <ul class="social">
        <li>
          <a href=""><i class="fa-brands fa-whatsapp"></i></a>
        </li>
        <li>
          <a href=""><i class="fa-brands fa-instagram"></i></a>
        </li>
        <li>
          <a href=""><i class="fa-brands fa-facebook"></i></a>
        </li>
        <li>
          <a href=""><i class="fa-brands fa-youtube"></i></a>
        </li>
        <li>
          <a href=""><i class="fa-brands fa-tiktok"></i></a>
        </li>
        <li>
          <a href=""><i class="fa-brands fa-twitter"></i></a>
        </li>
      </ul>
    </section>
    </div>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"
      integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"></script>
</body>

</html>