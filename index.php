<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel 599</title>
    <!-- <link rel="stylesheet" href="style.css" /> -->
     <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
        scroll-padding-top: 2rem;
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
      *::selection {
        color: #fff;
        background: var(--main-color);
      }
      section {
        padding: 50px 10%;
      }
      img {
        width: 100%;
      }
      p {
        font-size: 18px;
        line-height: 2rem;
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
        background: #f8f9fa;
        box-shadow: 0 4px 41px rgba(14, 55, 54, 0.15);
        padding: 5px 3%;
        transition: 0.2s;
      }
      .logo {
        display: flex;
        align-items: center;
      }
      .logo img {
        width: 60px;
      }
      .navbar {
        display: flex;
        gap: 5px;
      }
      .navbar a {
        font-size: 1rem;
        padding: 11px 20px;
        color: #1e3a8a;
        text-transform: uppercase;
        font-weight: 600;
        transition: .3s;
        background: transparent;
        border-radius: 40px;
      }
      .navbar a:hover {
        position: relative;
        color: var(--main-color);
        width: 50px;
        height: 30px;
        background-color: #1e3a8a;
        border-radius: 40px;
      }
      .home {
        width: 100%;
        min-height: 100vh;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        background: var(--third-color);
        gap: 1rem;
      }
      .home-text {
        flex: 1 1 17rem;
      }
      .home-img {
        flex: 1 1 17rem;
      }
      .home-img img {
        animation: animate 3s linear infinite;
      }

      @keyframes animate {
        0% {
          transform: translate(0, 0); /* Titik awal */
        }
        25% {
          transform: translate(-10px, 10px); /* Bergerak ke kiri bawah */
        }
        50% {
          transform: translate(0, 20px); /* Titik bawah tengah */
        }
        75% {
          transform: translate(10px, 10px); /* Bergerak ke kanan bawah */
        }
        100% {
          transform: translate(0, 0); /* Kembali ke titik awal */
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
        color: #ffffff ;
      }
      .box .tombol:hover {
        background: #637dc5;
        color: #fff;
        scale: 110%;
      }
      .box .btn {
        border: 2px solid whitesmoke;
        color: #ffffff ;
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
      referrerpolicy="no-referrer"
    />
    <link rel="shortcut icon" href="img/title.png" type="image/x-icon">
  </head>
  <body>
    <!-- Navbar -->
    <header>
      <a href="index.php" class="logo">
        <img src="img/logo.png" alt="logo" />
      </a>

      <ul class="navbar">
            <li><a href="#home">Beranda</a></li>
            <li><a href="#info">Info kamar</a></li>
            <li><a href="#pesan">Pesan kamar</a></li>
            <li><a href="#pesanan">Pesanan anda</a></li>
            <li><a href="login/index.php">Masuk</a></li>
      </ul>
    </header>
    <!-- Home -->
    <section class="home" id="home">
      <div class="home-text">
        <span>Welcome To</span>
        <h1>Hotel 599</h1>
        <h2>Hotel nyaman dan elegan!</h2>
        <a href="#pesan" class="btn">Pesan Kamar</a>
      </div>
      <div class="home-img">
        <img src="img/hotel.png" alt="home-img" />
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
    
    </section>
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

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"
      integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
  </body>
</html>
