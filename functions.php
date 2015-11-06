<?php

	/* function WriteDispaly() {
		require 'adatbazis.php';
		$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
		mysqli_query($sqlkapcsolat,$char);
	
		// minden index lekérdezése a display oladalak kiírásához műveletehz
		$sql_list_index = "SELECT * FROM exemplum";
		$rs = mysqli_query($sqlkapcsolat, $sql_list_index);
		$query_cnt = mysqli_num_rows($rs);
		$limit = $query_cnt-1;
		$all_index = array();
		$i = -1;
		while (($row = mysqli_fetch_array($rs)) && ($i++ !== $limit)) {
			$all_index[] = $row['index2'];
		}
		// display fájlok létrehozésa
		$limit = count($all_index);
		$j = -1;
		while ($j++ != $limit-1) {
			$myfile = fopen("/afs/elte.hu/org/sermones/sermones.elte.hu/exemplumadatbazis/display/display_" . $all_index[$j] . ".php", "w") or die("Unable to open file!");
			$script = "<?php header(" . "'" . "location:http://" . "localhost" . "/" . "exemplum" . "/" . "index" . "/" . $all_index[$j] . "'); ?>";
			fwrite($myfile, $script);
			fclose($myfile);
		}
	} */

	function tags() {
		require 'adatbazis.php';
		$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
		mysqli_query($sqlkapcsolat,$char);

		//Minden szereplo kiválasztása és listázása.
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
			
		//Minden forraskodex kiválasztása és listázása.
		$kdx_merge = array();
			$kdx_query = "SELECT forraskodex FROM exemplum WHERE forraskodex NOT IN ('')";
			$kdx_res = mysqli_query($sqlkapcsolat, $kdx_query);
						
			if (mysqli_num_rows($kdx_res)>0) {
				while ($kdx_db =  mysqli_fetch_array($kdx_res)) {
					$kdx_merge = array_merge($kdx_merge, explode("+", $kdx_db[0]));	
				}					
			}	
			$kdx_egyedi = array_unique($kdx_merge);					
			$forraskodex = array_slice($kdx_egyedi, 0);
			
		$mt_tags = array_merge($kulcsszavak, $szereplok, $forraskodex);
		$mt_egyedi = array_unique($mt_tags);
		$meta_tags = array_slice($mt_egyedi, 0);
		
		$i = -1;
			$limit = (count($meta_tags)-1);
			while ($i++ != $limit) {
				echo ", " . trim($meta_tags[$i]);
			}
	}
	

	function clear() {
	
		require 'adatbazis.php';
		$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
		mysqli_query($sqlkapcsolat,$char);
	
		if(isset($_POST['reset'])) {
			$output = array();
			$cnt_tags = 1;		
	
			$sql ="UPDATE temp SET Counter_Tags=$cnt_tags WHERE ID='1'";
			mysqli_query($sqlkapcsolat, $sql);
			$_POST['kulcsszo_1'] = "";
			
			$cnt_sz = 1;
			$sql_sz ="UPDATE temp SET Counter_Szereplok=$cnt_sz WHERE ID='1'";
			mysqli_query($sqlkapcsolat, $sql_sz);
			$_POST['szereplo_1'] = "";
			
			$cnt_kdx = 1;
			$sql_kodex ="UPDATE temp SET Counter_Kodex=$cnt_kdx WHERE ID='1'";
			mysqli_query($sqlkapcsolat, $sql_kodex);
			$_POST['kodex_alegyseg_1'] = "";
		}
	}

	function search() {
		// Kapcsolat és karakterkódolás megadása.
		require 'adatbazis.php';
		$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
		mysqli_query($sqlkapcsolat,$char);
				
		if (isset ($_POST['submit'])) {
			// Kereséi mezők megadása.
			$fields = array('index2' , 'forraskodex' , 'modern_kiadas' , 'kotet' , 'kotet_oldalszama' , 'kodex_cime' , 'befogado_cime' , 'exempl_cime' , 'exempl_tartalma' , 'exempl_szovege' , 'unnep' , 'exempl_elozmeny' , 'tetel' , 'exempl_utaloszo' , 'exempl_bokor_tagok' , 'szereplok' , 'hivatkozott_hely' , 'exempl_kontext_forrasa' , 'exempl_forrasa' , 'exempl_tipusa_forrashoz' , 'latin_forras' , 'katalogus_szam' , 'magyar_parhuzam' , 'tavolabbi_parhuzam' , 'megjegyzes' , 'exempl_bokor' , 'exempl_bokor' , 'exemplutalas' , 'exemplutalas' , 'konkluzio' , 'konkluzio' , 'fohasz' , 'fohasz' , 'megszolitas' , 'megszolitas' , 'buzditas' , 'buzditas' , 'allegorikus' , 'allegorikus' , 'hivatkozas' , 'hivatkozas' , 'kontextus' , 'szereplotip' , 'mufajtip');
			$conditions = array();			
			$field_select = array('kontextus' , 'szereplotip' , 'mufajtip' , 'forraskodex');
			$field_radio = array('exempl_bokor' , 'exempl_bokor' , 'exemplutalas' , 'exemplutalas' , 'konkluzio' , 'konkluzio' , 'fohasz' , 'fohasz' , 'megszolitas' , 'megszolitas' , 'buzditas' , 'buzditas' , 'allegorikus' , 'allegorikus' , 'hivatkozas' , 'hivatkozas');
			
			// Mezők kiosztása LOOPban.
			foreach($fields as $field) {
				// Elfogadott az üres mező küldése.
				if(isset ($_POST[$field])) {			
					// A többválaszos mezőkből itt lesz kiválasztva a névhez tartozó érték. A három több többválaszos mező nevei egy arrayben vannak tárolva, és a FOR LOOPban társul a megfelelő mező az adott értékhez.
					for ($j=0; $j != count($field_select); $j++) {
						if ($field == $field_select[$j]) {
							foreach($_POST[$field_select[$j]] as $select) {
							$_POST[$field_select[$j]] = $select;
							}
						}
					}
					// A rádiógombok itt kapják meg a névhez tartozó értéket, hasonló módon a többválaszos mezőkhöz.
					for ($k=0; $k != count($field_radio); $k++) {
						if ($field == $field_radio[$k]) {
							if (is_array($field_radio[$k])) {
								foreach($_POST[$field_radio[$k]] as $radio) {
								}
							}
						}
					}			
					// A feltételek létrehozésa, REAL_ESCAPE-elve.
					$conditions[] = "`$field` LIKE '%" . mysqli_real_escape_string($sqlkapcsolat, $_POST[$field]) . "%'";
				}
			}
			// a db kulcsszavak cellák értékeinek arraybe rendezése
			$sql_k = "SELECT * FROM exemplum WHERE kulcsszavak NOT IN ('')";
			$rs = mysqli_query($sqlkapcsolat, $sql_k);
			$row_cnt_ksz = mysqli_num_rows($rs);
			// Counter_Tags lekérdezése az adatbázisból (kereso.php), majd a form adatainak arraybe rendezése
			$ksz_array = array();
			$sql_cnt = "SELECT Counter_Tags FROM temp WHERE ID='1'";
			$rs_cnt = mysqli_query($sqlkapcsolat, $sql_cnt);
			$row_cnt = mysqli_fetch_array($rs_cnt);
			$counter_tags = $row_cnt['Counter_Tags'];
			$ksz_form_array = array();
			// beérkező kulcsszavak kezelése
			if(!empty($_POST['kulcsszo_1'])) {		
			$i = 0;
				while ($i++ != $counter_tags) {
					$x = "kulcsszo_" . $i;
					$ksz_form_array[] = mysqli_real_escape_string($sqlkapcsolat, $_POST[$x]);
				}
				//reset Counter_Tags in db
				$cnt_tags = 1;
				$sql ="UPDATE temp SET Counter_Tags=$cnt_tags WHERE ID='1'";
				mysqli_query($sqlkapcsolat, $sql);
				$_POST['kulcsszo_1'] = "";
				$tag_m = 1;
			} elseif (empty($_POST['kulcsszo_1'])) {
				$tag_m = 0;
			}
			// pontos kifejezés összehasonlítása		
			$i=-1;
			while(($row_ksz = mysqli_fetch_array($rs)) && ($i++ <=$row_cnt_ksz)) {
				$db_array[$i] = explode("+", ($row_ksz['kulcsszavak']));
				$index_array[$i] = $row_ksz['index2'];		
				$master_cnt = count(array_filter($ksz_form_array));
				$inter_cnt = count(array_intersect($ksz_form_array,$db_array[$i]));
				if ($inter_cnt == $master_cnt) {
					$ksz_array[] = $index_array[$i];
				}
			}
			
			// szereplők keresése
			// a db szereplok cellák értékeinek arraybe rendezése
			$sql_sz = "SELECT * FROM exemplum WHERE szereplok NOT IN ('')";
			$rs_sz = mysqli_query($sqlkapcsolat, $sql_sz);
			$row_cnt_sz = mysqli_num_rows($rs_sz);
			// Counter_Szereplok lekérdezése az adatbázisból (kereso.php), majd a form adatainak arraybe rendezése
			$sz_array = array();
			$sql_cnt_sz = "SELECT Counter_Szereplok FROM temp WHERE ID='1'";
			$rs_cnt_sz = mysqli_query($sqlkapcsolat, $sql_cnt_sz);
			$row_cnt_sz = mysqli_fetch_array($rs_cnt_sz);
			$counter_sz = $row_cnt_sz['Counter_Szereplok'];
			$sz_form_array = array();
			
			// beérkező szereplok kezelése
			if(!empty($_POST['szereplo_1'])) {
			$i = 0;
				while ($i++ != $counter_sz) {
					$y = "szereplo_" . $i;
					$sz_form_array[] = mysqli_real_escape_string($sqlkapcsolat, $_POST[$y]);
				}
				//reset Counter_Szereplok in db
				$cnt_sz = 1;
				$sql_sz ="UPDATE temp SET Counter_Szereplok=$cnt_sz WHERE ID='1'";
				mysqli_query($sqlkapcsolat, $sql_sz);
				$_POST['szereplo_1'] = "";
				$sz_m = 2;
			} elseif (empty($_POST['szereplo_1'])) {
				$sz_m = 0;
			}
			
			// pontos kifejezés összehasonlítása		
			$i = -1;
			while(($row_sz = mysqli_fetch_array($rs_sz)) && ($i++ <= $row_cnt_sz)) {
				$db_array_sz[$i] = explode("+", ($row_sz['szereplok']));
				$index_array_sz[$i] = $row_sz['index2'];		
				$master_cnt_sz = count(array_filter($sz_form_array));
				$inter_cnt_sz = count(array_intersect($sz_form_array,$db_array_sz[$i]));
				if ($inter_cnt_sz == $master_cnt_sz) {
					$sz_array[] = $index_array_sz[$i];
				}
			}
			
			
			
			// kodex alegységek keresése
			// a db kodex_alegyseg cellák értékeinek arraybe rendezése
			$sql_kdx = "SELECT * FROM exemplum WHERE kodex_alegyseg NOT IN ('')";
			$rs_kdx = mysqli_query($sqlkapcsolat, $sql_kdx);
			$row_cnt_kdx = mysqli_num_rows($rs_kdx);
			// Counter_Kodex lekérdezése az adatbázisból (kereso.php), majd a form adatainak arraybe rendezése
			$kdx_array = array();
			$sql_cnt_kdx = "SELECT Counter_Kodex FROM temp WHERE ID='1'";
			$rs_cnt_kdx = mysqli_query($sqlkapcsolat, $sql_cnt_kdx);
			$row_cnt_kdx = mysqli_fetch_array($rs_cnt_kdx);
			$counter_kdx = $row_cnt_kdx['Counter_Kodex'];
			$kdx_form_array = array();
			
			// beérkező kodex_alegysegek kezelése
			if(!empty($_POST['kodex_alegyseg_1'])) {
			$i = 0;
				while ($i++ != $counter_kdx) {
					$z = "kodex_alegyseg_" . $i;
					$kdx_form_array[] = mysqli_real_escape_string($sqlkapcsolat, $_POST[$z]);
				}				
				//reset Counter_Kodex in db
				$cnt_kdx = 1;
				$sql_kdx ="UPDATE temp SET Counter_Kodex=$cnt_kdx WHERE ID='1'";
				mysqli_query($sqlkapcsolat, $sql_kdx);
				$_POST['kodex_alegyseg_1'] = "";
				$kdx_m = 4;
			} elseif (empty($_POST['kodex_alegyseg_1'])) {
				$kdx_m = 0;
			}
			// pontos kifejezés összehasonlítása		
			$i = -1;
			while(($row_kdx = mysqli_fetch_array($rs_kdx)) && ($i++ <= $row_cnt_kdx)) {
				$db_array_kdx[$i] = explode("+", ($row_kdx['kodex_alegyseg']));
				$index_array_kdx[$i] = $row_kdx['index2'];		
				$master_cnt_kdx = count(array_filter($kdx_form_array));
				$inter_cnt_kdx = count(array_intersect($kdx_form_array,$db_array_kdx[$i]));
				if ($inter_cnt_kdx == $master_cnt_kdx) {
					$kdx_array[] = $index_array_kdx[$i];
				}
			}
			
			// minden index lekérdezése a switch műveletehz
			$sql_list_index = "SELECT * FROM exemplum";
			$rs = mysqli_query($sqlkapcsolat, $sql_list_index);
			$query_cnt = mysqli_num_rows($rs);
			$limit = $query_cnt-1;
			$all_index = array();
			$i = -1;
			while (($row = mysqli_fetch_array($rs)) && ($i++ !== $limit)) {
				$all_index[] = $row['index2'];
			}
			// a formok kirétékelésénél, ha a + jeles mezők üresek akkor a változó 0, ha nem 1,2 illetve 4
			// ezek összege megfelel a különböző eseteknek a swith műveletben
			// a $master_indx adja meg a query-nek a szükséges indexeket
			$marker = $tag_m + $sz_m + $kdx_m;
			$master_indx = "";
			switch ($marker) {
				case 0: 
					$master_indx = $all_index;
					break;
				case 1:
					$master_indx = $ksz_array;
					break;
				case 2: 
					$master_indx = $sz_array;
					break;
				case 4:
					$master_indx = $kdx_array;
					break;
				case 3: 
					$master_indx = array_intersect($ksz_array, $sz_array);
					break;
				case 5: 
					$master_indx = array_intersect($ksz_array, $kdx_array);
					break;
				case 6:
					$master_indx = array_intersect($sz_array, $kdx_array);
					break;
				case 7:
					$master_indx = array_intersect($ksz_array, $kdx_array, $sz_array);
					break;
			}
			
			// index kereshetősége
			if (!empty ($_POST['index2'])) {
				if(in_array($_POST['index2'], $master_indx)) {
					$master_indx = "";
					$master_indx[] = $_POST['index2'];
				} else {
					echo "<div id='talalatok'> Találatok száma: 0</div>";
					die;
				}
			}
			
			// QUERY indítása - a feltételelek kumulatívak: AND
			// ha nincs a kulcsszavaknak megfelelő találat az egyszerűsített query érvényesül
			if (count($master_indx) < 1) {
				echo "<div id='talalatok'> Találatok száma: 0</div>";
				die;
			} elseif (count($master_indx) == 1) {
				$query = "SELECT * FROM exemplum WHERE `index2` IN ('$master_indx[0]') AND  ";
			} else {
				$master_imp = implode("', '", $master_indx);
				$query = "SELECT * FROM exemplum WHERE `index2` IN ('$master_imp') AND  ";
			}
			// találatok megszámlálása
			if(count($conditions) > 0) {
				$query .= implode (' AND ', $conditions) . " ORDER BY index2";
			} else {
				echo "<div id='talalatok'> Találatok száma: 0</div>";
				die;
			}
			// a query
			// echo $query;
			$result = mysqli_query($sqlkapcsolat, $query);	
			//Találatok száma
			$row_cnt = mysqli_num_rows($result);
			echo "<div id='talalatok'>" . "Találatok száma: " . $row_cnt. "</div>";
			//Találatok listázása
			$i=0;
				while(($row = mysqli_fetch_array($result)) && ($i++ <= $row_cnt)) {
				
					$str_ksz = $row['kulcsszavak'];
					$dis_ksz = str_replace("+", "; ", $str_ksz);
					
					$str_sz = $row['szereplok'];
					$dis_sz = str_replace("+", "; ", $str_sz);
								
					$output =  
					"<div class='frame_res'>" .
						"<span class='res_cat'>" . $i . ") " . "</span>" . "<br>" .
						"<span class='res_cat'>Index: </span>" . $row['index2'] . "<br>" .
						
						"<div id='res_1'>" .
							"<div class='res_1_left'><span class='res_cat'>Forráskódex: 
								</span>" . $row['forraskodex'] . "</div>" .
								
							"<div class='res_1_left'><span class='res_cat'>Oldalszám: 
								</span>" . $row['oldalszam'] . "</div>" .
								
							"<div id='res_1_right'><span class='res_cat'>Kontextus: 
								</span>" . $row['kontextus'] . "</div>" .
						"</div>" .
						
						"<div id='res_2'>" .
							"<div class='res_2_left'><span class='res_cat'>Exemplum címe: 
								</span>" . $row['exempl_cime'] . "</div>" .
								
							"<div class='res_2_left'><span class='res_cat'>Exemplum tartalma: 
								</span>" . $row['exempl_tartalma'] . "</div>" .
								
							"<div class='res_2_left'><span class='res_cat'>Szereplők: 
								</span>" . $dis_sz . "</div>" .
								
							"<div id='res_2_right'><span class='res_cat'>Műfajtipológia: 
								</span>" . $row['mufajtip'] .	 "</div>" .		
						"</div>" .
						
						"<a class='display' id='" . $row['index2'] .
						"'href='http://sermones.elte.hu/exemplumadatbazis/display/" . $row['index2'] . "' target='_blank' >Részletek...</a> <br>" .
						
		
						
					"</div>";
					echo $output;				
				}
		}
	}	
?>