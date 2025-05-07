<?php
session_start();
include '../connect/conn.php';
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit;
}

$email = $_SESSION['email'];
$arrQry = [
    $dbConnect->query("SELECT MAX(id_pemesanan) AS id_order FROM tb_pemesanan o INNER JOIN users ON o.fk_users = users.userId WHERE users.email = '$email'"),
    $dbConnect->query("SELECT MAX(id_pengunjung) AS id_visitor FROM tb_pengunjung v INNER JOIN users ON v.fk_users = users.userId WHERE users.email = '$email'"),
    $dbConnect->query("SELECT userId FROM users WHERE email = '$email'")
];

if ($arrQry[0]->field_count === 0) {
    echo "<b>Maaf, Anda belum memiliki riwayat pemesanan kamar. Silakan lakukan pemesanan terlebih dahulu.</b>";
    exit;
}

$dataId = [
    $arrQry[0]->fetch_assoc(),
    $arrQry[1]->fetch_assoc(),
    $arrQry[2]->fetch_assoc()
];

$id = [
    (int) $dataId[0]['id_order'],
    (int) $dataId[1]['id_visitor'],
    (int) $dataId[2]['userId']
];

$qryCheck = $dbConnect->query("SELECT COUNT(fk_orders) AS fk_orders, COUNT(fk_visitors) AS fk_visitors FROM list_history_order WHERE fk_orders = $id[0] AND fk_visitors = $id[1]");
$idKey = $qryCheck->fetch_assoc();

if ($idKey['fk_orders'] == 0 && $idKey['fk_visitors'] == 0) {
    $dbConnect->query("INSERT INTO list_history_order VALUES ('', $id[0], $id[1], $id[2])");
}

$qry = $dbConnect->query("SELECT id_history, list_no_kamar.no_kamar, mv_type.type_kamar, tb_pemesanan.check_in, tb_pemesanan.check_out 
    FROM list_history_order 
    INNER JOIN users ON users.userId = list_history_order.fk_users 
    INNER JOIN tb_pemesanan ON tb_pemesanan.id_pemesanan = list_history_order.fk_orders
    INNER JOIN list_no_kamar ON list_no_kamar.id = tb_pemesanan.no_kamar
    INNER JOIN mv_type ON mv_type.id_type = list_no_kamar.fk_type
    WHERE users.email = '$email'
    ORDER BY id_history DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pemesanan</title>
    <style>
        :root {
            --primary: #1e3a8a;
            --accent: #4f46e5;
            --bg: #f8f9fc;
            --text: #2d3748;
            --card-bg: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            padding: 20px;
        }

        .container {
            max-width: 960px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: var(--primary);
            margin-bottom: 40px;
            font-size: 2.2em;
        }

        .history-card {
            background-color: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            padding: 24px;
            transition: all 0.3s ease;
        }

        .history-card:hover {
            transform: scale(1.01);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
        }

        .room-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--accent);
            margin-bottom: 12px;
        }

        .history-details {
            font-size: 14px;
            line-height: 1.6;
        }

        .history-details span {
            font-weight: 500;
        }

        .btn-detail {
            display: inline-block;
            margin-top: 20px;
            background-color: var(--primary);
            color: #fff;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .btn-detail:hover {
            background-color: #0f2566;
        }

        @media (max-width: 600px) {
            .history-card {
                padding: 16px;
            }

            h1 {
                font-size: 1.6em;
            }

            .btn-detail {
                padding: 8px 14px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Riwayat Pemesanan</h1>

        <?php if ($qry->num_rows > 0): ?>
            <?php while ($row = $qry->fetch_assoc()): ?>
                <div class="history-card">
                    <div class="room-title">Kamar <?= $row['no_kamar'] ?> - <?= $row['type_kamar'] ?></div>
                    <div class="history-details">
                        <p><span>Check-in:</span> <?= $row['check_in'] ?></p>
                        <p><span>Check-out:</span> <?= $row['check_out'] ?></p>
                    </div>
                    <a class="btn-detail" href="payment_result.php?idOrder=<?= $row['id_history']; ?>" target="_blank" rel="noopener noreferrer">
                        Lihat Detail
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p style="text-align: center; font-size: 16px;">Belum ada riwayat pemesanan yang ditemukan.</p>
        <?php endif; ?>
    </div>
</body>
</html>
