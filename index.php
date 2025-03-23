<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hotel 599</title>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      function dynamicNavbar() {
        var buttonOut = document.getElementById("button-logout")
        var userIcon = document.getElementById("user-icon")
        var buttonLog = document.getElementById("button-login")
        let email = "<?php echo $_SESSION['otp'] ?? ''; ?>"

        if (email === '') {
          buttonLog.style.display = "flex"
          buttonOut.style.display = "none"
          userIcon.style.display = "none"
        } else {
          buttonOut.style.display = "flex"
          userIcon.style.display = "flex"
          buttonLog.style.display = "none"
        }
      }
      dynamicNavbar()

    })
  </script>
  <!-- <link rel="stylesheet" href="style.css" /> -->
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      scroll-padding-top: 4.4rem;
      scroll-behavior: smooth;
      text-decoration: none;
      list-style: none;
      font-size: 18px;
    }

    body::-webkit-scrollbar {
      display: none;
    }

    :root {
      --main-color: #ffffff;
      --second-color: #ffffff;
      --third-color: #1e3a8a;
    }

    .global-container-page {
      width: 100%;
      overflow-x: hidden;

    }

    section {
      padding: 50px 10%;
    }

    img {
      width: 100%;
    }

    header {
      position: fixed;
      width: 100%;
      top: 0;
      right: 0;
      z-index: 1000;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: whitesmoke;
      box-shadow: 0 4px 41px rgba(14, 55, 54, 0.15);
      padding: 15px 3%;
      height: 80px;
      transition: 0.2s;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      width: 65px;
    }

    .navbar {
      display: flex;
      gap: 10px;
      line-height: 75px;
    }

    .navbar a {
      font-size: 1rem;
      padding: 10px 15px;
      color: #1e3a8a;
      text-transform: uppercase;
      font-weight: bold;
      transition: .3s;
      background: transparent;
      border-radius: 40px;
      line-height: 80px;
      letter-spacing: .8px;
    }

    .navbar a:hover {
      color: var(--main-color);
      background-color: var(--third-color);
      border-radius: 40px;
    }

    .container-login {
      display: flex;
      align-items: center;
      background: transparent;
      gap: 20px;
    }

    .container-login #button-login,
    #button-logout,
    #user-icon {
      display: none;
    }

    .container-login li:not(#user-icon) a {
      font-size: 1rem;
      padding: 8px 10px;
      text-transform: uppercase;
      font-weight: bolder;
      background: transparent;
      letter-spacing: .8px;
      border: 2px solid var(--third-color);
      border-radius: 50px;
      cursor: pointer;
      color: var(--third-color);
    }

    .container-login li:not(#user-icon) a:hover {
      background-color: var(--main-color);
    }

    .container-login li i {
      font-size: 42px;
      color: #1e3a8a;
      text-transform: uppercase;
      font-weight: bold;
      transition: .3s;
      background: transparent;
      letter-spacing: .8px;
      padding-inline: 10px;
      line-height: 80px;
    }

    .user-icon i:hover {
      color: var(--main-color);
      background: transparent;
    }

    header:has(> .container-login #user-icon i:hover) .container-login li:not(#user-icon) a {
      border: 2px solid var(--main-color);
      background: transparent;
      color: var(--main-color);
    }
    
    header:has(> .container-login #user-icon i:hover) .navbar .action {
      color: var(--main-color);
      font-weight: bold;
    }

    header:has(> .container-login #user-icon i:hover) {
      background: var(--third-color);
      box-shadow: none;
      z-index: 1;
    }

    .home {
      width: 100%;
      min-height: 100vh;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      background: var(--third-color);
      gap: 1rem;
      overflow: hidden;
      z-index: 3;
    }


    .bubles {
      position: absolute;
      width: 100%;
      height: 100%;
      pointer-events: none;
    }

    .buble {
      position: absolute;
      bottom: -50px; 
      background: rgba(255, 255, 255, 0.13); 
      border-radius: 50%;
      animation: bubleUp linear infinite;
      z-index: 2;
    }


    @keyframes bubleUp {
      0% {
        transform: translateY(0);
        opacity: 0;
      }
      20% {
        opacity: 1;
      }
      100% {
        transform: translateY(-100vh);
        opacity: 0;
      }
    }


    .buble:nth-child(1) {
      width: 8px;
      height: 8px;
      left: 3%;
      animation-duration: 4s;
      animation-delay: 0s;
    }
    .buble:nth-child(2) {
      width: 12px;
      height: 12px;
      left: 12%;
      animation-duration: 5.5s;
      animation-delay: 1s;
    }
    .buble:nth-child(3) {
      width: 16px;
      height: 16px;
      left: 22%;
      animation-duration: 6.2s;
      animation-delay: 0.5s;
    }
    .buble:nth-child(4) {
      width: 10px;
      height: 10px;
      left: 35%;
      animation-duration: 7s;
      animation-delay: 2s;
    }
    .buble:nth-child(5) {
      width: 20px;
      height: 20px;
      left: 48%;
      animation-duration: 5s;
      animation-delay: 1.8s;
    }
    .buble:nth-child(6) {
      width: 14px;
      height: 14px;
      left: 58%;
      animation-duration: 7.5s;
      animation-delay: 0.7s;
    }
    .buble:nth-child(7) {
      width: 18px;
      height: 18px;
      left: 67%;
      animation-duration: 6.8s;
      animation-delay: 1.2s;
    }
    .buble:nth-child(8) {
      width: 22px;
      height: 22px;
      left: 76%;
      animation-duration: 8s;
      animation-delay: 1.5s;
    }
    .buble:nth-child(9) {
      width: 9px;
      height: 9px;
      left: 85%;
      animation-duration: 4.8s;
      animation-delay: 0.3s;
    }
    .buble:nth-child(10) {
      width: 13px;
      height: 13px;
      left: 93%;
      animation-duration: 5.2s;
      animation-delay: 1.7s;
    }
    .buble:nth-child(11) {
      width: 17px;
      height: 17px;
      left: 6%;
      animation-duration: 6s;
      animation-delay: 0.4s;
    }
    .buble:nth-child(12) {
      width: 11px;
      height: 11px;
      left: 15%;
      animation-duration: 7.3s;
      animation-delay: 1.1s;
    }
    .buble:nth-child(13) {
      width: 19px;
      height: 19px;
      left: 25%;
      animation-duration: 5.7s;
      animation-delay: 1.9s;
    }
    .buble:nth-child(14) {
      width: 10px;
      height: 10px;
      left: 37%;
      animation-duration: 6.4s;
      animation-delay: 0.8s;
    }
    .buble:nth-child(15) {
      width: 21px;
      height: 21px;
      left: 49%;
      animation-duration: 7.6s;
      animation-delay: 1.3s;
    }
    .buble:nth-child(16) {
      width: 12px;
      height: 12px;
      left: 59%;
      animation-duration: 5.9s;
      animation-delay: 1.6s;
    }
    .buble:nth-child(17) {
      width: 23px;
      height: 23px;
      left: 68%;
      animation-duration: 8.2s;
      animation-delay: 0.6s;
    }
    .buble:nth-child(18) {
      width: 15px;
      height: 15px;
      left: 77%;
      animation-duration: 5.3s;
      animation-delay: 2.1s;
    }
    .buble:nth-child(19) {
      width: 20px;
      height: 20px;
      left: 88%;
      animation-duration: 6.5s;
      animation-delay: 1s;
    }
    .buble:nth-child(20) {
      width: 9px;
      height: 9px;
      left: 96%;
      animation-duration: 4.5s;
      animation-delay: 0.9s;
    }
    .home-text {
      flex: 1 1 17rem;
      letter-spacing: .5px;
    }

    .home-img {
      flex: 1 1 17rem;
    }

    .home-img img {
      animation: animate 3s linear infinite;
    }

    @keyframes animate {
      0% {
        transform: translate(0, 0);
        
      }

      25% {
        transform: translate(-10px, 10px);
        
      }

      50% {
        transform: translate(0, 20px);
        
      }

      75% {
        transform: translate(10px, 10px);
        
      }

      100% {
        transform: translate(0, 0);
        
      }
    }

    .home-text span {
      font-size: 1rem;
      text-transform: uppercase;
      font-weight: 600;
      color: var(--second-color);
    }

    .home-text h1 {
      font-size: 3.2rem;
      color: var(--main-color);
      font-weight: bolder;
    }

    .home-text h2 {
      font-size: 1.8rem;
      font-weight: 600;
      color: var(--second-color);
      text-transform: uppercase;
      margin: 0.5rem 0 1.4rem;
    }

    .tombol {
      padding: 7px 16px;
      border: 2px solid var(--second-color);
      border-radius: 40px;
      background-color: transparent;
      color: #1e3a8a;
      font-weight: 500;
      transition: 100ms;
    }

    .tombol:hover {
      color: #362e2e;
      background: var(--second-color);
    }

    .btn {
      padding: 7px 16px;
      border: 2px solid var(--second-color);
      border-radius: 40px;
      color: var(--second-color);
      font-weight: 500;
      transition: 100ms;
    }

    .btn:hover {
      color: #362e2e;
      background: var(--second-color);
    }

    .heading {
      text-align: center;
    }

    .heading span {
      font-size: 1rem;
      font-weight: 600;
      color: #1e3a8a;
    }

    .heading h1 {
      font-size: 2rem;
      text-transform: uppercase;
      color: #1e3a8a;
    }

    .shop-container {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      margin-top: 7rem;
    }

    .shop-container .box {
      flex: 1 1 10rem;
      background: var(--third-color);
      padding: 20px;
      display: flex;
      flex-direction: column;
      text-align: center;
      align-items: center;
      margin-top: 3rem;
      border-radius: 0.5rem;
    }

    .shop-container .box .box-img {
      width: 150px;
      height: 150px;
      margin-top: -100px;
    }

    .shop-container .box .box-img img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      object-position: center;
    }

    .shop-container .box h2 {
      font-size: 1.2rem;
      margin: 0.2rem 0 0.2rem;
      color: #ffffff;
    }

    .shop-container .box span {
      color: #fff;
      font-size: 0.7rem;
      font-weight: 500;
      margin: 0.2rem 0 0.5rem;
    }

    .box .tombol {
      border: 2px solid whitesmoke;
      color: #ffffff;
    }

    .box .tombol:hover {
      background: #637dc5;
      color: #fff;
      scale: 110%;
    }

    .box .btn {
      border: 2px solid whitesmoke;
      color: #ffffff;
    }

    .box .btn:hover {
      background: #637dc5;
      color: #fff;
      scale: 110%;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      margin-top: 2rem;
    }

    .contact {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .social {
      display: flex;
      margin: 0;
      padding: 0;
    }

    .social li {
      display: flex;
      height: 100%;
      justify-content: center;
      align-items: center;
    }

    .social li a {
      margin-left: 20px;
      padding: 8px 8px 4px 8px;
      background: #1e3a8a;
      border-radius: 50%;
      transition: all 0.2s ease-out;
    }

    .social li a:hover {
      box-shadow: 0 0 0 8px rgba(0, 0, 0, 0.1);
    }

    .social li a i {
      color: #fff;
      font-size: 27px;
    }

    .links {
      margin: 1rem 0 1rem;
    }

    .links a {
      color: var(--second-color);
      font-size: 1rem;
      font-weight: 500;
      padding: 1rem;
    }

    .links a:hover {
      text-decoration: underline;
    }

    .contact p {
      text-align: center;
    }
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
  <div class="global-container-page">

  <header>
    <a href="index.php" class="logo" id="logo">
      <img src="img/logo.png" alt="logo" />
    </a>
  
    <ul class="navbar">
      <li><a href="#home" class="action">Beranda</a></li>
      <li><a href="#info" class="action">Info kamar</a></li>
      <li><a href="sewa_hotel/form_pesanan.php" class="action">Pesan kamar</a></li>
    </ul>
  
    <ul class="container-login">
      <li id="button-login"><a href="login/index.php">Masuk</a></li>
      <li id="button-logout"><a href="logout.php" onclick="return confirm('are you sure want to log out of this account?\n\n Email: <?= $_SESSION['email']?>')">Logout</a></li>
      <li id="user-icon"><a href="" class="user-icon"><i class="fa-solid fa-user-secret" title="<?= $_SESSION['email'];?>"></i></a></li>
    </ul>
  </header>

  <!-- Home -->
  <section class="home" id="home">
    <div class="home-text" style="z-index: 3;">
      <span>Welcome <sup style="font-size: 16px;">To</sup> The World <sub style="font-size: 16px;">Of</sub></span>
      <h1>Hotel 599</h1>
      <h2>Hotel nyaman dan elegan!</h2>
      <a href="#pesan" class="btn">Pesan Kamar</a>
    </div>
    <div class="home-img" style="z-index: 3;">
        <img src="img/hotel.png" alt="home-img" />
    </div>
    <div class="bubles">
      <span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span>
    </div>
  </section>
  
  <!-- SHOP -->
  <section class="info" id="info">
    <div class="heading">
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
  
  <!-- SHOP -->
  <section class="pesan" id="pesan">
    <div class="heading">
      <span>Pesan Sekarang!</span>
      <h1>Tentukan Jenis Kamar</h1>
    </div>
    <div class="shop-container">
      <div class="box">
        <div class="box-img">
          <img src="img/tipea.jpg" alt="shop1" />
        </div>

        <h2>Tipe A<br /></h2>
        <span>Mulai dari harga Rp.3.000.000 - Rp.10.000.000</span>
        <a href="sewa_hotel/form_pesanan.php" class="btn">Pesan</a>
      </div>
      <div class="box">
        <div class="box-img">
          <img src="img/tipeb.jpg" alt="shop1" />
        </div>
        <h2>Tipe B</h2>
        <span>Mulai dari harga Rp.2.000.000 - Rp.8.000.000</span>
        <a href="sewa_hotel/form_pesanan.php" class="btn">Pesan</a>
      </div>
      <div class="box">
        <div class="box-img">
          <img src="img/tipec.jpg" alt="shop1" />
        </div>
        <h2>Tipe C</h2>
        <span>Mulai dari harga Rp.1.500.000 - Rp.5.000.000</span>
        <a href="sewa_hotel/form_pesanan.php" class="btn">Pesan</a>
      </div>
      <div class="box">
        <div class="box-img">
          <img src="img/tipec.jpg" alt="shop1" />
        </div>
        <h2>Tipe D</h2>
        <span>Mulai dari harga Rp.4.000.000 - Rp.10.000.000</span>
        <a href="sewa_hotel/form_pesanan.php" class="btn">Pesan</a>
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