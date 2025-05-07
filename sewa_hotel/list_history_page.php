<?php
session_start();
include '../connect/conn.php';
if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
}
$email = $_SESSION['email'];
$arrQry = [
    $dbConnect->query("SELECT MAX(id_pemesanan) AS id_order FROM tb_pemesanan o INNER JOIN users ON o.fk_users = users.userId WHERE users.email = '$email'"),
    $dbConnect->query("SELECT MAX(id_pengunjung) AS id_visitor FROM tb_pengunjung v INNER JOIN users ON v.fk_users = users.userId WHERE users.email = '$email'"),
    $dbConnect->query("SELECT userId FROM users WHERE email = '$email'"),
];
if ($arrQry[0]->field_count === 0) {
    echo "<b> maaf anda belum mempunyai riwayat pemesanan kamar, silahkan pesan dahulu </b>";
    exit;
};

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

$qry = $dbConnect->query("SELECT COUNT(fk_orders) AS fk_orders, COUNT(fk_visitors) AS fk_visitors FROM list_history_order WHERE fk_orders = $id[0] && fk_visitors = $id[1]");
$idKey = [];
while ($forKey = $qry->fetch_assoc()) {
    $idKey[] = $forKey['fk_orders'];
    $idKey[] = $forKey['fk_visitors'];
}
// var_dump($idKey);

if ($idKey[0] === '0' && $idKey[1] === '0') {
    $query = $dbConnect->query("INSERT INTO list_history_order VALUES ('', $id[0], $id[1], $id[2])");
} else {
    $qry = $dbConnect->query("SELECT id_history, list_no_kamar.no_kamar, mv_type.type_kamar FROM list_history_order 
                            INNER JOIN users ON users.userId = list_history_order.fk_users 
                            INNER JOIN tb_pemesanan ON tb_pemesanan.id_pemesanan = list_history_order.fk_orders
                            INNER JOIN list_no_kamar ON list_no_kamar.id = tb_pemesanan.no_kamar
                            INNER JOIN mv_type ON mv_type.id_type = list_no_kamar.fk_type
                            WHERE users.email = '$email'");
    // foreach ($qry as $data) {
    //     $encode = json_encode($data);
    //     var_dump($encode);
    // }

    $data = [];
    while($row = $qry->fetch_assoc()) {
        $data[] = $row;
    }
    $res = json_encode($data);
    // var_dump($res);
    echo $res;
    
    exit;
}
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="start">
                <img src="../img/hotel.png" alt="">
            </div>
            <div class="center"></div>
            <div class="end"></div>
        </div>
        <ul>
            <?php while ($id = $qry->fetch_assoc()) : ?>
                <li><a href="payment_result.php?idOrder=<?= $id['id_history']; ?>" target="_blank" rel="noopener noreferrer">order room <?= $id['no_kamar'] ?> &rightarrow; <?= $id['type_kamar'] ?></a></>
                <?php endwhile; ?>
        </ul>

        <button type="button" onclick="dataOrder()" id="click">click test</button>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                // function dataOrder() {
                const xhr = new XMLHttpRequest()
                xhr.open('GET', '', true)
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

                xhr.onreadystatechange = () => {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        console.log(xhr.responseText)
                        let i = 0
                    }
                }
                xhr.send()
                // }
                // console.log(dataOrder());
            })
        </script>
    </div>
</body>

</html>