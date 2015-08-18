<?php
$adatbazis = "bartokzsofi";
$host = "mysql.caesar.elte.hu";
$user = "bartokzsofi";
$password = "TJiKrq5pKRCVmfcS";
$sqlkapcsolat = mysqli_connect( $host, $user, $password, $adatbazis );

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$tabla="exemplum"; 
?>
