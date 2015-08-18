<?php
require 'adatbazis.php';
$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
mysqli_query($sqlkapcsolat,$char);

//Minden kulcsszó kiválasztása és listázása.
$ksz_merge = array();
$tag_query = "SELECT kulcsszavak FROM exemplum WHERE kulcsszavak NOT IN ('')";
$tag_res = mysqli_query($sqlkapcsolat, $tag_query);
			
if (mysqli_num_rows($tag_res)>0) {
	while ($ksz_db =  mysqli_fetch_array($tag_res)) {
		$ksz_merge = array_merge($ksz_merge, explode("+", $ksz_db[0]));	
	}					
}	
$ksz_egyedi = array_unique($ksz_merge);					
$kulcsszavak = array_slice($ksz_egyedi, 0);
// kulcsszavak listázása a beírt kifejezés alapján jquery liveserch
$tags = array();
if (($_POST['value']) != '') {
	$i = -1;
	$l = (count($kulcsszavak)-1); 
	while ($i++ != $l) {
		$pos = stripos($kulcsszavak[$i], ($_POST['value']));
		if ($pos === 0) {
			array_push($tags, $kulcsszavak[$i]);
		}
	}
	echo json_encode($tags);
}
	
?>