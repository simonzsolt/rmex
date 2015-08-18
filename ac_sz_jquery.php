<?php
require 'adatbazis.php';
$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
mysqli_query($sqlkapcsolat,$char);

//Minden kulcsszó kiválasztása és listázása.
$sz_merge = array();
$sz_query = "SELECT szereplok FROM exemplum WHERE szereplok NOT IN ('')";
$sz_res = mysqli_query($sqlkapcsolat, $sz_query);
			
if (mysqli_num_rows($sz_res)>0) {
	while ($sz_db =  mysqli_fetch_array($sz_res)) {
		$sz_merge = array_merge($sz_merge, explode("+", $sz_db[0]));	
	}					
}
	
$sz_egyedi = array_unique($sz_merge);					
$szereplok = array_slice($sz_egyedi, 0);
// kulcsszavak listázása a beírt kifejezés alapján jquery liveserch
$sz = array();
if (($_POST['value']) != '') {
	$i = -1;
	$l = (count($szereplok)-1); 
	while ($i++ != $l) {
		$pos_sz = stripos($szereplok[$i], ($_POST['value']));
		if ($pos_sz === 0) {
			// echo $szereplok[$i] . "<br>";
			array_push($sz, $szereplok[$i]);
		}
	}
	echo json_encode($sz);
}
	
?>