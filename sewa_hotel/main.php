<?php

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
        $query = ("INSERT INTO tb_pengunjung (nama, alamat, no_tlp) VALUES (?, ?, ?)");
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "sss",
            $data['nama'],
            $data['alamat'],
            $data['no_tlp']
        );
        return $stmt->execute();
    }

    public function dataPemesanan($data): string
    {
        $in = $data['check_in'];
        $out = $data['check_out'];
        $dateTime_in = "$in 14:00:00";
        $dateTime_out = "$out 12:00:00";
        $query = ("INSERT INTO tb_pemesanan (
                                        no_kamar, 
                                            check_in, 
                                                check_out,
                                                    note)
                                        VALUES (?, ?, ?, ?)");
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "isss",
            $data['no_kamar'],
            $dateTime_in,
            $dateTime_out,
            $data['note']
        );
        return $stmt->execute();
    }
}
