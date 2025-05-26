<?php
session_start();
include '../connect/conn.php';

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}
$idOrder = (int) $_GET['idOrder'];
$email = $_SESSION['email'];
$queryHistory = [
    $dbConnect->query("SELECT id_pengunjung AS historyVisitor FROM list_history_order h INNER JOIN tb_pengunjung v ON v.id_pengunjung = h.fk_visitors WHERE h.id_history = $idOrder"),
    $dbConnect->query("SELECT id_pemesanan AS historyOrder FROM list_history_order h INNER JOIN tb_pemesanan p ON p.id_pemesanan = h.fk_orders WHERE h.id_history = $idOrder")
];

$arrHistoryOrder = [];
while ($resultHistory = $queryHistory[0]->fetch_assoc()) {
    $arrHistoryOrder[] = $resultHistory;
}
while ($resultHistory = $queryHistory[1]->fetch_assoc()) {
    $arrHistoryOrder[] = $resultHistory;
}
$visitor = (int) $arrHistoryOrder[0]['historyVisitor'];
$order = (int) $arrHistoryOrder[1]['historyOrder'];

$queryResult = [
    'pengunjung' => "SELECT * FROM tb_pengunjung WHERE id_pengunjung = $visitor",
    'pesanan' => "SELECT id_pemesanan, list_no_kamar.no_kamar, mv_type.type_kamar, check_in, check_out, total_harga
                            FROM tb_pemesanan
                            INNER JOIN list_no_kamar
                            ON list_no_kamar.id = tb_pemesanan.no_kamar
                            INNER JOIN mv_type
                            on mv_type.id_type = list_no_kamar.fk_type
                            WHERE id_pemesanan = $order
                            GROUP BY no_kamar",
    'rangeTimeOut' => "SELECT TIMESTAMPDIFF(DAY, NOW(), tb_pemesanan.check_out) AS hari,
                            HOUR(TIMEDIFF(tb_pemesanan.check_out, NOW())) % 24 AS jam,
                            MINUTE(TIMEDIFF(tb_pemesanan.check_out, NOW())) AS menit,
                            SECOND(TIMEDIFF(tb_pemesanan.check_out, NOW())) AS detik
                            FROM tb_pemesanan
                            WHERE tb_pemesanan.id_pemesanan = $order",
];

$results = [
    $dbConnect->query($queryResult['pengunjung']),
    $dbConnect->query($queryResult['pesanan']),
    $dbConnect->query($queryResult['rangeTimeOut']),
];

$rows = [
    mysqli_fetch_assoc($results[0]),
    $results[1]->fetch_assoc(),
    mysqli_fetch_assoc($results[2])
];

$parseInt = [
    'hari' => (int)($rows[2]['hari']),
    'jam' => (int)($rows[2]['jam']),
    'menit' => (int)($rows[2]['menit']),
    'detik' => (int)($rows[2]['detik'])
];

$now = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$dateArray = ['date' => $now->format('Y-m-d H:i:s')];
$date = json_encode($dateArray['date']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Transaksi</title>
    <style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
        body {
            background: #1e3a8a;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            padding: 30px;
        }

        .receipt {
            background: #fff;
            /* border: 1px dashed #333; */
            width: 320px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .receipt h1 {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .receipt hr {
            border: none;
            border-top: 1px dashed #999;
            margin: 10px 0;
        }

        .receipt p {
            margin: 5px 0;
            display: flex;
            justify-content: space-between;
        }

        .receipt p span:first-child {
            font-weight: bold;
        }

        .receipt-footer {
            text-align: center;
            font-size: 0.8em;
            margin-top: 20px;
            color: #777;
        }

        #endPointCheckOut {
            font-weight: bold;
            color: #e74c3c;
        }

        a.button {
            display: inline-block;
            text-align: center;
            background: #1e3a8a;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
            width: 90%;
        }

        a.button:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>STRUK PEMESANAN</h1>
        <hr>
        <p><span>Nama</span><span><?= $rows[0]['nama'] ?></span></p>
        <p><span>Alamat</span><span><?= $rows[0]['alamat'] ?></span></p>
        <hr>
        <p><span>Kamar</span><span><?= $rows[1]['no_kamar'] ?> - <?= $rows[1]['type_kamar'] ?></span></p>
        <p><span>Check-in</span><span><?= $rows[1]['check_in'] ?></span></p>
        <p><span>Check-out</span><span><?= $rows[1]['check_out'] ?></span></p>
        <p><span>Sisa waktu</span><span id="endPointCheckOut"><?= $rows[2]['hari'] ?>h <?= $rows[2]['jam'] ?>j <?= $rows[2]['menit'] ?>m <?= $rows[2]['detik'] ?>d</span></p>
        <hr>
        <p><span>Total</span><span>Rp <?= number_format((int)$rows[1]['total_harga'], 0, ',', '.') ?></span></p>
        <hr>
        <div class="receipt-footer">
            Dicetak pada:<br><?= $now->format('d-m-Y H:i:s') ?><br>
            Terima kasih telah memesan!
        </div>
        <a href="form_pesanan.php" target="_self" class="button">Buat Pemesanan Baru</a>
    </div>

    <script>
        function updateCountdown(targetTime) {
            let countdownElement = document.getElementById('endPointCheckOut');

            let interval = setInterval(function() {
                let now = Math.floor(Date.now() / 1000);
                let remainingTime = targetTime - now;

                if (remainingTime <= 0) {
                    clearInterval(interval);
                    alert('Waktu Check Out Telah Tiba!');
                    countdownElement.innerHTML = 'Selesai';
                    localStorage.removeItem("checkoutTimestamp");
                } else {
                    let hari = Math.floor(remainingTime / 86400);
                    let jam = Math.floor((remainingTime % 86400) / 3600);
                    let menit = Math.floor((remainingTime % 3600) / 60);
                    let detik = remainingTime % 60;

                    countdownElement.innerHTML = `${hari}h ${jam}j ${menit}m ${detik}d`;
                }
            }, 1000);
        }

        window.onload = function() {
            let phpCheckoutTimestamp = Math.floor(new Date("<?= $rows[1]['check_out'] ?>").getTime() / 1000);
            let storedTimestamp = localStorage.getItem("checkoutTimestamp");

            if (!storedTimestamp || parseInt(storedTimestamp) !== phpCheckoutTimestamp) {
                localStorage.setItem("checkoutTimestamp", phpCheckoutTimestamp);
                storedTimestamp = phpCheckoutTimestamp;
            } else {
                storedTimestamp = parseInt(storedTimestamp);
            }

            updateCountdown(storedTimestamp);
        };
    </script>
</body>
</html>
