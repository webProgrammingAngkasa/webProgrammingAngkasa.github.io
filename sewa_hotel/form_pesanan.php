<!-- ! -->
<?php
include '../connect/conn.php';
function showNoKamar()
{
  global $dbConnect;

  $query = ["SELECT list_no_kamar.id AS id_no_room, list_no_kamar.no_kamar AS no_kamar FROM list_no_kamar WHERE status = 'Available' ORDER BY list_no_kamar.id ASC"];
  $result = $dbConnect->query($query[0]);

  $ids = [];
  $no_rooms = [];
  while ($value = $result->fetch_assoc()) {
    $ids[] = $value['id_no_room'];
    $no_rooms[] = $value['no_kamar'];
  }
  return [$ids, $no_rooms];
}
$result = showNoKamar();

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
      padding: 50px 20%;
    }

    img {
      width: 100%;
    }

    p {
      font-size: 18px;
      line-height: 2rem;
      color: #ffffff;
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

    /* .shop-container {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      margin-top: 2rem;
    }

    .shop-container .box {
      flex: 1 1 10rem;
      background: #1e3a8a;
      width: 50px;
      padding: 40px;
      display: flex;
      flex-direction: column;
      text-align: center;
      align-items: center;
      margin-top: 1rem;
      border-radius: 0.5rem;
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

    .box .tombol {
      border: 2px solid whitesmoke;
      color: #ffffff;
    }

    .box .tombol:hover {
      background: #637dc5;
      color: #fff;
      scale: 110%;
    }

    fieldset {
      display: block;
    }

    fieldset>option {
      width: 30px;
    } */

    /* Style umum untuk container */
    .shop-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: transparent;
      margin-top: 7rem;
    }

    /* Box untuk form */
    .box {
      background-color: #1e3a8a;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      width: 90%;
      font-family: Arial, sans-serif;
    }

    /* Heading atau judul form */
    .box p {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    /* Style untuk label */
    label {
      display: block;
      font-size: 14px;
      margin-bottom: 6px;
      color: #ffffff;
    }

    /* Style untuk input field */
    input[type="text"],
    input[type="date"],
    input[type="tel"],
    select,
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 14px;
      background-color: #fafafa;
      color: #333;
    }

    input[type="text"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
      border-color: #3498db;
      outline: none;
    }

    /* Style untuk textarea */
    textarea {
      resize: vertical;
    }

    /* Style untuk fieldset */
    fieldset {
      border: none;
      padding: 0;
      margin-bottom: 15px;
    }

    /* Style untuk button */
    .tombol {
      padding: 7px 16px;
      border: 2px solid var(--second-color);
      border-radius: 40px;
      background-color: transparent;
      color: #1e3a8a;
      font-weight: 500;
      width: 100%;
      transition: 100ms;
      cursor: pointer;
    }

    .tombol:hover {
      color: #362e2e;
      background: var(--second-color);
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

    /* Range time layout */
    .rangeTime {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    .rangeTime label {
      font-size: 14px;
      color: #ffffff;
      font-weight: bold;
      text-align: center;
      text-transform: capitalize;
    }

    .rangeTime>.check {
      flex-direction: column;
    }

    /* Responsive */
    @media screen and (max-width: 480px) {
      .box {
        width: 90%;
        padding: 20px;
      }
    }
  </style>

  <script>
    function reloadWindow() {
      let count = sessionStorage.getItem("reloadCount") || 0;

      if (count < 2) {
        sessionStorage.setItem("reloadCount", ++count);
        setTimeout(() => {
          window.location.reload();
        }, 500); // Refresh kedua setelah 3 detik
      } else {
        sessionStorage.removeItem("reloadCount");
      }
    }

    reloadWindow();
  </script>

</head>

<body>
  <section class="info" id="info">
    <div class="heading">
      <h1>Form Pesanan</h1>
    </div>
    <div class="shop-container">
      <div class="box">
        <form action="proses_simpan_pengunjung.php" method="post">
          <!-- data pengunjung -->
          <p style="text-align: center;">Isi Data Diri Anda!</p>
          <p>
            <label for="">Nama:</label>
            <input type="text" name="nama" autocomplete="off"><br>

            <label for="">Alamat</label>
            <input type="text" name="alamat" autocomplete="off"><br>

            <label for="">No tlp:</label>
            <input type="tel" name="no_tlp" autocomplete="off"><br>
          </p>

          <hr>
          <!-- pesan kamar -->
          <p style="text-align: center;">Pesan Kamar</p>
          <fieldset>
            <select name="no_kamar" id="nk">
              <option value="" selected disabled hidden>Pilih No Kamar</option>
              <?php foreach ($result[0] as $key => $value) : ?>
                <option value="<?php echo $value; ?>">
                  <?php echo $result[1][$key]; ?>
                </option>
              <?php endforeach; ?>
            </select>
          </fieldset>

          <div class="rangeTime">
            <div class="check">
              <label for="in">check in</label>
              <input type="datetime-local" name="check_in" id="in">
            </div>
            <div class="check">
              <label for="out">check out</label>
              <input type="datetime-local" name="check_out" id="out">
            </div>
          </div>

          <label for="note">Catatan</label>
          <textarea name="note" id="note" cols="60" rows="2"></textarea><br>

          <button type="submit" name="submit" class="tombol">Kirim</button>
        </form>
      </div>
    </div>

<footer>

  <p>Formulir Pendaftaran Tamu Hotel ini digunakan untuk mencatat informasi penting terkait reservasi dan identitas tamu selama menginap. Formulir ini mencakup data pribadi seperti nama lengkap, nomor identitas (KTP/Paspor), alamat, nomor telepon, serta informasi terkait pemesanan kamar, seperti tipe kamar, durasi menginap, metode pembayaran, dan permintaan khusus</p>
  <p>Dengan mengisi formulir ini, tamu menyetujui syarat dan ketentuan hotel terkait kebijakan check-in, check-out, serta fasilitas yang disediakan. Semua informasi yang diberikan akan dijaga kerahasiaannya sesuai dengan kebijakan privasi hotel.</p>
</footer>

</body>

</html>
