<?php
session_start();
if(isset($_SESSION['usr']) && isset($_SESSION['pswd'])){
header("Location: upload.php");
}
//nem biztons�gos! csak �gy van!
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
    <html>
    <head>
    <title> Bel�p�s </title>
    </head>
    <body>
    <form method="post" action="login.php">

    <table>
    <tr><td>Felhaszn�l�n�v:</td><td><input type="text" name="usr"></td></tr>
    <tr><td>Jelsz�:</td><td><input type="password" name="pswd"></td></tr>
    <tr><td><input type="submit" name="login" value="Bel�p�s"></td>
    </table>
    </form>
    </body>
    </html>
