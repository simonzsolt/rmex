<?php
require 'adatbazis.php';
$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
mysqli_query($sqlkapcsolat,$char);

//Minden kulcsszó kiválasztása és listázása.
$kodex_merge = array();
$kodex_query = "SELECT kodex_alegyseg FROM exemplum WHERE kodex_alegyseg NOT IN ('')";
$kodex_res = mysqli_query($sqlkapcsolat, $kodex_query);
			
if (mysqli_num_rows($kodex_res)>0) {
	while ($kodex_db =  mysqli_fetch_array($kodex_res)) {
		$kodex_merge = array_merge($kodex_merge, explode("+", $kodex_db[0]));	
	}					
}	
$kodex_egyedi = array_unique($kodex_merge);					
$kodex_alegyseg = array_slice($kodex_egyedi, 0);
// kulcsszavak listázása a beírt kifejezés alapján jquery liveserch
$alegysegek = array();
if (($_POST['value']) != '') {
	$i = -1;
	$l = (count($kodex_alegyseg)-1); 
	while ($i++ != $l) {
		$pos = stripos($kodex_alegyseg[$i], ($_POST['value']));
		if ($pos === 0) {
			array_push($alegysegek, $kodex_alegyseg[$i]);
		}
	}
	echo json_encode($alegysegek);
}
	
?>