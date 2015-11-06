<?php
session_start();
if(!isset($_SESSION['usr']) || !isset($_SESSION['pswd'])){
header("Location: belepes.php");
} 
?>
<!DOCTYPE html>
<!--Author: B. Ferenc: ekekapa@gmail.com-->
<!--csunya az egesz, de gyorsan kellett+?-->
<!--nem paraméterezett SQL...-->
<html>
<title>Bartók Zsófia exemplumadatbázis feltöltés</title>
<meta charset="utf-8"> 
</head>
<body>

 
<h1>Feltöltés</h1>
<a href="logout.php">Kijelentkezés</a>
<?php
require 'adatbazis.php';
?>
<form action="" method="post">
<TABLE BORDER=0><TR>
<TR><TD>Index:</TD><TD><input type="text" name="index2"><br>
</TD></TR><TR><TD>Forráskódex:</TD><TD>
<select name="forraskodex[]" multiple="multiple">
					<option value="Bod-kódex">Bod-kódex</option>
					<option value="Cornides-kódex">Cornides-kódex</option>
					<option value="Debreceni kódex">Debreceni-kódex</option>
					<option value="Domonkos-kódex">Domonkos-kódex</option>
					<option value="Érdy-kódex">Érdy-kódex</option>
					<option value="Érsekújvári kódex">Érsekújvári-kódex</option>
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
</TD></TR><TR><TD>Oldalszám:</TD><TD><input type="text" name="oldalszam"><br>
</TD></TR><TR><TD>Modern kiadás:</TD><TD><input type="text" name="modern_kiadas"><br>
</TD></TR><TR><TD>Kötet:</TD><TD><input type="text" name="kotet"><br>
</TD></TR><TR><TD>Kötet oldalszáma:</TD><TD><input type="text" name="kotet_oldalszama"><br>
</TD></TR><TR><TD>Kódex címe/tartalma:</TD><TD><input type="text" name="kodex_cime"><br>
</TD></TR><TR><TD>Kódex alegysége1:</TD><TD><input type="text" name="kodex_alegyseg1"><br>
</TD></TR><TR><TD>Kódex alegysége2:</TD><TD><input type="text" name="kodex_alegyseg2"><br>
</TD></TR><TR><TD>Kódex alegysége3:</TD><TD><input type="text" name="kodex_alegyseg3"><br>
</TD></TR><TR><TD>Kódex alegysége4:</TD><TD><input type="text" name="kodex_alegyseg4"><br>
</TD></TR><TR><TD>Kódex alegysége5:</TD><TD><input type="text" name="kodex_alegyseg5"><br>
</TD></TR><TR><TD>Kontextus:</TD><TD> 
<select name="kontextus[]" multiple>
  <option value="prédikáció">prédikáció</option>
  <option value="legenda">legenda</option>
  <option value="kontextusfüggetlen">kontextusfüggetlen</option>
  <option value="értekezés">értekezés</option>
</select>
<br>
</TD></TR><TR><TD>Befogadószöveg címe/témája:</TD><TD><input type="text" name="befogado_cime"><br>
</TD></TR><TR><TD>Exemplum címe:</TD><TD><input type="text" name="exempl_cime"><br>
</TD></TR><TR><TD>Exemplum tartalma:</TD><TD><input type="text" name="exempl_tartalma"><br>
</TD></TR><TR><TD>Exemplum szövege:</TD><TD> <input type="text" name="exempl_szovege"><br>
</TD></TR><TR><TD>Kulcsszavak:</TD><TD> <input type="text" name="kulcsszavak">minden szót + jellel elválasztva<br>
</TD></TR><TR><TD>Ünnep:</TD><TD> <input type="text" name="unnep"><br>
</TD></TR><TR><TD>Az exemplum logikai előzménye:</TD><TD><input type="text" name="exempl_elozmeny"><br>
</TD></TR><TR><TD>Igazolni kívánt tétel:</TD><TD> <input type="text" name="tetel"><br>
</TD></TR><TR><TD>Exemplum-mivoltra utaló szó:</TD><TD><input type="text" name="exempl_utaloszo"><br>

</TD></TR><TR><TD>Exemplum-bokor:</TD><TD> <input type="radio" name="exempl_bokor" value="igen" >igen <input type="radio" name="exempl_bokor" value="nem" checked="checked">nem<br>
</TD></TR><TR><TD>Exemplum-bokor tagjai:</TD><TD><input type="text" name="exempl_bokor_tagok"><br>
</TD></TR><TR><TD>Exemplumutalás:</TD><TD> <input type="radio" name="exemplutalas" value="igen">igen <input type="radio" name="exemplutalas" value="nem" checked="checked">nem<br>
</TD></TR><TR><TD>Konklúzió, összefoglalás:</TD><TD> <input type="radio" name="konkluzio" value="igen" >igen <input type="radio" name="konkluzio" value="nem" checked="checked">nem<br>
</TD></TR><TR><TD>Lezáró fohász:</TD><TD> <input type="radio" name="fohasz" value="igen">igen <input type="radio" name="fohasz" value="nem" checked="checked">nem<br>
</TD></TR><TR><TD>Megszólítás:</TD><TD> <input type="radio" name="megszolitas" value="igen" >igen <input type="radio" name="megszolitas" value="nem" checked="checked">nem<br>
</TD></TR><TR><TD>Lezáró buzdítás:</TD><TD> <input type="radio" name="buzditas" value="igen" c>igen <input type="radio" name="buzditas" value="nem" checked="checked">nem<br>
</TD></TR><TR><TD>Allegorikus értelmezés a szövegben:</TD><TD> <input type="radio" name="allegorikus" value="igen" >igen <input type="radio" name="allegorikus" value="nem" checked="checked">nem<br>

</TD></TR><TR><TD>Szereplőtipológia:</TD><TD> 
<select name="szereplotip[]" multiple>
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
</TD></TR><TR><TD>Szereplők:</TD><TD> <input type="text" name="szereplok"><br>minden szereplőt +jellel elválasztva
</TD></TR><TR><TD>Műfajtipológia:</TD><TD> 
<select name="mufajtip[]" multiple>
  <option value="látomás">látomás</option>
  <option value="saját élmény">saját élmény</option>
  <option value="magyar vonatkozású exemplum">magyar vonatkozású exemplum</option>
  <option value="jogi vonatkozású exemplum">jogi vonatkozású exemplum</option>
  <option value="imára tanító exemplum">imára tanító exemplum</option>
  <option value="liturgiamagyarázat">liturgiamagyarázat</option>
  <option value="népmesei elemeket tartalmazó exemplum">népmesei elemeket tartalmazó exemplum</option>
  <option value="Bibliai eredetű exemplum">Bibliai eredetű exemplum</option>
  <option value="történetírás">történetírás</option>
  <option value="verses jellegű/verses jellegű részt tartalmazó exemplum">verses jellegű/verses jellegű részt tartalmazó exemplum</option>
  <option value="természettudományos exemplu">természettudományos exemplum</option>
  <option value="legendarészlet, születéstörténet">legendarészlet, születéstörténet</option>
  <option value="legendarészlet, megtéréstörténet">legendarészlet, megtéréstörténet</option>
  <option value="legendarészlet, a szent életében tett csodái">legendarészlet, a szent életében tett csodái</option>
  <option value="legendarészlet, passiótörténet">legendarészlet, passiótörténet</option>
  <option value="legendarészlet, a szent halála után tett csodái">legendarészlet, a szent halála után tett csodái</option>
  <option value="legendarészlet, a szent halálakor tett csodái">legendarészlet, a szent halálakor tett csodái</option>
  <option value="drámai jellegű exemplum">drámai jellegű exemplum</option>
  <option value="legendarészlet, a szent tanításai">legendarészlet, a szent tanításai</option>
</select>
<br>

</TD></TR><TR><TD>Hivatkozás:</TD><TD> <input type="radio" name="hivatkozas" value="igen">igen <input type="radio" name="hivatkozas" value="nem" checked="checked">nem<br>
</TD></TR><TR><TD>Hivatkozott hely:</TD><TD><input type="text" name="hivatkozott_hely"><br>
</TD></TR><TR><TD>Az exemplum kontextusának forrása:</TD><TD><input type="text" name="exempl_kontext_forrasa"><br>
</TD></TR><TR><TD>Exemplum forrása:</TD><TD><input type="text" name="exempl_forrasa"><br>
</TD></TR><TR><TD>Exemplum típusa a forráshoz való viszonya alapján:</TD><TD><input type="text" name="exempl_tipusa_forrashoz"><br>
</TD></TR><TR><TD>Latin forrás szövege:</TD><TD><input type="text" name="latin_forras"><br>
</TD></TR><TR><TD>Katalógus szám:</TD><TD> <input type="text" name="katalogus_szam"><br>
</TD></TR><TR><TD>Magyar nyelvű párhuzam:</TD><TD> <input type="text" name="magyar_parhuzam"><br>
</TD></TR><TR><TD>Távolabbi párhuzam:</TD><TD> <input type="text" name="tavolabbi_parhuzam"><br>
</TD></TR><TR><TD>Megjegyzés:</TD><TD> <input type="text" name="megjegyzes"><br>
</TD></TR><TR><TD>Adatfelvivő neve:</TD><TD> <input type="text" name="adatfelvivo"><br>
</TD></TR><TR><TD>Utolsó módosítás dátuma:</TD><TD>

<?php
$szoveg="<SELECT name='mod_ido_ev'>";
$datum=getdate(time());
$aktualis_ev=$datum['year'];
for($x=1990; $x<=$aktualis_ev; $x++)
{
$szoveg.="<option value='".$x."'>".$x."</option>";
}
$szoveg.="</SELECT><SELECT name='mod_ido_honap'>";
for($x=1; $x<=12; $x++)
{
$szoveg.="<option value='".$x."'>".$x."</option>";
}
$szoveg.="</SELECT><SELECT name='mod_ido_nap'>";
for($x=1; $x<=31; $x++)
{
$szoveg.="<option value='".$x."'>".$x."</option>";
}
$szoveg.="</SELECT>";
print $szoveg;	
?>


</TD></TR><TR><TD>Átnéző:</TD><TD><input type="text" name="atnezo"><br>
</TD></TR><TR><TD>Átnézés dátuma:</TD><TD>
<?php
$szoveg="<SELECT name='atnez_ido_ev'>";
$datum=getdate(time());
$aktualis_ev=$datum['year'];
for($x=1990; $x<=$aktualis_ev; $x++)
{
$szoveg.="<option value='".$x."'>".$x."</option>";
}
$szoveg.="</SELECT><SELECT name='atnez_ido_honap'>";
for($x=1; $x<=12; $x++)
{
$szoveg.="<option value='".$x."'>".$x."</option>";
}
$szoveg.="</SELECT><SELECT name='atnez_ido_nap'>";
for($x=1; $x<=31; $x++)
{
$szoveg.="<option value='".$x."'>".$x."</option>";
}
$szoveg.="</SELECT>";
print $szoveg;	
?>
</TD></TR><TR><TD colspan=2 align=center><input type="submit" name="submit" value="Feltöltés"></TD>
</tr></table>




<?php
if( !isset($_POST["index2"]) ) {
}
else{
$char="SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'";
mysqli_query($sqlkapcsolat,$char);
$parancs = "INSERT INTO ".$tabla." VALUES(";
$parancs2 = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='".$adatbazis."' AND `TABLE_NAME`='".$tabla."'";
	$eredmeny = mysqli_query($sqlkapcsolat,$parancs2);
	$i=0;
	while($row = mysqli_fetch_array($eredmeny))
	  {
	  if($i==0) { $parancs.="0,"; } //id...
	  else if($i==1)
		$parancs.="'".$_POST[$row[0]]."'";
	  else if(!isset($_POST[$row[0]])){ 
		$parancs.=",''"; //multiplenél
		}
	  else if(is_array($_POST[$row[0]])){
		$parancs.=",";
		$j=0;
		$parancs.="'";
		foreach ($_POST[$row[0]] as $valasztott){
			
			if($j==0)
				$parancs.=$valasztott;
			else
			$parancs.="+".$valasztott;
			$j++;
			}
		$parancs.="'";
	  }
	  else {
	  $parancs.=",'".$_POST[$row[0]]."'";
	  }
	  //echo $row[0];
	  //echo "<br>";
	  $i++;
	  }
	  $parancs.=")";
//print $parancs;
$eredmeny = mysqli_query($sqlkapcsolat,$parancs);
	if (!$eredmeny) {
		die('Hiba: ' . mysqli_error($sqlkapcsolat));
		print('szólj nekem');
	}
	else print("<br>Sikeres feltöltés. <a href='feltoltott.php'>Itt megtekintheted az eddig feltöltött adatokat.</a>");
}

mysqli_close($sqlkapcsolat);
?>

</form>
</body>
</html>
