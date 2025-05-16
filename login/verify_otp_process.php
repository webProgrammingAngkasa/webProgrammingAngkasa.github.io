<?php
session_start();
include '../connect/conn.php';
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['email'])) {
        echo "<script>
        alert('Silakan masukkan email terlebih dahulu');
        window.location.href = 'index.php'
        </script>";
        exit;
    }

    $email = $_SESSION['email'];
    $otp = implode('', $_POST['otp']); // Gabungkan array jadi satu string

    $stmt = $dbConnect->prepare('SELECT u.otp, u.otp_expiry FROM users u WHERE u.email = ? AND u.userId IN (SELECT MAX(userId) FROM users GROUP BY email)');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        if (strtotime($user['otp_expiry']) <= time()) {
            echo "<script>
                alert('Kode OTP telah kadaluarsa! Silakan minta lagi');
                window.location.href = 'verify_otp.php'
            </script>";
            exit;
        } elseif ($user['otp'] === $otp) {
            echo "<script>
                alert('Login berhasil');
                window.location.href = '../index.php'
            </script>";
        } else {
            echo "<script>
                alert('Kode OTP salah! Silakan coba lagi');
                window.location.href = 'verify_otp.php'
            </script>";
        }
    } else {
        echo "<script>
            alert('Email tidak ditemukan! Silakan daftar terlebih dahulu');
            window.location.href = 'index.php'
        </script>";
    }
}
