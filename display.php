<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="hu" xml:lang="hu">
<head>
	<base href="http://sermones.elte.hu/exemplumadatbazis/">
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="author" content="Bartók Zsófia Ágnes">
	<meta name="description" content="Régi Magyar Exemplumadatbázis">
<?php 
	require 'adatbazis.php';
	require 'functions.php';
	$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
	mysqli_query($sqlkapcsolat,$char); 
	
	$id = explode("/", $_SERVER['REQUEST_URI']);
	// query db with display index
	$sql_display = "SELECT * FROM exemplum WHERE index2='$id[3]' ";
	$rs_display = mysqli_query($sqlkapcsolat, $sql_display);
	$row_display = mysqli_fetch_assoc($rs_display);
	$num_display = mysqli_num_rows($rs_display);
	
	$str_ksz = $row_display['kulcsszavak'];
	$dis_ksz = str_replace("+", "; ", $str_ksz);
	
	$str_sz = $row_display['szereplok'];
	$dis_sz = str_replace("+", "; ", $str_sz);
	
	$str_kdx = $row_display['kodex_alegyseg'];
	$dis_kdx = str_replace("+", "; ", $str_kdx);
?>

<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-56011780-1', 'auto');
	ga('send', 'pageview');
</script>

	<title>Exemplumadatbázis - <?= $id[3]; ?></title>
</head>

<body>
	<div id="header"><span id="title"><?php echo $id[3]; ?></span></div>
	
	<div id='display_res'>

		<div id="block_1">
			<div id="szoveg"  ><span class='res_cat'>Exemplum szövege:	
			</span> <?php echo "<p id='exempl_szovege'>" . $row_display['exempl_szovege'] . "</p>"; ?>  </div>
		</div>
		
		<div id="block_2">
			<div class="block_a"  ><span class='res_cat'>Forráskódex: </span>  <?php echo $row_display['forraskodex'] ?>  </div>
			<div class="block_a"  ><span class='res_cat'>Oldalszám:	</span> <?php echo $row_display['oldalszam'] ?>  </div>
			<div class="block_a"  ><span class='res_cat'>Modern kiadás:	</span> <?php echo $row_display['modern_kiadas'] ?>  </div>
			<div class="block_a"  ><span class='res_cat'>Kötet:	</span> <?php echo $row_display['kotet'] ?>  </div>
			<div class="block_a"  ><span class='res_cat'>Kötet oldalszáma: </span><?php echo $row_display['kotet_oldalszama'] ?>  </div> 
			<div class="block_a"  ><span class='res_cat'>Kódex címe/tartalma: </span> <?php echo $row_display['kodex_cime'] ?>  </div>
			<div class="block_a"  ><span class='res_cat'>Kódex alegysége: </span> <?php echo $dis_kdx ?>  </div> 
				
			<div class="block_a"  ><span class='res_cat'>Kontextus: 	</span> <?php echo $row_display['kontextus'] ?>  </div>      
			<div class="block_a"  ><span class='res_cat'>Befogadószöveg címe/témája:</span>  
				<?php echo $row_display['befogado_cime'] ?>  </div>
			<div class="block_a"  ><span class='res_cat'>Exemplum címe:	</span>  <?php echo $row_display['exempl_cime'] ?>  </div>
			<div class="block_a"  ><span class='res_cat'>Exemplum tartalma:</span>
				<?php echo $row_display['exempl_tartalma'] ?>  </div>
			
			<div class="block_a"  ><span class='res_cat'>Kulcsszavak: </span>  <?php echo $dis_ksz  ?> </div>
				
			<div class="block_a"> <span class='res_cat'>Ünnep:			</span> <?php echo $row_display['unnep'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Az exemplum logikai előzménye:</span>  <?php echo $row_display['exempl_elozmeny'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Igazolni kívánt tétel:</span>  <?php echo $row_display['tetel'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Exemplum-mivoltra utaló szó:</span>  <?php echo $row_display['exempl_utaloszo'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Exemplum bokor: 	</span> <?php echo $row_display['exempl_bokor'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Exemplum-bokor tagjai:	</span> <?php echo $row_display['exempl_bokor_tagok'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Exemplumutalás: 	</span> <?php echo $row_display['exemplutalas'] ?>  </div>      
			<div class="block_a"> <span class='res_cat'>Konklúzió, összefoglalás: </span> <?php echo $row_display['konkluzio'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Lezáró fohász:	</span> <?php echo $row_display['fohasz'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Megszólítás:	</span> <?php echo $row_display['megszolitas'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Lezáró buzdítás:	</span> <?php echo $row_display['buzditas'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Allegorikus értelmezés a szövegben:	</span> <?php echo $row_display['allegorikus'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Szereplőtipológia: </span> <?php echo $row_display['szereplotip'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Szereplők: 		</span> <?php echo $dis_sz ?> </div> 
			
			<div class="block_a"> <span class='res_cat'>Műfajtipológia: 	</span> <?php echo $row_display['mufajtip'] ?>  </div>
			
			<div class="block_a"> <span class='res_cat'>Hivatkozás:		</span> <?php echo $row_display['hivatkozas'] ?>  </div> 
			
			<div class="block_a"> <span class='res_cat'>Hivatkozott hely:	</span> <?php echo $row_display['hivatkozott_hely'] ?>  </div>
			
			<div class="block_a"> <span class='res_cat'>Az exemplum kontextusának forrása:</span>  <?php echo $row_display['exempl_kontext_forrasa'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Exemplum forrása:	</span> <?php echo $row_display['exempl_forrasa'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Exemplum típusa a forráshoz való viszonya alapján:</span> 
				<?php echo $row_display['exempl_tipusa_forrashoz'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Latin forrás szövege:	</span> <?php echo $row_display['latin_forras'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Katalógus szám:			</span> <?php echo $row_display['katalogus_szam'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Magyar nyelvű párhuzam:</span>  <?php echo $row_display['magyar_parhuzam'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Távolabbi párhuzam:		</span> <?php echo $row_display['tavolabbi_parhuzam'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Megjegyzés:		</span> <?php echo $row_display['megjegyzes'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Feltöltő neve:		</span> <?php echo $row_display['adatfelvivo'] ?>  </div> 
			<div class="block_a"> <span class='res_cat'>Feltöltés dátuma:		
				</span> <?php echo $row_display['mod_ido_ev'] . "." . $row_display['mod_ido_honap'] . "." . $row_display['mod_ido_nap'] . "."  ?>  </div>
			</div> 
		</div>
	</div>

</body>