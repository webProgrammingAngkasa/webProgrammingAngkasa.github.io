<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
      background-color: transparent;
      display: flex;
      justify-content: end;
      gap: 5px;
      align-items: center;
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
  </style>
</head>

<body>
  <header>
    <a href="../../index.php" class="logo">
      <img src="../../img/logo.png" alt="logo" />
    </a>

    <ul class="navbar">
      <li><a href="../../index.php">Beranda</a></li>
      <li><a href="#info">Info kamar</a></li>
      <li><a href="#pesan">Pesan kamar</a></li>
      <li><a href="#pesanan">Pesanan anda</a></li>
      <li><a href="sewa_hotel/form_pengunjung.php">pengunjung</a></li>
    </ul>
  </header>
</body>

</html>