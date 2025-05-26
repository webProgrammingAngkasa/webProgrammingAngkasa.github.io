<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Masuk Akun</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body{
    background-color: #c9d6ff;
    background: linear-gradient(to right, #e2e2e2, #c6e2e9);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    height: 100vh;
}

.container{
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
    position: relative;
    overflow: hidden;
    width: 768px;
    max-width: 100%;
    min-height: 480px;
}

.container p{
    font-size: 14px;
    line-height: 20px;
    letter-spacing: 0.3px;
    margin: 20px 0;
}

.container span{
    font-size: 12px;
}

.container a{
    color: #333;
    font-size: 13px;
    text-decoration: none;
    margin: 15px 0 10px;
}

.container button{
    background-color: #1e3a8a;
    color: #fff;
    font-size: 12px;
    padding: 10px 45px;
    border: 1px solid transparent;
    border-radius: 8px;
    font-weight: 600;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    margin-top: 10px;
    cursor: pointer;
}

.container button.hidden{
    background-color: transparent;
    border-color: #fff;
}

.container form{
    background-color: #fff;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 0 40px;
    height: 100%;
    jk
}

.container input{
    background-color: #eee;
    border: none;
    margin: 8px 0;
    padding: 10px 15px;
    font-size: 13px;
    border-radius: 8px;
    width: 100%;
    outline: none;
    max-width: fit-content;
}

.form-container{
    position: absolute;
    top: 0;
    height: 100%;
    transition: all 0.6s ease-in-out;
}

.sign-in{
    left: 0;
    width: 50%;
    z-index: 2;
    /* display: flex;
    flex-direction: column; */
}

.container.active .sign-in{
    transform: translateX(100%);
}

.sign-up{
    left: 0;
    width: 50%;
    opacity: 0;
    z-index: 1;
}

.container.active .sign-up{
    transform: translateX(100%);
    opacity: 1;
    z-index: 5;
    animation: move 0.6s;
}

@keyframes move{
    0%, 49.99%{
        opacity: 0;
        z-index: 1;
    }
    50%, 100%{
        opacity: 1;
        z-index: 5;
    }
}

.social-icons{
    margin: 20px 0;
}

.social-icons a{
    border: 1px solid #ccc;
    border-radius: 20%;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    margin: 0 3px;
    width: 40px;
    height: 40px;
}    

.toggle-container{
    position: absolute;
    top: 0;
    left: 50%;
    width: 50%;
    height: 100%;
    overflow: hidden;
    transition: all 0.6s ease-in-out;
    border-radius: 100px 0 0 100px;
    z-index: 1000;
}

.container.active .toggle-container{
    transform: translateX(-100%);
    border-radius: 0 150px 100px 0;
}

.toggle{
    background-color: #1e3a8a;
    height: 100%;
    background: #1e3a8a;
    color: #fff;
    position: relative;
    left: -100%;
    height: 100%;
    width: 200%;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.container.active .toggle{
    transform: translateX(50%);
}

.toggle-panel{
    position: absolute;
    width: 50%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0 30px;
    text-align: center;
    top: 0;
    transform: translateX(0);
    transition: all 0.6s ease-in-out;
}

.toggle-left{
    transform: translateX(-200%);
}

.container.active .toggle-left{
    transform: translateX(0);
}

.toggle-right{
    right: 0;
    transform: translateX(0);
}

.container.active .toggle-right{
    transform: translateX(200%);
}

.checkboxtext
{
  /* Checkbox text */
  font-size: 10%;
  display: inline;
}
    </style>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form>
                <h1>Register</h1>
                <span>use your angkasa student card details for registration</span>
                <input type="text" placeholder="Name">
                <input type="email" placeholder="Email">
                <input type="password" placeholder="Password">
                <button>Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Login</h1>
                <span>Hi Skyers, Welcome Back!</span>
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck">
                    <label class="custom-control-label" for="customCheck" style="user-select: none;">Remember Me</label>
                </div>
                <a href="#">Forget Your Password?</a><br>
                <button>Login</button>
            </form>
        </div>
    </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your angkasa details to login to your account</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hi, Skyers!</h1>
                    <p>Register with your angkasa email and password</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <style>
        * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    :root {
      --main-color: #ffffff;
      --second-color: #ffffff;
      --bg-global-color: #1e3a8a;
      --bg-button-hover: #637dc5;
    }

    section {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      min-height: 100vh;
      background: transparent;
      box-shadow: 0px 25px 20px -20px rgba(0, 0, 0, 0.45) inset;
    }

    .title {
      display: flex;
      flex-direction: row;
      font-size: 2rem;
      text-transform: uppercase;
      text-align: center;
      margin-block: 20px;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    .title h1 {
      color: transparent;
      animation: title 1.5s forwards;
    }

    .title h1:nth-child(5),
    h1:nth-child(7) {
      animation-delay: 0s;
    }

    .title h1:nth-child(4),
    h1:nth-child(8) {
      animation-delay: .2s;
    }

    .title h1:nth-child(3),
    h1:nth-child(9) {
      animation-delay: .4s;
    }

    .title h1:nth-child(2),
    h1:nth-child(10) {
      animation-delay: .6s;
    }

    .title h1:nth-child(1),
    h1:nth-child(11) {
      animation-delay: .8s;
    }

    @keyframes title {
      100% {
        color: var(--bg-global-color);
      }
    }

    h3 {
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: x-large;
      line-height: 2rem;
      color: #ffffff;
      text-align: center;
      text-transform: capitalize;
      margin-block: 8px;
      animation: h3 2s forwards;
    }

    @keyframes h3 {
      0% {
        color: transparent;
      }
    }

    .container {
      max-width: 55%;
      width: 100%;
      background: linear-gradient(160deg, rgb(2, 28, 122) 0.00%, rgb(36, 83, 255) 100.00%);
      padding: 2.5%;
      border-radius: 15px;
      box-shadow: 0 0px 8px rgba(0, 0, 0, 0);
    }

    label {
      display: block;
      font-size: 15px;
      margin-bottom: 6px;
      color: #ffffff;
      font-weight: bold;
      letter-spacing: .5px;
      animation: label 2s forwards;
      font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

    @keyframes label {
      0% {
        color: transparent
      }
    }

    input[type="email"],
    input[type="tel"],
    input[type="date"],
    select,
    textarea {
      display: flex;
      justify-content: center;
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 4px;
      font-size: 14px;
      background-color: #fafafa;
      color: #333;
      border: none;
      border: 2px solid var(--bg-global-color);
      animation: input 2s forwards;
    }

    @keyframes input {
      0% {
        outline: none;
        background: transparent;
      }
    }

    input[type="email"]:focus,
    input[type="tel"]:focus,
    input[type="date"]:focus,
    select:focus,
    textarea:focus {
      border: 2px solid #ccc;
      outline: none;
    }

    textarea {
      resize: vertical;
    }

    .container .tombol {
      padding: 7px 16px;
      border-radius: 40px;
      border: 2px solid whitesmoke;
      background-color: var(--bg-global-color);
      color: #ffffff;
      font-weight: 500;
      width: 100%;
      transition: 100ms;
      cursor: pointer;
      font-weight: 800;
      animation: button 2.5s forwards;
      transition: .2s;
    }

    .container .tombol:hover {
      background: var(--bg-button-hover);
      color: var(--second-color);
      letter-spacing: 1px;
      font-weight: 900;
    }

    @keyframes button {
      0% {
        background: transparent;
        color: transparent;
        border-color: transparent;
      }
    }

    .input-room {
      display: flex;
      justify-content: space-around;
      flex-direction: row;
      margin-block: 5px;
      margin-top: 15px;
      margin-bottom: 10px;
    }

    .input-room button:nth-child(1),
    .input-room button:nth-child(2) {
      width: 120px;
      height: 45px;
      border-top-right-radius: 50%;
      border-bottom-left-radius: 50%;
      border-top-left-radius: 5px;
      border-bottom-right-radius: 5px;
      background: blueviolet;
      color: #fafafa;
      font-weight: bold;
      border: none;
      cursor: pointer;
      transition: 200ms;
      animation: checked 1s forwards;
    }

    .input-room button:nth-child(3),
    .input-room button:nth-child(4) {
      width: 120px;
      height: 45px;
      border-top-left-radius: 50%;
      border-bottom-right-radius: 50%;
      border-top-right-radius: 5px;
      border-bottom-left-radius: 5px;
      background: blueviolet;
      color: #fafafa;
      font-weight: bold;
      border: none;
      cursor: pointer;
      transition: 200ms;
      animation: checked 1s forwards;
    }

    .input-room button:hover {
      background: var(--bg-button-hover);
      color: white;
      letter-spacing: .5px;
      scale: 110%;
    }
    </style>
</head>
<body>
            <div class="input-user">
              <h3>Masukan Email anda</h3>

              <label for="email">Email:</label>
              <input type="email" name="email" id="email" autocomplete="on" required><br>

            </div>

              <button type="submit" name="submit" class="tombol">LOGIN</button>
            </div>
          </form>
        </div>
      </div>
  </div>
  </div>
    <form method="POST" action="send_otp.php">
        <label for="email">Email</label>
        <input type="email" id="email" name="email"><br><br>
        <button type="submit">lanjutkan dengan email</button>
        <h1>tes</h1>
        <H2>ASSALAMUALAIKUM</H2>
    </form>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    *,
    html,
    body {
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background: rgb(142, 159, 228);
    }

    .container {
      width: 50vw;
      height: 60vh;
      display: grid;
      grid-template-columns: 100%;
      grid-template-areas: "login";
      box-shadow: 0 0 17px 10px rgb(0 0 0 / 30%);
      border-radius: 20px;
      background: white;
      overflow: hidden;
    }

    .design {
      grid-area: design;
      display: none;
      position: relative;
    }

    .rotate-45 {
      transform: rotate(-45deg);
    }

    .design .pill-1 {
      bottom: 0;
      left: -40px;
      position: absolute;
      width: 80px;
      height: 200px;
      background: #1e3a8a;
      border-radius: 40px;
    }

    .design .pill-2 {
      top: -100px;
      left: -80px;
      position: absolute;
      height: 450px;
      width: 220px;
      background: #1e3a8a;
      border-radius: 200px;
      border: 30px solid rgb(142, 159, 228);
    }

    .design .pill-3 {
      top: -100px;
      left: 160px;
      position: absolute;
      height: 200px;
      width: 100px;
      background: #1e3a8a;
      border-radius: 70px;
    }

    .design .pill-4 {
      bottom: -180px;
      left: 220px;
      position: absolute;
      height: 300px;
      width: 120px;
      background: #1e3a8a;
      border-radius: 70px;
    }

    .design .pill-4 {
      bottom: -180px;
      left: 220px;
      position: absolute;
      height: 300px;
      width: 120px;
      background: rgb(58, 91, 181);
      border-radius: 70px;
    }

    .login {
      grid-area: login;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      position: relative;
      background: white;
    }

    .login h3.title {
      margin: 15px 0;
    }

    .text-input {
      background: #e6e6e6;
      height: 40px;
      display: flex;
      width: 60%;
      align-items: center;
      border-radius: 10px;
      padding: 0 15px;
      margin: 5px 0;
    }

    .text-input input {
      background: none;
      border: none;
      outline: none;
      width: 100%;
      height: 100%;
      margin-left: 10px;
    }

    .text-input i {
      color: #686868;
    }

    ::placeholder {
      color: #9a9a9a;
    }

    .login-btn {
      width: 68%;
      padding: 10px;
      color: white;
      background: rgb(78, 105, 180);
      border: none;
      border-radius: 20px;
      cursor: pointer;
      margin-top: 10px;
    }

    .login-btn:hover {
      background: rgb(33, 66, 155);
    }

    a {
      font-size: 12px;
      color: #9a9a9a;
      cursor: pointer;
      user-select: none;
      text-decoration: none;
    }

    a.forgot {
      margin-top: 15px;
    }

    .create {
      display: flex;
      align-items: center;
      position: absolute;
      bottom: 30px;
    }

    .create i {
      color: #9a9a9a;
      margin-left: 10px;
    }

    @media (min-width: 768px) {
      .container {
        grid-template-columns: 50% 50%;
        grid-template-areas: "design login";
      }

      .design {
        display: block;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="design">
      <div class="pill-1 rotate-45"></div>
      <div class="pill-2 rotate-45"></div>
      <div class="pill-3 rotate-45"></div>
      <div class="pill-4 rotate-45"></div>
    </div>
    <div class="login">
      <form method="POST" action="send_otp.php">
        <h3 class="title">Masukan Email</h3>
        <div class="text-input">
          <i class="ri-user-fill"></i>
          <input type="email" name="email" placeholder="Email" required>
        </div>
        <button class="login-btn" type="submit" onclick="oneClick()">Verifikasi</button>
      </form>
    </div>
  </div>
  <script>
    function oneClick() {
      const buttonSend = document.querySelector(".login-btn")
      setTimeout(() => {
        buttonSend.style.cursor = "no-drop"
        buttonSend.disabled = true
      }, 0.1)

    }
  </script>
</body>

</html>