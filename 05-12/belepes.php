<?php
session_start();
if(isset($_SESSION['usr']) && isset($_SESSION['pswd'])){
header("Location: upload.php");
}
//nem biztonságos! csak úgy van!
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
    <html>
    <head>
    <title> Belépés </title>
    </head>
    <body>
    <form method="post" action="login.php">

    <table>
    <tr><td>Felhasználónév:</td><td><input type="text" name="usr"></td></tr>
    <tr><td>Jelszó:</td><td><input type="password" name="pswd"></td></tr>
    <tr><td><input type="submit" name="login" value="Belépés"></td>
    </table>
    </form>
    </body>
    </html>
