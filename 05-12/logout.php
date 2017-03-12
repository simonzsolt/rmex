<?php
session_start();
session_destroy();
header('Location: belepes.php');
exit;
?> 