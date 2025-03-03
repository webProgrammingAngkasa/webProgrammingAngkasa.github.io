<?php
session_start();
if(!isset($_SESSION["email"])){
    echo "
    <script>
        alert('silahkan masukkan email terlebih dahulu');
        window.location.href = 'index.php'
    </script>
    ";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
</head>
<body>
    <p><i>Kami telah megirim kode OTP ke Email :</i> <b><?= $_SESSION['email'];?></b></p>
    <form method="POST" action="verify_otp_process.php">
        <label>Masukkan OTP:</label>
        <input type="text" name="otp" required>
        <button><a href="destroySession.php">Masukkan Ulang Email</a></button>
        <button type="submit">Verifikasi</button>
    </form>
    
    <form action="send_otp.php" method="POST">
        <button type="submit" name="email" value="<?= $_SESSION['email']?>">Kode OTP Baru</button>
    </form>
</body>
</html>
