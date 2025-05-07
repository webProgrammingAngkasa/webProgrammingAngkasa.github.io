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
<!-- <!DOCTYPE html>
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
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
	margin:0;
	padding:0;
	box-sizing:border-box;
}
body {
	background:#1e3a8a;
	font-family:"Poppins",sans-serif;
	display:grid;
	place-items:center;
	min-height:100vh;
}
.otp-box {
	background:#fff;
	width:100%;
	max-width:400px;
	padding:2em;
	border-radius:10px;
	box-shadow:0px 2px 5px 10px rgba(0,0,0,0.05);
	display:grid;
	gap:1.5em;
	text-align:center;
}
.otp-box .img {
	display:inline;
	width:100px;
	height:100px;
	margin:0 auto;
    align-items: center;
    margin-left: 70px;
    margin-bottom: 20px;
}
.otp-box .content-box h2 {
	font-size:20px;
	color:#111;
	margin-bottom:5px;
}
.otp-box .content-box p {
	color:#555;
	font-size:14px;
}
.otp-box .inputs {
	display:flex;
	justify-content:space-between;
	max-width:320px;
	margin:0 auto;
	gap:0.5em;
}
.otp-box .inputs input {
	width:40px;
	height:40px;
	border:1px solid #bbb;
	border-radius:8px;
	font-size:20px;
	text-align:center;
	color:#111;
	caret-color:transparent
}
.otp-box button {
	width:100%;
	height:40px;
	background:#1e3a8a;
	color:#fff;
	font-size:15px;
	border:none;
	outline:none;
	border-radius:8px;
	cursor:pointer;
    margin-top: 20px;
}
.otp-box button:disabled {
	opacity:0.5;
	pointer-events:none;
	cursor:initial;
}
    </style>
</head>
<body>
<div class="otp-box">
	<div class="img">
		<img src="otp.png" width="200px" alt="Otp image">
	</div>
	<div class="content-box">
		<h2>Verification code</h2>
		<p>Kami telah megirim kode OTP ke Email :</i> <b><?= $_SESSION['email'];?></p>
	</div>
    <form action="verify_otp_process.php" method="POST">
	<div class="inputs">
		<input type="text" name="otp" maxlength="1"/>
		<input type="text" name="otp" maxlength="1"/>
		<input type="text" name="otp" maxlength="1"/>
		<input type="text" name="otp" maxlength="1"/>
		<input type="text" name="otp" maxlength="1"/>
		<input type="text" name="otp" maxlength="1"/>
	</div>
	<div class="verify-btn">
		<button type="submit">Verifikasi</button>
	</div>
    </form>
</div>
</body>
<script>
    const inputs = [...document.querySelectorAll(".otp-box input")];
const submitBtn = document.querySelector(".otp-box button");

function verifyDisabledBtn(){
	setTimeout(()=>{
			const isDisabledBtn = inputs.some(e => e.value.length !== 1);
			submitBtn.disabled = isDisabledBtn;
		}, 0);
}

inputs.forEach((input, index) => {
	input.addEventListener("blur", verifyDisabledBtn);
	
	input.addEventListener("keyup", (e) => {
		if(!(e.keyCode >= 48 && e.keyCode <= 57)){
			e.target.value = "";
			return;
		}
		
		e.target.value = String.fromCharCode(e.keyCode);
		
		if(index < (inputs.length - 1)){
			inputs[index+1].focus();
		}
		
		verifyDisabledBtn();
	});
});
</script>
</html>
