<?php
date_default_timezone_set("Asia/Jakarta");
$strtotime = strtotime('2025-03-02 21:12:06');
echo $strtotime;
echo "<br>";
echo time();
var_dump($strtotime < time());
