<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

include "../connect/conn.php";

date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $qry = $dbConnect->query("SELECT email FROM users WHERE email = '$email'");
    $dataEmail = [];
    while ($res = $qry->fetch_assoc()) {
        $dataEmail[] = $res['email'];
    }

    $otp = rand(100000, 999999);
    $otp_expiry = date("Y-m-d H:i:s", strtotime("+2 minutes"));

    $mail = new PHPMailer(true);

    if ($dataEmail !== []) {
        $stmt = $dbConnect->prepare("UPDATE users SET otp = ?, otp_expiry = ? WHERE email = ?");
        $stmt->bind_param("iss", $otp, $otp_expiry, $email);
        $stmt->execute();

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ramadanzaka27@gmail.com';
            $mail->Password = 'symwqddalhoiztgx';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('form@hotel599.com', 'Hotel 599');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Verifikasi Email';
            $mail->Body    = "Kode OTP Baru Anda adalah <b>$otp</b>. Berlaku selama 2 menit.";

            $mail->send();
            echo "
            <script>
            alert('Kode OTP telah dikirim ke email Anda.'); 
            document.location.href = 'verify_otp.php';
            </script>";
        } catch (Exception $e) {
            echo "Gagal mengirim email. Error: {$mail->ErrorInfo}";
            echo "<br>";
            echo "<i style='letter-spacing: 1px;'> kemungkinan email atau password salah! </i>";
        }

        echo "
            <script>
            alert('Kode OTP telah dikirim ke email Anda.'); 
            document.location.href = 'verify_otp.php';
            </script>";
    } else {
        $stmt = $dbConnect->prepare("INSERT INTO users (email, otp, otp_expiry) VALUES (?, ?, ?) 
            ON DUPLICATE KEY UPDATE otp = ?, otp_expiry = ?");
        $stmt->bind_param("sssss", $email, $otp, $otp_expiry, $otp, $otp_expiry);
        $stmt->execute();

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ramadanzaka27@gmail.com';
            $mail->Password = 'symwqddalhoiztgx';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('form@hotel599.com', 'Hotel 599');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Verifikasi Email';
            $mail->Body    = "Kode OTP Anda adalah <b>$otp</b>. Berlaku selama 2 menit.";

            $mail->send();
            echo "
            <script>
            alert('Kode OTP telah dikirim ke email Anda.'); 
            document.location.href = 'verify_otp.php';
            </script>";
        } catch (Exception $e) {
            echo "Gagal mengirim email. Error: {$mail->ErrorInfo}";
            echo "<br>";
            echo "<i style='letter-spacing: 1px;'> kemungkinan email atau password salah! </i>";
        }
    }
    $dbConnect->close();
} else {
    echo "Metode request tidak diperbolehkan.";
}
