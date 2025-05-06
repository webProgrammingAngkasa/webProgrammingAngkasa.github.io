<?php
include '../connect/conn.php';
//TODO: *** number room ***
if (isset($_POST['type'])) {
  $type = $_POST['type'];
  $query = [
    "standard" => "SELECT id, no_kamar, mv_type.harga AS harga FROM list_no_kamar INNER JOIN mv_type ON mv_type.id_type = list_no_kamar.fk_type WHERE status = 'Available' AND id <= 10 GROUP BY no_kamar ORDER BY id ASC",
    "superior" => "SELECT id, no_kamar, mv_type.harga AS harga FROM list_no_kamar INNER JOIN mv_type ON mv_type.id_type = list_no_kamar.fk_type WHERE status = 'Available' AND id > 10 AND id <= 20 GROUP BY no_kamar ORDER BY id ASC",
    "duluxe" => "SELECT id, no_kamar, mv_type.harga AS harga FROM list_no_kamar INNER JOIN mv_type ON mv_type.id_type = list_no_kamar.fk_type WHERE status = 'Available' AND id > 20 AND id <= 30 GROUP BY no_kamar ORDER BY id ASC",
    "suite" => "SELECT id, no_kamar, mv_type.harga AS harga FROM list_no_kamar INNER JOIN mv_type ON mv_type.id_type = list_no_kamar.fk_type WHERE status = 'Available' AND id > 30 AND id <= 40 GROUP BY no_kamar ORDER BY id ASC"
  ];
  $run = $dbConnect->query($query[$type]);
  $data = [];
  while ($row = $run->fetch_assoc()) {
    $data[] = $row;
  }
  $encode = json_encode($data);
  echo $encode;
  exit;
}

//TODO: *** return number room after checkout ***

function originalStatusRoom()
{
  global $dbConnect;
  $query = "UPDATE list_no_kamar lk
        INNER JOIN (
            SELECT no_kamar, MAX(check_out) AS last_check_out
            FROM tb_pemesanan
            GROUP BY no_kamar
        ) tp ON tp.no_kamar = lk.id
        SET lk.status = 'Available'
        WHERE tp.last_check_out <= NOW()";
  $result = $dbConnect->query($query);
  return $result;
}
originalStatusRoom();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --main-color: #ffffff;
      --second-color: #ffffff;
      --bg-global-color: #1e3a8a;
      --bg-button-hover: #637dc5;
    }

    body {
      background: #1e3a8a;
      font-family: 'Poppins', sans-serif;
    }

    section {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      min-height: 100vh;
      background: transparent;
      box-shadow: 0px 25px 20px -20px rgba(0, 0, 0, 0.45) inset;
    }

    .container {
      max-width: 30%;
      width: 100%;
      background:rgb(255, 255, 255);
      padding: 2.5%;
      border-radius: 15px;
      box-shadow: 0 0 17px 10px rgb(0 0 0 / 30%);
    }

    h3 {
      font-size: x-large;
      line-height: 2rem;
      color:rgb(0, 0, 0);
      text-align: center;
      text-transform: capitalize;
      margin-block: 8px;
      animation: h3 2s forwards;
    }

    @keyframes h3 {
      0% {
        color: transparent;
      }
    }

    .container p {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    label {
      display: block;
      font-size: 15px;
      margin-bottom: 6px;
      color:rgb(0, 0, 0);
      font-weight: bold;
      letter-spacing: .5px;
      animation: label 2s forwards;
    }

    @keyframes label {
      0% {
        color: transparent
      }
    }

    input[type="text"],
    input[type="tel"],
    input[type="date"],
    select,
    textarea {
      display: flex;
      justify-content: center;
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 8px;
      font-size: 14px;
      background-color: #e6e6e6;
      color:rgb(0, 0, 0);
      border: none;
      animation: input 2s forwards;
    }

    @keyframes input {
      0% {
        outline: none;
        background: transparent;
      }
    }

    input[type="text"]:focus,
    input[type="tel"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
      border: 2px solid #ccc;
      outline: none;
    }

    textarea {
      resize: vertical;
    }

    .container .tombol {
      padding: 7px 16px;
      border-radius: 40px;
      border: 2px solid whitesmoke;
      background-color: var(--bg-global-color);
      color: #ffffff;
      font-weight: 500;
      width: 100%;
      transition: 100ms;
      cursor: pointer;
      font-weight: 800;
      animation: button 2.5s forwards;
      transition: .2s;
    }

    .container .tombol:hover {
      background: var(--bg-button-hover);
      color: var(--second-color);
      letter-spacing: 1px;
      font-weight: 900;
    }

    @keyframes button {
      0% {
        background: transparent;
        color: transparent;
        border-color: transparent;
      }
    }

    #numberRoom {
      display: none;
      animation: select-room 2s forwards;
      margin: auto;
    }

    @keyframes select-room {
      0% {
        background: transparent;
        color: transparent;
        width: 10px;
      }

      100% {
        width: 100%;
      }
    }

    .rangeTime {
      display: flex;
      justify-content: space-evenly;
      left: 10px;
      height: 100px;
      align-items: center;
      margin-block: 20px;
    }


    .rangeTime .check {
      width: 40%;
    }

    .check input[type="date"] {
      letter-spacing: 1px;
      font-size: 10px;
      font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
      font-weight: bold;
    }

    .rangeTime span {
      font-size: 5rem;
      align-items: end;
      font-weight: bold;
      cursor: default;
      bottom: 0;
      line-height: 100px;
      z-index: -1;
      opacity: 0;
      color: transparent;
      animation: arrow 2s forwards;
      transition: 1s;
    }

    @keyframes arrow {
      100% {
        z-index: 1;
        color: var(--second-color);
      }
    }

    .rangeTime h3 {
      font-size: 18.5px;
      color: #ffffff;
      font-weight: bold;
      text-align: center;
      text-transform: capitalize;
    }

    .container-type {
      display: none;
      flex-direction: column;
      margin-block: 5px;
      margin-bottom: 10px;
      animation: type-room-button 2s forwards;
    }

    @keyframes type-room-button {
      0% {
        background: transparent;
        color: transparent;
      }

      100% {
        width: 100%;
      }
    }

    .input-room {
      display: flex;
      justify-content: space-around;
      flex-direction: row;
      margin-block: 5px;
      margin-top: 15px;
      margin-bottom: 10px;
    }

    .input-room button:nth-child(1),
    .input-room button:nth-child(2) {
      width: 120px;
      height: 45px;
      border-top-right-radius: 50%;
      border-bottom-left-radius: 50%;
      border-top-left-radius: 5px;
      border-bottom-right-radius: 5px;
      background: blueviolet;
      color: #fafafa;
      font-weight: bold;
      border: none;
      cursor: pointer;
      transition: 200ms;
      animation: checked 1s forwards;
    }

    .input-room button:nth-child(3),
    .input-room button:nth-child(4) {
      width: 120px;
      height: 45px;
      border-top-left-radius: 50%;
      border-bottom-right-radius: 50%;
      border-top-right-radius: 5px;
      border-bottom-left-radius: 5px;
      background: blueviolet;
      color: #fafafa;
      font-weight: bold;
      border: none;
      cursor: pointer;
      transition: 200ms;
      animation: checked 1s forwards;
    }

    .input-room button:hover {
      background: var(--bg-button-hover);
      color: white;
      letter-spacing: .5px;
      scale: 110%;
    }

    @keyframes checked {
      0% {
        background: transparent;
        color: transparent;
      }
    }

    .container-modal {
      position: fixed;
      display: none;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      top: 0%;
      left: 0%;
      background: transparent;
      width: 100%;
      height: 100vh;
      z-index: 99;
    }

    #overlay {
      display: none;
      position: fixed;
      width: 100%;
      height: 100%;
      background-color: rgba(16, 15, 15, .5);
      backdrop-filter: blur(20px);
      cursor: zoom-out;
      z-index: 100;
    }

    @keyframes showOverlay {
      0% {
        position: absolute;
        width: 0%;
        height: 0%;
        background: transparent;
        transform: translateY(50px);
        opacity: 0;
      }

      50% {
        background: rgba(125, 125, 125, .35);
      }

      75% {
        border-radius: 10%;
        opacity: 1;
      }

      100% {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: none;
        background: rgba(16, 15, 15, .5);
      }
    }

    @keyframes hideOverlay {
      100% {
        opacity: 0;
      }
    }

    #descriptionModal {
      position: absolute;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 80%;
      height: 45%;
      padding-inline: 10px;
      border-radius: 20px;
      background-color: #1e3a8a;
      color: white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
      transition: .5s;
      scale: 0;
      z-index: 100;
    }

    #descriptionModal:hover {
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2)
    }

    @keyframes hideModal {
      0% {
        opacity: 1;
        scale: 100%;
      }

      50% {
        transform: translateY(10px);
        scale: 100%;
      }

      75% {
        scale: 110%;
        transform: translateY(-50px);
      }

      100% {
        position: absolute;
        transform: translateY(390px);
      }
    }

    .box-modal {
      position: absolute;
      overflow: hidden;
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      width: 100%;
      height: 85%;
      background: transparent;
    }

    @keyframes slideUp {
      100% {
        transform: translateY(-250px);
      }
    }

    @keyframes slideDown {
      0% {
        transform: translateY(-250px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    .title-modal {
      position: absolute;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 500px;
      height: 55px;
      background: #1e3a8a;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 50px 36px -40px inset;
      border-radius: 15px;
      color: var(--main-color);
      font-size: 30px;
      font-weight: 700;
      text-transform: capitalize;
      top: 0;
      transform: translateY(-40px);
      /* z-index: 99; */
    }

    .text-modal {
      max-width: 30%;
      margin: 0;
      overflow: hidden;
    }

    .text-modal p {
      font-size: 15px;
    }

    .input-icon {
      position: relative;
      margin-bottom: 20px;
    }

    .input-icon i {
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
      color: #888;
    }

    .input-icon input {
      width: 100%;
      padding: 10px 10px 10px 35px;
      border: 1px solid #ccc;
      border-radius: 5px;
      outline: none;
      box-sizing: border-box;
    }

    .input-icon input:focus {
      border-color: #007bff;
    }

    .img-features {
      display: flex;
      gap: 20px;
    }

    .img-features li {
      list-style-type: none;
    }

    .img-features img {
      width: 200px;
      height: 200px;
      border-radius: 10px;
      transition: 150ms;
    }

    .img-features img:hover {
      transform: scale(110%);
    }

    .slide-arrow {
      position: absolute;
      display: flex;
      align-items: center;
      gap: 40px;
      transform: translateY(200px);
    }

    .slide-arrow button {
      cursor: pointer;
      border: none;
      background: transparent;
      padding: 10px;
      transition: .4s;
    }

    .slide-arrow button:hover {
      text-shadow: 0px 10px 30px whitesmoke;
    }

    .slide-arrow span {
      font-size: 5rem;
      font-weight: bolder;
      color: white;
    }

    .boundary-line {
      width: 50px;
      height: 2px;
      background-color: whitesmoke;
      border: none;
      margin: 20px auto;
      animation: expand 1s forwards;
    }

    @keyframes expand {
      0% {
        width: 0%;
        background: transparent;
      }

      100% {
        width: 100%;
      }
    }


    @media screen and (max-width: 480px) {
      .container {
        display: flex;
        justify-content: space-evenly;
        background: transparent;
      }
    }
  </style>

<body>
  <!-- <h1> FITUR KAMAR </h1> -->
  <div class="global-container-page">
    <section class="global-container">
      <div class="container">
        <div class="box">
          <form action="proses_simpan_pengunjung.php" method="post">
            <!--//* data pengunjung -->
            <div class="input-user">
              <h3>Isi Data Diri Anda</h3>
              <label for="nama">Nama:</label>
    <div class="input-icon">
      <i class="fa fa-user"></i>
      <input type="text" name="nama" id="nama" placeholder="Masukkan nama" required>
    </div>

    <label for="alamat">Alamat:</label>
    <div class="input-icon">
      <i class="fa fa-map-marker-alt"></i>
      <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat" required>
    </div>

    <label for="no_tlp">No Telepon:</label>
    <div class="input-icon">
      <i class="fa fa-phone"></i>
      <input type="tel" name="no_tlp" id="no_tlp" placeholder="Masukkan no telepon" required>
    </div>
            </div>

            <hr class="boundary-line">

            <!--//* pesan kamar -->
            <div class="form-room">
              <h3>Pilih Waktu Booking</h3>
              <div class="container-type">
                <h3>Pilih Tipe Kamar</h3>
                <div class="input-room">
                  <button type="button" value="standard" onclick="roomType('standard')" disabled>Standard</button>
                  <button type="button" value="superior" onclick="roomType('superior')" disabled>Superior</button>
                  <button type="button" value="duluxe" onclick="roomType('duluxe')" disabled>Duluxe</button>
                  <button type="button" value="suite" onclick="roomType('suite')" disabled>Suite</button>
                </div>
              </div>

              <select name="no_kamar" id="numberRoom" required>
                <!--//* perulangan no kamar sesuai type ... -->
              </select>

              <div class="rangeTime">
                <div class="check">
                  <h3 for="in">check in</h3>
                  <input type="date" name="check_in" id="in" required>
                </div>
                <span>&#10174;</span>
                <div class="check">
                  <h3 for="out">check out</h3>
                  <input type="date" name="check_out" id="out" required disabled>
                </div>
              </div>

              <button type="submit" name="submit" class="tombol">PESAN</button>
            </div>
          </form>
        </div>
      </div>
  </div>


  <div class="container-modal">
    <div id="overlay" onclick="closeOverlay()"></div>
    <div id="descriptionModal">
      <div class="title-modal"></div>
      <div class="box-modal">
        <div class="text-modal">
          <p id="descriptionText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus deleniti natus dolores. Veritatis repellendus expedita similique iure vitae ex, inventore voluptate nesciunt ipsum esse atque sequi quasi enim debitis quia.</p>
        </div>
        <div class="img-features">
          <li><img src="../img/icebear_cute.jpg" alt="a"></li>
          <li><img src="../img/grizzly_cute.jpg" alt="icebear"></li>
          <li><img src="../img/panda_cute.jpg" alt="c"></li>
        </div>
      </div>
      <div class="slide-arrow">
        <button type="button" class="swipe-down" onclick="swipeDown()" style="display: none;"><span>&DownArrow;</span></button>
        <button type="button" class="swipe-up" onclick="swipeUP()"><span>&UpArrow;</span></button>
      </div>
    </div>
  </div>

  <script>
    function roomType(choice) {
      const xhr = new XMLHttpRequest()
      xhr.open("POST", "", true)
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")

      xhr.onreadystatechange = function() {
        if (this.status === 200 && this.readyState === 4) {
          const getData = this.responseText
          const datas = JSON.parse(getData)
          let contentChoices = document.getElementById("numberRoom")
          if (datas.length === 0) {
            conditionRoom = `kamar ${choice} tidak tersedia`
          } else {
            conditionRoom = `pilih kamar ${choice}`
          }
          contentChoices.innerHTML = `<option value="" disabled selected style="text-transform: capitalize;">${conditionRoom}</option>`
          contentChoices.style.textTransform = "capitalize"
          datas.forEach(data => {
            let option = document.createElement("option")
            option.value = data.id
            option.innerText = `room: ${data.no_kamar}\t` + `|` + `\tharga: rp.${data.harga}`
            contentChoices.appendChild(option)
          })
        }
      }
      xhr.send("type=" + choice)

      document.querySelector(".title-modal").textContent = `description ${choice} room`
      let modals = document.querySelector(".container-modal").style.display = "flex";

      document.querySelector("#descriptionModal").style.display = "flex";
      document.querySelector("#descriptionModal").style.animation = "showModal 1.5s ease forwards"
      document.querySelector("#overlay").style.animation = "showOverlay .6s ease-in-out forwards";
      setTimeout(() => document.querySelector("#overlay").style.display = "block", 350)
      setTimeout(() => document.getElementById("numberRoom").style.display = "flex", 700)

      if (modals === "flex") {
        document.querySelector(".input-room").addEventListener("click", (e) => {
          if (e.target.tagName === "BUTTON") {
            let rect = e.target.getBoundingClientRect();
            let y = rect.top.toFixed()

            const style = document.styleSheets[0];
            style.insertRule(`
            @keyframes showModal {
              0% {
                position: relative;
                z-index: 100;
                transform: translateY(${y * 3}px);
                opacity: 0;
                scale: 0;
              }

              25% {
                transform: translateY(-40px);
                scale: 120%;
              }

              50% {
                transform: translateY(10px);
                scale: 100%;
              }

              75% {
                transform: translateY(-5px);
                scale: 100%;
              }

              90% {
                opacity: 1;
              }

              100% {
                scale: 100%;
                opacity: 1;
              }
            }
            `, style.cssRules.length)
          }
        })
      }

      const mainModal = document.querySelectorAll(".box-modal > div"),
        arrowClick = document.querySelectorAll(".slide-arrow > button")
      document.querySelector(".swipe-up").addEventListener("click", () => {
        mainModal[0].style.animation = "slideUp 1s forwards"
        mainModal[1].style.animation = "slideUp 1s forwards"
        arrowClick[0].style.display = "flex"
      })
      document.querySelector(".swipe-down").addEventListener("click", () => {
        mainModal[0].style.animation = "slideDown 1s forwards"
        mainModal[1].style.animation = "slideDown 1s forwards"
        arrowClick[0].style.display = "none"
      })

    }

    function closeOverlay() {
      let modals = document.querySelector(".container-modal"),
        modal = document.querySelector("#descriptionModal"),
        overlay = document.querySelector("#overlay")
      mainModals = document.querySelectorAll(".box-modal > div")
      arrowClick = document.querySelectorAll(".slide-arrow > button")

      overlay.style.animation = "hideOverlay .4s ease forwards"
      overlay.style.animationDelay = ".7s"
      modal.style.animation = "hideModal .8s ease forwards"
      setTimeout(() => {
        modal.style.animation = "none"
        modals.style.display = "none"
        modal.style.display = "none"
        overlay.style.display = "none"
      }, 800)

      set
      arrowClick[0].style.display = "none"
      mainModals.forEach(e => e.removeAttribute("style"));
      console.log(mainModal);

    }

    document.addEventListener("DOMContentLoaded", () => {
      const todayFormatted = new Date().toLocaleDateString('en-CA');
      document.getElementById('in').setAttribute('min', todayFormatted);
      document.getElementById('in').addEventListener('change', function() {
        let checkInDate = new Date(this.value);
        let checkOutDate = new Date(checkInDate);
        checkOutDate.setDate(checkOutDate.getDate() + 1);
        let checkOutFormatted = checkOutDate.toISOString().split('T')[0];

        let checkOutInput = document.getElementById("out")
        checkOutInput.removeAttribute('disabled')
        checkOutInput.setAttribute('min', checkOutFormatted);
        checkOutInput.value = '';

        const arrowAnimate = document.querySelectorAll(".rangeTime span")
        arrowAnimate.forEach(arrow => {
          arrow.style.opacity = "1"
          arrow.style.zIndex = "100"
        })
      })
    })

    document.getElementById('out').addEventListener('change', function() {
      document.querySelector(".form-room h3").style.display = "none"
      document.querySelector(".container-type").style.display = "flex"
      let buttons = document.querySelectorAll(".input-room button")
      buttons.forEach(button => button.removeAttribute("disabled"))
    })
  </script>
</body>

</html>