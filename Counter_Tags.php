<?php 
require 'adatbazis.php';
$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
mysqli_query($sqlkapcsolat,$char);

if (($_POST['value']) != '') {
	$cnt_tags = $_POST['value'];
	$sql ="UPDATE temp SET Counter_Tags=$cnt_tags WHERE ID='1'";
	mysqli_query($sqlkapcsolat, $sql);
}
?>