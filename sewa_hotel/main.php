<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../connect/conn.php';
class Hotel
{
    private $conn;
    public function __construct($localhost, $username, $password, $database)
    { {
            global $dbConnect;
            $this->conn = $dbConnect;
        }
    }

    public function updateNoRoom($noRoom): int
    {
        $stmt = $this->conn->prepare("UPDATE list_no_kamar SET status = 'Booked' WHERE id = ?");
        $stmt->bind_param("i", $noRoom['no_kamar']);
        return $stmt->execute();
    }

    public function dataPengunjung($data): string
    {
        $emailUser = $_SESSION['email'];

        $idUser = $this->conn->query("SELECT userId FROM users WHERE email = '$emailUser'");
        $res = $idUser->fetch_assoc();

        $query = ("INSERT INTO tb_pengunjung (nama, alamat, no_tlp, fk_users) VALUES (?, ?, ?, ?)");
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "sssi",
            $data['nama'],
            $data['alamat'],
            $data['no_tlp'],
            $res['userId']
        );
        return $stmt->execute();
    }

    public function dataPemesanan($data): string
    {
        $in = $data['check_in'];
        $out = $data['check_out'];
        $idRoom = $data['no_kamar'];
        $emailUser = $_SESSION['email'];

        $idUser = $this->conn->query("SELECT userId FROM users WHERE email = '$emailUser'");
        $res = $idUser->fetch_assoc();

        $restArrDate = [
            new DateTime("$in 14:00:00"),
            "$in 14:00:00",
            new DateTime("$out 12:00:00"),
            "$out 12:15:00",
        ];

        $qry = $this->conn->query("SELECT typ.harga as price FROM mv_type typ INNER JOIN list_no_kamar lnk ON typ.id_type = lnk.fk_type WHERE lnk.id = $idRoom");
        $selPrice = $qry->fetch_assoc()['price'];
        function rangeDays($in, $out, $price)
        {
            $difference = $in->diff($out);
            $resRange = $difference->days + 1;
            return $resRange * $price;
        }
        $rangeDay = rangeDays($restArrDate['0'], $restArrDate['2'], $selPrice);

        $query = ("INSERT INTO tb_pemesanan (
                                        no_kamar, 
                                            check_in, 
                                                check_out,
                                                    total_harga,
                                                        fk_users)
                                        VALUES (?, ?, ?, ?, ?)");
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "isssi",
            $data['no_kamar'],
            $restArrDate[1],
            $restArrDate[3],
            $rangeDay,
            $res['userId']
        );
        return $stmt->execute();
    }
}
