<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="hu" xml:lang="hu">
<head>
	<?php 
		include 'functions.php'; 
		require 'adatbazis.php';
	?>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="/exemplumadatbazis/js/jquery/jquery-ui.css" />
	<title>Exemplum - Kereső</title>
	<meta name="author" content="Bartók Zsófia Ágnes">
	<meta name="description" content="Régi Magyar Exemplumadatbázis: Kereső">
	<meta name="keywords" content="exemplum, adatbazis, regi, magyar, irodalom, egyhazi, elte, btk, középkor<?php tags(); ?>">
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-56011780-1', 'auto');
		ga('send', 'pageview');
	</script>
	
</head>

<body>
<div id="header"><span id="title">Kereső</span></div>

<div id = "formbox">
	<form name="kereses" method="post" action="kereso">
		<fieldset>
		
			<div id="left">
			
				<div id="search_1">
				
					<label for="index2">Index:</label>
						<input type="text" name="index2" placeholder="Index" value="<?php ?>"><br>
					
					<label for="forraskodex">Forráskódex:</label>
						<select class="select" name="forraskodex[]" multiple="multiple">
							<option value="Bod-kódex">Bod-kódex</option>
							<option value="Cornides-kódex">Cornides-kódex</option>
							<option value="Debreceni kódex">Debreceni kódex</option>
							<option value="Domonkos-kódex">Domonkos-kódex</option>
							<option value="Érdy-kódex">Érdy-kódex</option>
							<option value="Érsekújvári kódex">Érsekújvári kódex</option>
							<option value="Gömöry-kódex">Gömöry-kódex</option>
							<option value="Guary-kódex">Guary-kódex</option>
							<option value="Horvát-kódex">Horvát-kódex</option>
							<option value="Kazinczy-kódex">Kazinczy-kódex</option>
							<option value="Könyvecse az szent apostoloknak méltóságokról">
								Könyvecse az szent apostoloknak méltóságokról</option>
							
							<option value="Lázár Zelma-kódex">Lázár Zelma-kódex</option>
							<option value="Lobkowitz-kódex">Lobkowitz-kódex</option>
							<option value="Margit-legenda">Margit-legenda</option>
							<option value="Nádor-kódex">Nádor-kódex</option>
							<option value="Nagyszombati kódex">Nagyszombati kódex</option>
							<option value="Példák könyve">Példák könyve</option>
							<option value="Sándor-kódex">Sándor-kódex</option>
							<option value="Simor-kódex">Simor-kódex</option>
							<option value="Székelyudvarhelyi kódex">Székelyudvarhelyi kódex</option>
							<option value="Teleki-kódex">Teleki-kódex</option>
							<option value="Tihanyi kódex">Tihanyi kódex</option>
							<option value="Virginia-kódex">Virginia-kódex</option>
							<option value="Winkler-kódex">Winkler-kódex</option>
						</select>
					<br>
								
					<label for="lapvagylevel">Lap vagy levél:</label>
						<input type="text" name="oldalszam" placeholder="Lap vagy levél" value="<?php ?>"><br>
						
					<label for="modern_kiadas">Modern kiadás:</label>
						<input type="text" name="modern_kiadas" placeholder="Modern kiadás" value="<?php ?>"> <br>
						
					<label for="kotet">Kötet:</label>
						<input type="text" name="kotet" placeholder="Kötet" value="<?php ?>"> <br>
						
					<label for="kotet_oldalszama">Kötet oldalszáma:</label>
						<input type="text" name="kotet_oldalszama" placeholder="Kötet oldalszáma" value="<?php ?>"> <br>
						
					<label for="kodex_cime">Kódex címe/tartalma:</label>
						<input type="text" name="kodex_cime" placeholder="Kódex címe/tartalma" value="<?php ?>"> <br>
						
						<div id="kodex_form">
					<label for="kodex_alegyseg1">Kódex alegység #1</label>
						<input type="text" class="kodex_alegyseg" name="kodex_alegyseg_1" placeholder="Kódex alegység #1">
							<a id="add_kodex" href="#"> [+]</a> 
						<div class="kodexlista"></div>			
					</div>
					
					<label for="kontextus">Kontextus:</label>
						<select class="select" name="kontextus[]" multiple="multiple">
						  <option value="prédikáció">prédikáció</option>
						  <option value="legenda">legenda</option>
						  <option value="kontextusfüggetlen">kontextusfüggetlen</option>
						  <option value="értekezés">értekezés</option>
						</select>
					<br>
					
					<label for="befogado_cime">Befogadószöveg címe/témája:</label>
						<input type="text" name="befogado_cime" placeholder="Befogadószöveg címe" > <br>
					
				</div>

				<div id="search_2">
				
					<label for="exempl_cime">Exemplum címe:</label>
						<input type="text" name="exempl_cime" placeholder="Exemplum címe:" > <br>
						
					<label for="exempl_tartalma">Exemplum tartalma:</label>
						<input type="text" name="exempl_tartalma" placeholder="Exemplum tartalma:" > <br>
					
					<label for="exempl_szovege">Exemplum szövege:</label> 
						<input type="text" name="exempl_szovege" placeholder="Exemplum szövege:" > <br>
						
						
					<div id="ksz_form">
					<label for="kulcsszo1">Kulcsszó #1</label>
						<input type="text" class="kulcsszavak" name="kulcsszo_1" placeholder="Kulcsszó #1">
							<a id="add_tag" href="#"> [+]</a> 
						<div class="kulcslista"></div>			
					</div>

					<label for="unnep">Ünnep:</label> 
						<input type="text" name="unnep" placeholder="Ünnep" > <br>
						
					<label for="exempl_elozmeny">Az exemplum logikai előzménye:</label>
						<input type="text" name="exempl_elozmeny" placeholder="Logikai előzmény" > <br>
						
					<label for="tetel">Igazolni kívánt tétel:</label> 
						<input type="text" name="tetel" placeholder="Igazolni kívánt tétel" > <br>
						
					<label for="exempl_utaloszo">Exemplum mivoltra utaló szó:</label>
						<input type="text" name="exempl_utaloszo" placeholder="Utaló szó" > <br>
					
					<label for="exempl_bokor">Exemplumbokor:</label> 
						<input type="radio" name="exempl_bokor" value="igen" >igen 
						<input type="radio" name="exempl_bokor" value="nem" >nem <br>
								
				</div>
				
			</div>
			
			<div id="search_3">
			
				<label for="exempl_bokor_tagok">Exemplumbokor tagjai:</label>
					<input type="text" name="exempl_bokor_tagok" placeholder="Exemplumbokor tagjai" > <br>
				
				<label for="exemplutalas">Exemplumutalás:</label> 
					<input type="radio" name="exemplutalas" value="igen">igen 
					<input type="radio" name="exemplutalas" value="nem" >nem<br>
				
				<label for="konkluzio">Konklúzió, összefoglalás:</label> 
					<input type="radio" name="konkluzio" value="igen" >igen 
					<input type="radio" name="konkluzio" value="nem" >nem<br>
				
				<label for="fohasz">Lezáró fohász:</label> 
					<input type="radio" name="fohasz" value="igen">igen 
					<input type="radio" name="fohasz" value="nem" >nem<br>
				
				<label for="megszolitas">Megszólítás:</label> 
					<input type="radio" name="megszolitas" value="igen" >igen 
					<input type="radio" name="megszolitas" value="nem" >nem<br>
				
				<label for="buzditas">Lezáró buzdítás:</label> 
					<input type="radio" name="buzditas" value="igen" >igen 
					<input type="radio" name="buzditas" value="nem" >nem<br>
				
				<label for="allegorikus">Allegorikus értelmezés a szövegben:</label> 
					<input type="radio" name="allegorikus" value="igen" >igen 
					<input type="radio" name="allegorikus" value="nem" >nem<br>
					
				<label for="szereplotip">Szereplőtipológia:</label> 
					<select class="select" name="szereplotip[]" multiple>
					  <option value="névtelen szereplő">névtelen szereplő</option>
					  <option value="nevesített szereplő">nevesített szereplő</option>
					  <option value="ókori görög/római történelmi figura">ókori görög/római történelmi figura</option>
					  <option value="mitológiai alak">mitológiai alak</option>
					  <option value="bibliai alak">bibliai alak</option>
					  <option value="középkori történelmi alak">középkori történelmi alak</option>
					  <option value="állatok">állatok</option>
					  <option value="allegorikus alakok">allegorikus alakok</option>
					</select>
				<br>
				
				<div id="szereplok_form">
					<label for="szereplok1">Szereplő #1</label> 
					<input type="text" class="szereplok" name="szereplo_1" placeholder="Szereplő #1">
						<a id="add_szereplo" href="#"> [+]</a> 
					<div class="szereplolista"></div>			
				</div>	
								
					<label for="mufajtip">Műfajtipológia:</label> 
					<select class="select" name="mufajtip[]" multiple>
						<option value="látomás">látomás</option>
						<option value="saját élmény">saját élmény</option>
						<option value="magyar vonatkozású exemplum">magyar vonatkozású exemplum</option>
						<option value="jogi vonatkozású exemplum">jogi vonatkozású exemplum</option>
						<option value="imára tanító exemplum">imára tanító exemplum</option>
						<option value="liturgiamagyarázat">liturgiamagyarázat</option>
						<option value="népmesei elemeket tartalmazó exemplum">népmesei elemeket tartalmazó exemplum</option>
						<option value="Bibliai eredetű exemplum">Bibliai eredetű exemplum</option>
						<option value="történetírás">történetírás</option>
						<option value="verses jellegű/verses jellegű részt tartalmazó exemplum">
							verses jellegű/verses jellegű részt tartalmazó exemplum</option>
						<option value="természettudományos exemplu">természettudományos exemplum</option>
						<option value="legendarészlet, születéstörténet">legendarészlet, születéstörténet</option>
						<option value="legendarészlet, megtéréstörténet">legendarészlet, megtéréstörténet</option>
						
						<option value="legendarészlet, a szent életében tett csodái">
							legendarészlet, a szent életében tett csodái
						</option>
						
						<option value="legendarészlet, passiótörténet">legendarészlet, passiótörténet</option>
						<option value="legendarészlet, a szent halála után tett csodái">
							legendarészlet, a szent halála után tett csodái</option>
						<option value="drámai jellegű exemplum">drámai jellegű exemplum</option>
						<option value="legendarészlet, a szent halálakor tett csodái">
							legendarészlet, a szent halálakor tett csodái
						</option>
						
						<option value="legendarészlet, a szent tanításai">
							legendarészlet, a szent tanításai
						</option>
					</select>
				<br>
				
				<label for="hivatkozas">Hivatkozás:</label> 
					<input type="radio" name="hivatkozas" value="igen">igen 
					<input type="radio" name="hivatkozas" value="nem" >nem <br>
					
				<label for="hivatkozott_hely">Hivatkozott hely:</label>
					<input type="text" name="hivatkozott_hely" placeholder="Hivatkozott hely" > <br>
				
				<label for="exempl_kontext_forrasa">Az exemplum kontextusának forrása:</label>
					<input type="text" name="exempl_kontext_forrasa" placeholder="Kontextus forrása" > <br>
				
				<label for="exempl_forrasa">Exemplum forrása:</label> 
					<input type="text" name="exempl_forrasa" placeholder="Exemplum forrása" > <br>
					
				<label for="exempl_tipusa_forrashoz">Exemplum típusa a forráshoz való viszonya alapján:</label> 
					<input type="text" name="exempl_tipusa_forrashoz" placeholder="Típus" > <br>
					
				<label for="latin_forras">Latin forrás szövege:</label> 
					<input type="text" name="latin_forras" placeholder="Latin forrás szövege" > <br>
					
				<label for="katalogus_szam">Katalógus szám:</label> 
					<input type="text" name="katalogus_szam" placeholder="Katalógus szám" > <br>
			
				<label for="magyar_parhuzam">Magyar nyelvű párhuzam:</label> 
					<input type="text" name="magyar_parhuzam" placeholder="Magyar nyelvű párhuzam" > <br>
			
				<label for="tavolabbi_parhuzam">Távolabbi magyar nyelvű párhuzam:</label> 
					<input type="text" name="tavolabbi_parhuzam" placeholder="Távolabbi magyar nyelvű párhuzam" > <br>
			
				<label for="megjegyzes">Megjegyzés:</label> 
					<input type="text" name="megjegyzes" placeholder="Megjegyzés" > <br>
			</div>	
		</fieldset>
		<div id="int_wrap">
			<div id="interface">
				<input type="submit" class="interface" name="submit" value="Keresés"><br>	
				<input type="submit" class="interface" name="reset"  value="Alaphelyzet" />
			</div>
		</div>
	</form>
</div>

<script src="/exemplumadatbazis/js/jquery/jquery-1.11.1.min.js"></script>
<script src="/exemplumadatbazis/js/jquery/jquery-ui.min.js"></script>
<script src="/exemplumadatbazis/js/my_scripts_tags.js"></script>
<script src="/exemplumadatbazis/js/my_scripts_sz.js"></script>
<script src="/exemplumadatbazis/js/my_scripts_kodex.js"></script>


<?php 
	search(); 
	clear();	
?>

</body>	
