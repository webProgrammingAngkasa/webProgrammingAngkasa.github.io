<?php
//todo MENGHANCURKAN DATA SESI LOGIN DAN REDIRECT KE PERMINTAAN EMAIL
session_start();
session_unset();
session_destroy();
header("Location: index.php");
