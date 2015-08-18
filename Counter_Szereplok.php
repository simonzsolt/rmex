<?php 
require 'adatbazis.php';
$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
mysqli_query($sqlkapcsolat,$char);

if (($_POST['value']) != '') {
	$cnt_sz = $_POST['value'];
	$sql_sz ="UPDATE temp SET Counter_Szereplok=$cnt_sz WHERE ID='1'";
	mysqli_query($sqlkapcsolat, $sql_sz);
}
?>