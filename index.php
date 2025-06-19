<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>title of name</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cute+Font&family=Rubik+Glitch&family=Rubik+Microbe&display=swap" rel="stylesheet">

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      function dynamicNavbar() {
        let buttonOut = document.getElementById("button-logout"),
          userIcon = document.getElementById("user-icon"),
          buttonLog = document.getElementById("button-login"),
          historyOrder = document.querySelectorAll(".navbar li:nth-of-type(4)"),
          email = "<?php echo $_SESSION['email'] ?? ''; ?>"

        if (email === '') {
          buttonLog.style.display = "flex"
          buttonOut.style.display = "none"
          userIcon.style.display = "none"
          observers.viewPort1.sideNavBar.navToggle[2].style.display = "flex"
          historyOrder.forEach(history => history.style.display = "none");
        } else {
          buttonLog.style.display = "none"
          buttonOut.style.display = "flex"
          userIcon.style.display = "flex"
          observers.viewPort1.sideNavBar.navToggle[2].style.display = "flex"
          historyOrder.forEach(history => history.style.opacity = "1");
        }
      }
      dynamicNavbar()

    })
  </script>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
      scroll-padding-top: 4.4rem;
      scroll-behavior: smooth;
      text-decoration: none;
      list-style: none;
      font-size: 18px;
      scroll-padding-top: 0;
    }

    body::-webkit-scrollbar {
      overflow-x: hidden;
      display: none;
    }

    :root {
      interpolate-size: allow-keywords;
      --main-color: #ffffff;
      --second-color: #ffffff;
      --third-color: #1e3a8a;
      --span-color: rgb(79, 103, 158);
    }

    /* VIEWPORT 1 */
    .global-container-page {
      max-width: 100%;
      width: 100%;

    }

    section {
      margin: 0;
      padding: 0px 10%;
      padding-top: 50px;
    }

    img {
      width: 100%;
    }

    header {
      position: absolute;
      width: 100%;
      top: 0;
      right: 0;
      z-index: 1000;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: whitesmoke;
      box-shadow: 0 4px 41px rgba(14, 55, 54, 0.15);
      padding: 15px 3%;
      height: 80px;
      transform: translateY(-100px);
      transition: all 1s 100ms ease-out;

      &.active {
        transform: translateY(0px);
      }
    }

    /* ! NAV UTAMA */

    .navigation-container {
      position: fixed;
      width: 10%;
      height: 100vh;
      display: flex;
      justify-content: center;
      z-index: 100;
    }

    .navigation-tools {
      position: relative;
      background: powderblue;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      border: none;
      color: black;
      padding: 0rem;
      display: none;
      flex-direction: column;
      align-items: center;
      gap: 1rem;
      animation: navigationTools .5s forwards;
      transition: box-shadow .2s ease;
      white-space: nowrap;
      overflow: visible;

      &:hover {
        box-shadow: 0px 0px 10px 5px rgb(100, 125, 192, .5);
      }
    }

    @keyframes navigationTools {
      0% {
        transform: translateY(-100%);
        scale: 0;
        opacity: 0;
      }

      25% {
        opacity: .5;
      }

      50% {
        transform: translateY(10px);
        scale: 110%;
      }

      100% {
        transform: translateY(0);
        scale: 100%;
      }
    }


    /* NAV ICON */
    .navigation-tools .navIcon {
      position: absolute;
      width: 100%;
      height: 100%;
      font-weight: 600;
      display: flex;
      line-height: 50px;
      justify-content: center;
      align-items: center;
      font-size: 20px;
      gap: 1px;
      cursor: pointer;
    }

    .navigation-tools .navIcon .dash {
      position: relative;
      width: 55%;
      height: 55%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-around;
      transition: transform 1s linear;

      div {
        position: absolute;
        border-radius: 10px;
        transition: all .2s linear;
      }
    }

    .navigation-tools .navIcon .dash div:nth-child(1) {
      width: 50%;
      height: 2px;
      background: black;
      top: 0;
      left: 0;
      transform-origin: top left;
    }

    .navigation-tools .navIcon .dash div:nth-child(2) {
      width: 100%;
      height: 1px;
      background: rgb(0, 0, 0, .5);
      transform-origin: center
    }

    .navigation-tools .navIcon .dash div:nth-child(3) {
      width: 50%;
      height: 2px;
      background: black;
      bottom: 0;
      right: 0;
      transform-origin: bottom right;
    }

    .navigation-tools .navIcon.animateDashNav {
      .dash div {
        background-color: black;
        height: 2px;
        transition: transform .2s forwards;
      }

      .dash div:nth-child(1) {
        transform: rotate(45deg) translate(50%, -50%);
      }

      .dash div:nth-child(2) {
        transform: rotate(-45deg);
        width: 90%;
      }

      .dash div:nth-child(3) {
        transform: rotate(45deg) translate(-50%, 50%);
      }
    }

    /* NAV ISI */

    .navigation-tools .box {
      width: 100%;
      margin-top: 150%;

      span:last-child {
        font-size: 20px;
      }

      span:first-child {
        width: 100%;
        display: flex;
        justify-content: center;
      }

      a {
        overflow-x: clip;
        color: black;
        width: 100%;
        display: grid;
        align-items: center;
        justify-content: left;
        grid-template-columns: 2.7rem auto;
        padding-inline-end: .8rem;
        padding-block: .5rem;
        transition: width .5s ease-out;
        border-radius: 10px;
        background-color: powderblue;

        &:hover {
          width: max-content;
          background-color: powderblue;
        }
      }
    }

    .navigation-tools .box ul {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .navigation-tools.closeNavigationEmptyToggle {
      animation: closeNavigationEmptyToggle .3s forwards;
    }

    .navigation-tools.closeNavigationIsToggle {
      animation: closeNavigationIsToggle 1s forwards;
    }

    @keyframes closeNavigationEmptyToggle {
      0% {
        opacity: 1;
      }

      100% {
        transform: translateY(-200%);
        display: none;
      }
    }

    @keyframes closeNavigationIsToggle {
      0% {
        opacity: 1;
      }

      100% {
        opacity: 0;
        display: none;
      }
    }

    .navigation-tools .box li {
      transition: opacity .5s ease;
      opacity: 0;
      width: 100%;
    }

    .navigation-tools .box li.show {
      transition: opacity .5s ease;
      opacity: 1;
      z-index: 100;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      width: 65px;
      transform: translateX(-110px);
    }

    .navbar {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      line-height: 75px;
    }

    .navbar a {
      font-size: 1rem;
      padding: 10px 15px;
      color: #1e3a8a;
      text-transform: uppercase;
      font-weight: bold;
      transition: .3s;
      background: transparent;
      border-radius: 40px;
      letter-spacing: .8px;
    }

    .navbar a:hover {
      color: var(--main-color);
      background-color: var(--third-color);
      border-radius: 40px;
    }

    .container-login {
      display: flex;
      align-items: center;
      background: transparent;
      gap: 20px;
    }

    .container-login #button-login,
    #button-logout,
    #user-icon {
      display: none;
    }

    .container-login li:not(#user-icon) a {
      font-size: 1rem;
      padding: 8px 10px;
      text-transform: uppercase;
      font-weight: bolder;
      background: transparent;
      letter-spacing: .8px;
      border: 2px solid var(--third-color);
      border-radius: 50px;
      cursor: pointer;
      color: var(--third-color);
    }

    .container-login li:not(#user-icon) a:hover {
      background-color: var(--main-color);
    }

    .container-login li i {
      font-size: 42px;
      color: #1e3a8a;
      text-transform: uppercase;
      font-weight: bold;
      transition: .3s;
      background: transparent;
      letter-spacing: .8px;
      padding-inline: 10px;
      line-height: 80px;
    }

    .user-icon i:hover {
      color: var(--main-color);
      background: transparent;
    }

    header:has(> .container-login #user-icon i:hover) .container-login li:not(#user-icon) a {
      border: 2px solid var(--main-color);
      background: transparent;
      color: var(--main-color);
    }

    header:has(> .container-login #user-icon i:hover) .navbar .action {
      color: var(--main-color);
      font-weight: bold;
    }

    header:has(> .container-login #user-icon i:hover) {
      background: rgba(30, 58, 138, .7);
      backdrop-filter: blur(5px);
      box-shadow: none;
      z-index: 51;
    }

    .bubles {
      position: absolute;
      width: 100%;
      height: 100%;
      pointer-events: none;
    }

    .buble {
      position: absolute;
      bottom: -50px;
      background: rgba(255, 255, 255, 0.13);
      border-radius: 50%;
      animation: bubleUp linear infinite;
      z-index: 52;
    }


    @keyframes bubleUp {
      0% {
        transform: translateY(0);
        opacity: 0;
      }

      20% {
        opacity: 1;
      }

      100% {
        transform: translateY(-100vh);
        opacity: 0;
      }
    }


    .buble:nth-child(1) {
      width: 8px;
      height: 8px;
      left: 3%;
      animation-duration: 4s;
      animation-delay: 0s;
    }

    .buble:nth-child(2) {
      width: 12px;
      height: 12px;
      left: 12%;
      animation-duration: 5.5s;
      animation-delay: 1s;
    }

    .buble:nth-child(3) {
      width: 16px;
      height: 16px;
      left: 22%;
      animation-duration: 6.2s;
      animation-delay: 0.5s;
    }

    .buble:nth-child(4) {
      width: 10px;
      height: 10px;
      left: 35%;
      animation-duration: 7s;
      animation-delay: 2s;
    }

    .buble:nth-child(5) {
      width: 20px;
      height: 20px;
      left: 48%;
      animation-duration: 5s;
      animation-delay: 1.8s;
    }

    .buble:nth-child(6) {
      width: 14px;
      height: 14px;
      left: 58%;
      animation-duration: 7.5s;
      animation-delay: 0.7s;
    }

    .buble:nth-child(7) {
      width: 18px;
      height: 18px;
      left: 67%;
      animation-duration: 6.8s;
      animation-delay: 1.2s;
    }

    .buble:nth-child(8) {
      width: 22px;
      height: 22px;
      left: 76%;
      animation-duration: 8s;
      animation-delay: 1.5s;
    }

    .buble:nth-child(9) {
      width: 9px;
      height: 9px;
      left: 85%;
      animation-duration: 4.8s;
      animation-delay: 0.3s;
    }

    .buble:nth-child(10) {
      width: 13px;
      height: 13px;
      left: 93%;
      animation-duration: 5.2s;
      animation-delay: 1.7s;
    }

    .buble:nth-child(11) {
      width: 17px;
      height: 17px;
      left: 6%;
      animation-duration: 6s;
      animation-delay: 0.4s;
    }

    .buble:nth-child(12) {
      width: 11px;
      height: 11px;
      left: 15%;
      animation-duration: 7.3s;
      animation-delay: 1.1s;
    }

    .buble:nth-child(13) {
      width: 19px;
      height: 19px;
      left: 25%;
      animation-duration: 5.7s;
      animation-delay: 1.9s;
    }

    .buble:nth-child(14) {
      width: 10px;
      height: 10px;
      left: 37%;
      animation-duration: 6.4s;
      animation-delay: 0.8s;
    }

    .buble:nth-child(15) {
      width: 21px;
      height: 21px;
      left: 49%;
      animation-duration: 7.6s;
      animation-delay: 1.3s;
    }

    .buble:nth-child(16) {
      width: 12px;
      height: 12px;
      left: 59%;
      animation-duration: 5.9s;
      animation-delay: 1.6s;
    }

    .buble:nth-child(17) {
      width: 23px;
      height: 23px;
      left: 68%;
      animation-duration: 8.2s;
      animation-delay: 0.6s;
    }

    .buble:nth-child(18) {
      width: 15px;
      height: 15px;
      left: 77%;
      animation-duration: 5.3s;
      animation-delay: 2.1s;
    }

    .buble:nth-child(19) {
      width: 20px;
      height: 20px;
      left: 88%;
      animation-duration: 6.5s;
      animation-delay: 1s;
    }

    .buble:nth-child(20) {
      width: 9px;
      height: 9px;
      left: 96%;
      animation-duration: 4.5s;
      animation-delay: 0.9s;
    }

    .home {
      width: 100%;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: var(--third-color);
      overflow: hidden;
    }

    .home .main-home {
      width: 100%;
      display: flex;
      justify-content: space-between;
      gap: 1rem;
      z-index: 53;
    }


    .home-img img {
      scale: 90%;
      opacity: 0;
    }

    @keyframes animate {
      0% {
        transform: translate(0, 0);

      }

      25% {
        transform: translate(-10px, 10px);

      }

      50% {
        transform: translate(0, 20px);

      }

      75% {
        transform: translate(10px, 10px);

      }

      100% {
        transform: translate(0, 0);

      }
    }

    .thread-text h1 sup {
      display: inline-block;
      scale: 90%;
      transform: translateY(-10px);
      opacity: 0;
      transition: all .5s ease-out;
    }

    .thread-text h1 sub {
      display: inline-block;
      scale: 90%;
      transform: translateY(10px);
      opacity: 0;
      transition: all .5s ease-out;
    }

    .home-text {
      margin-top: 5%;
    }

    .home-text .thread-text {
      width: 100%;
      overflow: clip;
      display: grid;
      align-items: center;
      margin-top: 10px;

      &:nth-child(1) h1 {
        font-size: 1.5rem;
        overflow-y: visible;
      }

      &:nth-child(2) h1,
      &:nth-child(3) h1 {
        font-size: 3.5rem;
      }
    }

    .home-text .thread-text h1 {
      color: var(--second-color);
      text-transform: uppercase;
      transform: translateY(100px);
      opacity: .5;
      filter: blur(10px);

      &.showText {
        transform: translateY(0px);
        filter: blur(0);
        opacity: 1;
      }
    }

    .btn-trending {
      margin-top: 10%;
      width: 100px;
      height: 50px;
      display: grid;
      justify-content: center;
      align-items: center;
    }

    .btn {
      padding: 7px 16px;
      border-radius: 40px;
      background-color: transparent;
      color: var(--second-color);
      font-weight: 500;
      opacity: 0;
      transform: translateX(10px);
      filter: blur(10px);
      scale: 100%;

      &:hover {
        color: var(--second-color);
        background: var(--second-color);
      }
    }
    /* ^VIEWPORT 1 */
    

    /* VIEWPORT 2 */
    .heading-info {
      text-align: center;
    }

    .heading-info span {
      font-size: 1rem;
      font-weight: 600;
      color: #1e3a8a;
    }

    .heading-info h1 {
      font-size: 2rem;
      text-transform: uppercase;
      color: #1e3a8a;
    }

    #shop-container {
      position: relative;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      margin-top: 25px;
    }

    #shop-container .box {
      position: relative;
      background: var(--third-color);
      display: flex;
      flex-direction: column;
      text-align: center;
      align-items: center;
      margin-top: 80px;
      padding-inline: 20px;
      border-radius: 10px;
      width: 250px;
      height: 450px;
      opacity: 1;
    }

    .box.show {
      animation: scrollDriven 1s forwards;
      opacity: 1;
      background-color: cyan;
    }

    @keyframes scrollDriven {
      50% {
        opacity: .5;
      }

      100% {
        opacity: 1;
      }
    }

    .box.show:nth-child(1) {
      animation-delay: 0s;
      z-index: 4
    }

    .box.show:nth-child(2) {
      animation-delay: .1s;
      z-index: 3;
    }

    .box.show:nth-child(3) {
      animation-delay: .2s;
      z-index: 2;
    }

    .box.show:nth-child(4) {
      animation-delay: .3s;
      z-index: 1;
    }

    #shop-container .box .box-img {
      width: 150px;
      height: 100px;
      margin-top: -80px;
    }

    #shop-container .box .box-img img {
      z-index: 3;
      border-top-right-radius: 10px;
      border-top-left-radius: 10px;
      width: 100%;
      height: 100%;
      object-fit: cover;
      object-position: center;
    }

    #shop-container .box h2 {
      font-size: 1.2rem;
      margin: 2.5% auto 5%;
      color: #ffffff;
      letter-spacing: 2px;
    }

    #shop-container .box span {
      color: #fff;
      font-size: .7rem;
      font-weight: 500;
      letter-spacing: .5px;
      text-align: justify;

      span {
        opacity: .5;
      }
    }

    #shop-container .box .tombol {
      position: absolute;
      padding: 7px 16px;
      border: 2px solid var(--second-color);
      border-radius: 40px;
      background-color: transparent;
      color: var(--second-color);
      font-weight: 500;
      bottom: 7.5%;
      text-transform: capitalize;
      transition: all .2s ease-out;

      &:hover {
        background-color: var(--main-color);
        color: var(--third-color);
        scale: 110%;
        border: 2px solid var(--third-color);
      }
    }

    #shop-container .box form {
      display: flex;
      justify-content: center;
      align-items: center;
    }


    .box .btn {
      border: 2px solid whitesmoke;
      color: #ffffff;
    }

    .box .btn:hover {
      background: #637dc5;
      color: #fff;
      scale: 110%;
    }
    /* ^VIEWPORT 2 */

    /* VIEWPORT 3 */
    /* todo TRENDING ROOMS */

    .trending-rooms {
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-top: 50px;
      padding-block: 0;
      padding-inline: 0;
    }

    .trending-rooms .heading-trend {
      text-align: center;
      font-family: "Cute Font", sans-serif;
      margin-bottom: 25px;
    }

    .trending-rooms .heading-trend i p {
      text-transform: uppercase;
      font-size: xx-large;
      font-size: 40px;
      text-align: center;
      color: var(--third-color);
      font-style: normal;
      font-weight: 700;
      word-spacing: 10px;
    }

    .trending-rooms .heading-trend span {
      color: var(--span-color);
      font-weight: 400;
      font-family: sans-serif;
      font-size: 20px;
      letter-spacing: 1px;
      text-shadow: 2px 2px 4px rgba(192, 171, 171, 0.5);
    }

    .trending-rooms .piramid-image {
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      margin-top: 20px;
      max-width: 80%;
      width: 100%;
      row-gap: 10px;
    }

    /* !FIRST ROWS */

    .trending-rooms .piramid-image .first-box-image {
      position: relative;
      width: 100%;
      height: 150px;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
    }

    .trending-rooms .piramid-image .first-box-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 10px;
    }

    .trending-rooms .piramid-image .first-box-image .img-content {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .trending-rooms .piramid-image .first-box-image .img-content div {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      border-radius: 10px;
      box-shadow: inset 0px 50px 70px 10px rgba(0, 0, 0, .5);
    }

    .trending-rooms .piramid-image .first-box-image .img-content span {
      position: absolute;
      top: 10px;
      left: 18px;
      color: white;
      font-weight: 500;
      font-size: 28px;
      z-index: 1;
      letter-spacing: .2px;
    }

    /* !MIDDLE ROWS */

    .trending-rooms .piramid-image .middle-box-image {
      display: flex;
      width: 100%;
      height: 180px;
      justify-content: center;
      align-items: center;
      gap: 10px;
    }

    .trending-rooms .piramid-image .middle-box-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 10px;
    }

    .trending-rooms .piramid-image .middle-box-image .img-content {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .trending-rooms .piramid-image .middle-box-image .img-content div {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      border-radius: 10px;
      box-shadow: inset 0px 50px 70px 10px rgba(0, 0, 0, .5);
    }

    .trending-rooms .piramid-image .middle-box-image .img-content span {
      position: absolute;
      top: 10px;
      left: 18px;
      color: white;
      font-weight: 500;
      font-size: 28px;
      z-index: 1;
      letter-spacing: .2px;
    }

    /* !LAST ROWS */

    .trending-rooms .piramid-image .last-box-image {
      display: flex;
      width: 100%;
      height: 200px;
      justify-content: center;
      align-items: center;
      gap: 10px;
    }

    .trending-rooms .piramid-image .last-box-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
    }

    .trending-rooms .piramid-image .last-box-image .img-content {
      position: relative;
      width: 100%;
      height: 100%;
    }

    .trending-rooms .piramid-image .last-box-image .img-content div {
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      border-radius: 10px;
      box-shadow: inset 0px 50px 70px 10px rgba(0, 0, 0, .5);
    }

    .trending-rooms .piramid-image .last-box-image .img-content span {
      position: absolute;
      top: 10px;
      left: 18px;
      color: white;
      font-weight: 500;
      font-size: 28px;
      z-index: 1;
      letter-spacing: .2px;
    }
    /* ^VIEWPORT 3 */

    /** FOOTER */

    .contact {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .social {
      display: flex;
      margin: 0;
      padding: 0;
    }

    .social li {
      display: flex;
      height: 100%;
      justify-content: center;
      align-items: center;
    }

    .social li a {
      margin-left: 20px;
      padding: 8px 8px 4px 8px;
      background: #1e3a8a;
      border-radius: 50%;
      transition: all 0.2s ease-out;
    }

    .social li a:hover {
      box-shadow: 0 0 0 8px rgba(0, 0, 0, 0.1);
    }

    .social li a i {
      color: #fff;
      font-size: 27px;
    }

    .links {
      margin: 1rem 0 1rem;
    }

    .links a {
      color: var(--second-color);
      font-size: 1rem;
      font-weight: 500;
      padding: 1rem;
    }

    .links a:hover {
      text-decoration: underline;
    }

    .contact p {
      text-align: center;
    }
  </style>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <link rel="shortcut icon" href="img/title.png" type="image/x-icon">
</head>

<body>
  <div class="global-container-page">
    <header id="heading">
      <a href="index.php" class="logo" id="logo">
        <img src="img/logo.png" alt="logo" />
      </a>

      <ul class="navbar">
        <li><a href="#home" class="action">Beranda</a></li>
        <li><a href="#info" class="action">Info kamar</a></li>
        <li><a href="sewa_hotel/form_pesanan.php" class="action">Pesan Kamar</a></li>
        <li><a href="sewa_hotel/list_history_page.php" id="history" class="action">Pesanan Anda</a></li>
      </ul>

      <ul class="container-login">
        <li id="button-login"><a href="login/index.php">Masuk</a></li>
        <li id="button-logout"><a href="logout.php" onclick="return confirm('are you sure want to log out of this account?\n\n Email: <?= $_SESSION['email'] ?>')">Logout</a></li>
        <li id="user-icon"><a href="" class="user-icon"><i class="fa-solid fa-user-secret" title="<?= $_SESSION['email']; ?>"></i></a></li>
      </ul>
    </header>

    <div class="navigation-container">
      <div class="navigation-tools">
        <div class="navIcon" onclick="navClick()">
          <div class="dash">
            <div></div>
            <div></div>
            <div></div>
          </div>
        </div>
        <div class="box">
          <ul>
            <li>
              <a href="#home">
                <span>
                  <i class="fa-solid fa-house"></i>
                </span>
                <span class="navText">Home</span>
              </a>
            </li>
            <li>
              <a href="sewa_hotel/form_pesanan.php">
                <span>
                  <i class="fa-solid fa-bed"></i>
                </span>
                <span class="navText">Pesan Kamar</span>
              </a>
            </li>
            <li>
              <a href="sewa_hotel/list_history_page.php">
                <span>
                  <i class="fa-solid fa-list-ul"></i>
                </span>
                <span class="navText">History Pesanan</span>
              </a>
            </li>
            <li>
              <a href="#info">
                <span>
                  <i class="fa-solid fa-newspaper"></i>
                </span>
                <span class="navText">Informasi Hotel</span>
              </a>
            </li>
            <li>
              <a href="#trending">
                <span>
                  <i class="fa-solid fa-fire-flame-curved"></i>
                </span>
                <span class="navText">Kamar Populer</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Home -->
    <section class="home" id="home">
      <div class="main-home">
        <div class="home-text" style="z-index: 3;">
          <div class="thread-text">
            <h1>
              Welcome <sup>To</sup> The World <sub>of</sub>
            </h1>
          </div>
          <div class="thread-text">
            <h1>
              Hotel Angkasa
            </h1>
          </div>
          <div class="thread-text">
            <h1>
              nyaman dan elegan!
            </h1>
          </div>
          <div class="btn-trending">
            <a href="#trending" class="btn">
              <span>Populer</span>
            </a>
          </div>
        </div>
        <div class="home-img" style="z-index: 3;">
          <img src="img/newHotel.png" alt="home-img" />
        </div>
      </div>
      <div class="bubles">
        <span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span><span class="buble"></span>
      </div>
    </section>

    <!-- INFO -->
    <section class="info" id="info">
      <div class="heading-info">
        <span>Kamar Tersedia</span>
        <h1>Tentukan Jenis Kamar</h1>
      </div>
      <div id="shop-container">
        <div class="box">
          <div class="box-img">
            <img src="img/tipea.jpg" alt="shop1" />
          </div>

          <!-- detail room -->
          <h2>Tipe A<br /></h2>
          <span>
            <!-- TEXT CONTENT SPAN -->
          </span>
          <a href="sewa_hotel/type_kamar/typeA.php" class="tombol">lihat detail</a>
        </div>
        <div class="box">
          <div class="box-img">
            <img src="img/tipeb.jpg" alt="shop1" />
          </div>
          <h2>Tipe B</h2>
          <span>
            <!-- TEXT CONTENT SPAN -->
          </span>
          <a href="sewa_hotel/type_kamar/typeB.php" class="tombol">lihat detail</a>
        </div>
        <div class="box">
          <div class="box-img">
            <img src="img/tipec.jpg" alt="shop1" />
          </div>
          <h2>Tipe C</h2>
          <span>
            <!-- TEXT CONTENT SPAN -->
          </span>
          <a href="sewa_hotel/type_kamar/typeC.php" class="tombol">lihat detail</a>
        </div>
        <div class="box">
          <div class="box-img">
            <img src="img/tipec.jpg" alt="shop1" />
          </div>
          <h2>Tipe D</h2>
          <span>
            <!-- TEXT CONTENT SPAN -->
          </span>
          <a href="sewa_hotel/type_kamar/typeD.php" class="tombol">lihat detail</a>
        </div>
    </section>

    <!-- TRENDING ROOMS -->
    <section class="trending-rooms" id="trending">
      <div class="heading-trend">
        <i>
          <p>Kamar Populer</p>
        </i>
        <span>Berikut pilihan kamar yang populer di hotel Angkasa</span>
      </div>
      <div class="piramid-image">
        <div class="first-box-image">
          <div class="img-content">
            <img src="img/tipea.jpg" alt="a">
            <span>Duluxe Room</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipeb.jpg" alt="b">
            <span>Suite Room</span>
            <div></div>
          </div>
        </div>
        <div class="middle-box-image">
          <div class="img-content">
            <img src="img/tipea.jpg" alt="a">
            <span>Superior Room</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipeb.jpg" alt="a">
            <span>Standard Room</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipea.jpg" alt="a">
            <span>Executive Room</span>
            <div></div>
          </div>
        </div>
        <div class="last-box-image">
          <div class="img-content">
            <img src="img/tipeb.jpg" alt="a">
            <span>Familiy Room</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipea.jpg" alt="a">
            <span>Junior Suite</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipeb.jpg" alt="a">
            <span>VVIP Room</span>
            <div></div>
          </div>
          <div class="img-content">
            <img src="img/tipea.jpg" alt="a">
            <span>VIP Room</span>
            <div></div>
          </div>
        </div>
      </div>
    </section>

    <!-- ABOUT -->
    <section class="contact" id="contact">
      <ul class="social">
        <li>
          <a href=""><i class="fa-brands fa-whatsapp"></i></a>
        </li>
        <li>
          <a href=""><i class="fa-brands fa-instagram"></i></a>
        </li>
        <li>
          <a href=""><i class="fa-brands fa-facebook"></i></a>
        </li>
        <li>
          <a href=""><i class="fa-brands fa-youtube"></i></a>
        </li>
        <li>
          <a href=""><i class="fa-brands fa-tiktok"></i></a>
        </li>
        <li>
          <a href=""><i class="fa-brands fa-twitter"></i></a>
        </li>
      </ul>
    </section>
  </div>

  <script>
    const observers = {
      viewPort1: {
        sideNavBar: {
          heading: document.getElementById("heading"),
          logoHead: document.querySelector(".logo"),
          navigation: document.querySelector(".navigation-tools"),
          headingNav: document.querySelector(".navigation-tools .navIcon"),
          navToggle: document.querySelectorAll(".navigation-tools .box li"),
        },
        main: {
          homeImg: document.querySelector(".home-img img"),
          homeText: document.querySelectorAll(".home-text .thread-text"),
          textHome: document.querySelectorAll(".thread-text h1")
        }
      },
      viewPort2: {
        containerObjects: document.querySelector("#shop-container"),
        objects: document.querySelectorAll("#shop-container .box"),
        textContent: document.querySelectorAll("#shop-container .box span")
      }
    }

    document.addEventListener("DOMContentLoaded", () => {
      document.addEventListener("scroll", () => {
        if (window.scrollY <= 60) {
          observers.viewPort1.sideNavBar.heading.classList.add("active")
        }
      })
      if (window.scrollY <= 60) {
        observers.viewPort1.sideNavBar.heading.classList.add("active")
      }

      let arrTextDesc = [
        'Nikmati kenyamanan tidur yang luar biasa di kamar kami dengan kasur queen size yang luas. Dirancang untuk memberikan pengalaman menginap yang relaks dan menyegarkan, kamar ini menawarkan ruang yang cukup untuk dua orang. Dilengkapi dengan fasilitas modern dan suasana yang hangat, kamar ini cocok untuk pasangan atau tamu yang menginginkan kenyamanan ekstra selama menginap.',
        'Kamar ini menawarkan dua tempat tidur single yang dapat menjadi pilihan ideal bagi teman perjalanan atau keluarga yang ingin tidur terpisah namun tetap dekat. Dengan ruang yang luas dan desain yang nyaman, kamar ini dilengkapi dengan berbagai fasilitas untuk memastikan kenyamanan Anda selama menginap. Solusi sempurna untuk pengalaman menginap yang praktis dan nyaman.',
        'Kamar ini dirancang untuk satu tamu yang menginginkan kenyamanan dan fungsionalitas. Dilengkapi dengan tempat tidur single yang nyaman, kamar ini menawarkan ruang yang efisien dan tenang untuk beristirahat. Ideal untuk perjalanan solo atau tamu yang membutuhkan akomodasi yang sederhana namun nyaman, dengan fasilitas lengkap untuk memenuhi kebutuhan Anda.',
        'Kamar ini dirancang untuk satu tamu yang menginginkan kenyamanan dan fungsionalitas. Dilengkapi dengan tempat tidur single yang nyaman, kamar ini menawarkan ruang yang efisien dan tenang untuk beristirahat. Ideal untuk perjalanan solo atau tamu yang membutuhkan akomodasi yang sederhana namun nyaman, dengan fasilitas lengkap untuk memenuhi kebutuhan Anda.',
      ]
      let textContentArr = arrTextDesc.map(t => t.split(' '))
      observers.viewPort2.textContent.forEach((elSpan, i) => {
        textContentArr[i].map((text, i) => {
          let span = document.createElement("span")
          elSpan.appendChild(span)
          span.textContent = text + ' '
          span.className = 't'
        })
      })

      window.addEventListener("scroll", () => {
        const scrollTop = window.scrollY;

        observers.viewPort2.textContent.forEach((elSpan, i) => {
          const spans = elSpan.querySelectorAll('.t');

          spans.forEach((span, index) => {
            const triggerPoint = 400 + (index * 5);

            let opacity = (scrollTop - triggerPoint) / 50;
            opacity = Math.min(Math.max(opacity, 0.1), 1);

            span.style.opacity = opacity;
          });
        });
      });
    })

    const observer = new IntersectionObserver((entriesObjects) => {
      entriesObjects.forEach((entry, index) => {
        if (entry.target.tagName === "IMG") {
          if (entry.isIntersecting) {
            if (entry.intersectionRatio >= .5) {
              setTimeout(() => {
                Object.assign(observers.viewPort1.main.homeImg.style, {
                  scale: "110%",
                  transition: "all .6s 200ms ease-out",
                  opacity: 1
                })
                observers.viewPort1.main.homeImg.addEventListener("transitionend", (e) => {
                  if (e.propertyName === "scale") {
                    observers.viewPort1.main.homeImg.style.animation = "animate 3s infinite linear"
                    observer.unobserve(observers.viewPort1.main.homeImg)
                  }
                })
              }, 500);
            }
          }
        }

        if (entry.target.classList.contains("thread-text")) {
          let sup = document.querySelector(".thread-text h1 sup"),
            sub = document.querySelector(".thread-text h1 sub"),
            i = observers.viewPort1.main.homeText.length
          if (entry.isIntersecting) {
            if (entry.intersectionRatio >= .5) {
              entry.target.children[0].classList.add("showText")
              entry.target.children[0].style.transition = "all 1s 200ms ease-in-out"
              setTimeout(() => {
                if (entry.target.children[0].children.length != 0) {
                  sup.style.transform = "translateY(0)"
                  sup.style.scale = "100%"
                  sup.style.opacity = 1
                  sub.style.scale = "100%"
                  sub.style.transform = "translateY(0)"
                  sub.style.opacity = 1
                }
              }, 800)
            }
          } else {
            sup.removeAttribute("style")
            sub.removeAttribute("style")
            entry.target.children[0].classList.remove("showText")
            entry.target.children[0].style.transition = "none"
          }
        }

        if (entry.target.id === 'heading') {
          if (!entry.isIntersecting) {
            observers.viewPort1.sideNavBar.navigation.classList.remove("closeNavigationEmptyToggle")
            observers.viewPort1.sideNavBar.navigation.classList.remove("closeNavigationIsToggle")

            observers.viewPort1.sideNavBar.navigation.style.marginTop = `${entry.boundingClientRect.height / 2}px`
            observers.viewPort1.sideNavBar.navigation.style.display = "flex"
            observers.viewPort1.sideNavBar.navigation.style.position = "fixed"
            observers.viewPort1.sideNavBar.navigation.style.zIndex = "150"
          } else {
            observers.viewPort1.sideNavBar.navToggle.forEach(e => {
              if (e.classList.value === '') {
                observers.viewPort1.sideNavBar.navigation.classList.add("closeNavigationEmptyToggle")
              } else {
                observers.viewPort1.sideNavBar.navigation.classList.add("closeNavigationIsToggle");
              }
            })
          }
        }

        if (entry.target.classList.contains("logo")) {
          if (entry.intersectionRatio >= .5) {
            Object.assign(entry.target.children[0].style, {
              transform: "translateX(0)",
              transition: "transform 1s 100ms ease-out"
            })
          }
        }

        if (entry.target.classList.contains("btn-trending")) {
          if (entry.isIntersecting) {
            if (entry.intersectionRatio >= .5) {
              Object.assign(entry.target.children[0].style, {
                transition: "all 1s 100ms ease-out",
                opacity: "1",
                scale: "110%",
                opacity: "1",
                filter: 'blur(0)',
                background: 'rgb(29, 50, 109)'
              })
            }
          } else {
            entry.target.children[0].removeAttribute("style")
          }
        }

        if (entry.target.id === 'shop-container') {
          if (entry.isIntersecting) {
            observers.viewPort2.objects.forEach(obj => obj.classList.add("show"))
          } else {
            observers.viewPort2.objects.forEach(obj => obj.classList.remove("show"))
          }
        }
      })
    }, {
      threshold: [0, 0.25, 0.5]
    })
    if (window.scrollY > 80) {
      observer.observe(observers.viewPort1.sideNavBar.heading)
    }
    observers.viewPort1.sideNavBar.heading.addEventListener("transitionend", () => {
      observer.observe(observers.viewPort1.sideNavBar.heading)
    })
    observer.observe(document.querySelector(".logo"))
    observer.observe(document.querySelector(".btn-trending"))
    observer.observe(observers.viewPort2.containerObjects)
    observer.observe(observers.viewPort1.main.homeImg)
    observers.viewPort1.main.homeText.forEach(e => observer.observe(e))

    let iClick = 0

    function navClick() {
      iClick++
      observers.viewPort1.sideNavBar.navToggle.forEach((nav, i) => {
        let iObjNav = observers.viewPort1.sideNavBar.navToggle.length
        if (iClick % 2 != 0) {
          observers.viewPort1.sideNavBar.headingNav.classList.toggle("animateDashNav")
          setTimeout(() => {
            nav.classList.toggle("show")
          }, 100 * i);
        } else {
          observers.viewPort1.sideNavBar.headingNav.classList.toggle("animateDashNav")
          setTimeout(() => {
            nav.classList.toggle("show")
          }, 100 * (iObjNav - 1 - i));
        }
      })
    }
  </script>

  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"
    integrity="sha512-cOH8ndwGgPo+K7pTvMrqYbmI8u8k6Sho3js0gOqVWTmQMlLIi6TbqGWRTpf1ga8ci9H3iPsvDLr4X7xwhC/+DQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
</body>

</html>