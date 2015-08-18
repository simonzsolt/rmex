<?php
session_start();
if($_REQUEST['usr']=="zsofi" && $_REQUEST['pswd']=="eXemplum9"){
$_SESSION['usr'] = "zsofi";
$_SESSION['pswd'] = "eXemplum9";
header("Location: upload.php");
}
else{
header("Location: belepes.php");
}
?>