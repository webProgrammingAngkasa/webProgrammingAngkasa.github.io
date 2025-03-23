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
  <style>
    #reload-overlay {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      position: fixed;
      top: 0;
      bottom: 0;
      width: 100%;
      height: 100%;
      background: white;
      display: flex;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      gap: 2px;
      font-size: 3rem;
    }

    #reload-overlay span:nth-child(1) {
      font-size: 50px;
      color: black;
    }

    #reload-overlay span:nth-child(2),
    span:nth-child(3),
    span:nth-child(4) {
      font-size: 50px;
      color: transparent;
      animation: point .3s forwards;
    }

    #reload-overlay span:nth-child(2) {
      animation-delay: .1s;
    }

    #reload-overlay span:nth-child(3) {
      animation-delay: .2s;
    }

    #reload-overlay span:nth-child(4) {
      animation-delay: .3s;
    }

    @keyframes point {
      100% {
        color: black;
      }
    }

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

    .title {
      display: flex;
      flex-direction: row;
      font-size: 2rem;
      text-transform: uppercase;
      text-align: center;
      margin-block: 20px;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .title h1 {
      color: transparent;
      animation: title 1.5s forwards;
    }

    .title h1:nth-child(5),
    h1:nth-child(7) {
      animation-delay: 0s;
    }

    .title h1:nth-child(4),
    h1:nth-child(8) {
      animation-delay: .2s;
    }

    .title h1:nth-child(3),
    h1:nth-child(9) {
      animation-delay: .4s;
    }

    .title h1:nth-child(2),
    h1:nth-child(10) {
      animation-delay: .6s;
    }

    .title h1:nth-child(1),
    h1:nth-child(11) {
      animation-delay: .8s;
    }

    @keyframes title {
      100% {
        color: var(--bg-global-color);
      }
    }

    .container {
      max-width: 55%;
      width: 100%;
      background: linear-gradient(160deg, rgb(2, 28, 122) 0.00%, rgb(36, 83, 255) 100.00%);
      padding: 2.5%;
      border-radius: 15px;
      box-shadow: 0 0px 8px rgba(0, 0, 0, 0);
    }

    h3 {
      font-size: x-large;
      line-height: 2rem;
      color: #ffffff;
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
      color: #ffffff;
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
      border-radius: 4px;
      font-size: 14px;
      background-color: #fafafa;
      color: #333;
      border: none;
      border: 2px solid var(--bg-global-color);
      transform-origin: center;
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
    
    .select-room {
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
      height: 100px;
      align-items: center;
      margin-block: 20px;
    }

    
    .rangeTime .check {
      width: 35%;
    }

    .check input[type= "date"] {
      letter-spacing: 2px;
      font-size: 15px;
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

    #descriptionModal span:nth-child(1) {
      display: none;
    }

    #descriptionModal span:nth-child(2) {
      display: flex;
    }

    .container-type {
      display: none;
      flex-direction: column;
      animation: type-room-button 2s forwards;
      margin-block: 5px;
      margin-bottom: 10px;
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
      animation: checked 2s forwards;
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
      animation: checked 2s forwards;
    }

    .input-room button:hover {
      transform: scale(110%);
      background: var(--bg-button-hover);
      color: white;
    }

    @keyframes checked {
      0% {
        background: transparent;
        color: transparent;
      }
    }

    #overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      backdrop-filter: blur(10px);
      cursor: zoom-out;
      z-index: 99
    }

    #descriptionModal {
      display: none;
      position: fixed;
      justify-content: space-between;
      align-items: center;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 100%;
      max-width: 100%;
      max-height: 40%;
      height: 60%;
      border-radius: 1px;
      background-color: #1e3a8a;
      color: white;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
      text-align: center;
      transition: .9s;
      z-index: 100;
    }

    #descriptionModal:hover {
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2)
    }

    .text-modal {
      max-width: 30%;
      margin: 0;
    }

    .text-modal p {
      font-size: 15px;
    }

    #descriptionModal div:nth-child(3) {
      display: none;
    }

    .img-features {
      display: flex;
      justify-content: space-between;
      max-width: 65%;
      width: 55%;
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

    .footer {
      position: relative;
      font-weight: 600;
      width: 100%;
      padding-block: 10px;
      background-color: var(--bg-global-color);
      color: whitesmoke;
      display: flex;
      justify-content: center;
      /* box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, 
                  rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset, 
                  rgba(0, 0, 0, 0.56) 0px -2px -2px 4px; */
      letter-spacing: 2;
      bottom: 0;
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

  <script>
    function reloadWindow() {
      let count = sessionStorage.getItem("reloadCount") || 0
      count = parseInt(count)

      if (count < 2) {
        sessionStorage.setItem("reloadCount", count + 1)
        setTimeout(() => {
          window.location.reload()
        }, 500)
      } else {
        sessionStorage.removeItem("reloadCount")
      }

      window.onload = function() {
        let count = sessionStorage.getItem("reloadCount") || 0;
        if (count == 0) {
          document.getElementById("reload-overlay").style.display = "none";
        }
      }
    }
    reloadWindow()
  </script>
</head>

<body>
  <!-- <h1> FITUR KAMAR </h1> -->
  <div class="global-container-page">

    <div id="reload-overlay">
      <span>Memuat Halaman</span>
      <span>.</span>
      <span>.</span>
      <span>.</span>
    </div>
    <section class="global-container">
      <div class="title">
        <h1>P</h1>
        <h1>e</h1>
        <h1>s</h1>
        <h1>a</h1>
        <h1>n</h1>
        <h1>&ThickSpace;</h1>
        <h1>K</h1>
        <h1>a</h1>
        <h1>m</h1>
        <h1>a</h1>
        <h1>r</h1>
      </div>
      <div class="container">
        <div class="box">
          <form action="proses_simpan_pengunjung.php" method="post">
            <!--//* data pengunjung -->
            <div class="input-user">
              <h3>Isi Data Diri Anda!</h3>

              <label for="name">Nama:</label>
              <input type="text" name="nama" id="name" autocomplete="off" required><br>
              <label for="address">Alamat</label>
              <input type="text" name="alamat" id="address" autocomplete="off" required><br>
              <label for="tlp">No tlp:</label>
              <input type="tel" name="no_tlp" id="tlp" autocomplete="off" required><br>
            </div>

            <hr class="boundary-line">

            <!--//* pesan kamar -->
            <div class="form-room">

            <div class="container-type">
              <h3>Pilih Tipe Kamar</h3>
              <div class="input-room">
                <button type="button" value="standard" onclick="roomType('standard')" disabled>Standard</button>
                <button type="button" value="superior" onclick="roomType('superior')" disabled>Superior</button>
                <button type="button" value="duluxe" onclick="roomType('duluxe')" disabled>Duluxe</button>
                <button type="button" value="suite" onclick="roomType('suite')" disabled>Suite</button>
              </div>
            </div>

              <select name="no_kamar" id="numberRoom" class="select-room" required>
                <!--//* perulangan no kamar sesuai type -->
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


  <div id="overlay" onclick="closeOverlay()"></div>
  <div id="descriptionModal">
    <div class="text-modal">
      <p id="descriptionText">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus, reprehenderit eum! Ea maxime exercitationem sequi? Vel, a. Iusto, corrupti itaque nihil quisquam odio illo nam accusamus recusandae quo ullam amet?</p>
    </div>
    <div class="img-features">
      <img src="../img/icebear_cute.jpg" alt="a">
      <img src="../img/grizzly_cute.jpg" alt="icebear">
      <img src="../img/panda_cute.jpg" alt="c">
    </div>
    <span class="slideShow">&#10236;</span>
  </div>
  <br><br>

  <script>
    function roomType(choice) {
      const xhr = new XMLHttpRequest()
      xhr.open("POST", "", true)
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")

      xhr.onreadystatechange = function () {
        if (this.status === 200 && this.readyState === 4) {
          const getData = this.responseText
          const datas = JSON.parse(getData)
          let contentChoices = document.getElementById("numberRoom")
          if(datas.length === 0) {
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

      document.getElementById("numberRoom").style.display = "flex";
      document.querySelector("#overlay").style.display = "block";
      document.querySelector("#descriptionModal").style.display = "flex";
    }

    function closeOverlay() {
      document.querySelector("#overlay").style.display = "none";
      document.querySelector("#descriptionModal").style.display = "none";
    }

    document.getElementById('in').addEventListener('change', function() {
      const today = new Date();
      const todayFormatted = today.toISOString().split('T')[0];
      document.getElementById('in').setAttribute('min', todayFormatted);
      let checkInDate = new Date(this.value);
      let checkOutDate = new Date(checkInDate);
      checkOutDate.setDate(checkOutDate.getDate() + 1);

      let checkOutFormatted = checkOutDate.toISOString().split('T')[0];
      let checkOutInput = document.getElementById("out")

      checkOutInput.removeAttribute('disabled')
      checkOutInput.setAttribute('min', checkOutFormatted);
      checkOutInput.value = '';

      const arrowAnimate = document.querySelectorAll(".rangeTime span")
      arrowAnimate.forEach((arrow) => {
        arrow.style.opacity = "1"
        arrow.style.zIndex = "100"
      })
    })

    document.getElementById('out').addEventListener('change', function() {
      let buttons = document.querySelectorAll(".input-room button")
      buttons.forEach(button => {
        button.removeAttribute("disabled")
      })
      document.querySelector(".container-type").style.display = "flex"
    })
  </script>
</body>

</html>