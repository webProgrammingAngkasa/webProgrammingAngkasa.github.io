<?php
session_start();
include 'main.php';
include '../connect/conn.php';
$hotel = new Hotel('localhost', 'root', '', 'sewa_hotel');

$dataPengunjung = [
    //? pengunjung
    'nama' => $_POST['nama'],
    'alamat' => $_POST['alamat'],
    'no_tlp' => $_POST['no_tlp']
];

$dataPemesanan = [
    //? pemesanan
    'no_kamar' => $_POST['no_kamar'],
    'check_in' => $_POST['check_in'],
    'check_out' => $_POST['check_out'],
];

if (
    !empty($dataPengunjung['nama']) &&
    !empty($dataPengunjung['alamat']) &&
    !empty($dataPengunjung['no_tlp']) &&
    !empty($dataPemesanan['no_kamar']) &&
    !empty($dataPemesanan['check_in']) &&
    !empty($dataPemesanan['check_out'])
) {
    if ($hotel->dataPemesanan($dataPemesanan) && ($hotel->dataPengunjung($dataPengunjung)) && ($hotel->updateNoRoom($dataPemesanan))) {
        echo '
            <script> 
                alert("data berhasil ditambahkan..."); 
                document.location.href = "list_history_page.php";
                </script>
                ';
    }
} else {
    echo '
    <script> 
        alert("Mohon pilih kamar."); 
        document.location.href = "form_pesanan.php";
    </script>
';
}
