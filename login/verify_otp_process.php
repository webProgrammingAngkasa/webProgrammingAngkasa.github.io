<?php
session_start();
include '../connect/conn.php';
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['email'])) {
        echo "<script>
        alert('silahkan masukkan email terlebih dahuluasdasdasd');
        window.location.href = 'index.php'
        </script>";
    }
    $_SESSION['otp'] = $_POST['otp'];
    $email = $_SESSION['email'];

    $stmt = $dbConnect->prepare('SELECT u.otp, u.otp_expiry FROM users u WHERE u.email = ? AND u.uid IN (SELECT MAX(uid) FROM users GROUP BY email)');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if (strtotime($user['otp_expiry']) <= time()) {
            echo "<script>
                alert('Kode OTP telah kadaluarsa! silahkan minta lagi');
                window.location.href = 'verify_otp.php'
            </script>";
            exit;
        } elseif ($user['otp'] === $_SESSION['otp']) {
            echo "<script>
                alert('Login Berhasil');
                window.location.href = '../index.php'
            </script>";
        } else {
            echo "<script>
                alert('Kode OTP salah! silahkan coba lagi');
                window.location.href = 'verify_otp.php'
            </script>";
        }
    } else {
        echo "<script>
            alert('Email tidak ditemukan! silahkan daftar email terlebih dahulu');
            window.location.href = 'index.php'
        </script>";
    }
}
