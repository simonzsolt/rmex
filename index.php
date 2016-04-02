<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="hu" xml:lang="hu">
<head>
	<?php 
		require 'adatbazis.php';
		include 'functions.php';
	?>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<title>Régi Magyar Exemplumadatbázis</title>
	<meta name="author" content="Bartók Zsófia Ágnes">
	<meta name="description" content="Régi Magyar Exemplumadatbázis: Kereső">
	<meta itemscope itemtype="CreativeWork" itemprop="keywords" name="keywords" content="exemplum, adatbazis, regi, magyar, irodalom, egyhazi, elte, btk, középkor<?php tags(); ?>">
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-56011780-1', 'auto');
		ga('send', 'pageview');
	</script>
	
</head>

<body id="index">

	<div id="index_header">
		<a href="http://sermones.elte.hu/exemplumadatbazis/kereso">
		<img id="img" src="http://sermones.elte.hu/exemplumadatbazis/images/Exemplum_mirabile_2.jpg" alt="Exemplum mirabile"></img> </a>
	</div>
	
	<div id="text_cont">
		<div id="title_cont">
			<a href="http://sermones.elte.hu/exemplumadatbazis/kereso">
			<span id="title_hu">Régi Magyar Exemplumadatbázis</span></br> 
			<span id="title_en">Database of Old Hungarian Exempla</span></a>
		</div>

		<div id="menu">

			<a href="./foreword.html"> Előszó </a>
			<a href="./toc.html"> A források tartalomjegyzéke </a>
			<a href="http://sermones.elte.hu/exemplumadatbazis/kereso"> Összetett keresés </a>
			
		</div>
		
		<div id="impressum">
		
		<div class="imp_rows">
			<span class="index_cim">Szerkeszti:</span> </br>
			<span class="index_nev">Bartók Zsófia Ágnes</span>
		</div>
		<div class="imp_rows">
			<span class="index_cim">Főmunkatárs:</span> </br>
			<span class="index_nev">Vrabély Márk</span>
		</div>
		
		<div class="imp_rows">
			<span class="index_cim">Munkatársak:</span></br>
			<span class="index_nev">A 2012–13-as és a 2013–14-es tavaszi félév</br>
			<i>Régi magyar irodalom szeminárium</i>ának hallgatói.</span>
		</div>
		<div class="imp_rows">
			<span class="index_cim">Műszaki szerkesztők:</span></br>
			<span class="index_nev">Bartók Ferenc</span></br>
			<span class="index_nev">Simon Zsolt</span>
		</div>
		
		<div class="imp_rows">
			<span class="index_text">Készül</br>
			az Eötvös Loránd Tudományegyetem Bölcsészettudományi Karának</br>
			Magyar Irodalomtörténeti Intézetében, </br>
			a Régi Magyar Irodalom Tanszéken</br>
			és az Európai és magyar reneszánsz doktori  programon.</span>
		</div>
		
		<div id="ev">2014</div>
		
		<div>
			<span class="index_text">Az adatbázis használatával készült publikációkban az adatbázis adatait és 
			lelőhelyét fel kell tüntetni!</span>
		</div>
		
		</div>
		
		<div><span class="index_text">Kapcsolat: bartokzsofia[at]gmail.com</span></div>
	</div>
	
	<script>
		$(document).ready(function() {
			$('#img').load(function() {
				var strImg = $('#index_header').css("height");
				var strTitle = $('#title_cont').css("height");
				var ImgHeight =  parseInt(strImg.replace("px", ""));
				var TitleHeight =  parseInt(strTitle.replace("px", ""));
				var margin = ImgHeight + TitleHeight + 25;
				// $('#impressum').attr("style", "margin-top:" + margin + "px; !important");
				// alert("strImg: " + strImg + " strTitle: " + strTitle + " ImgHeight: " + ImgHeight + " TitleHeight: " + TitleHeight + " margin: " + margin);
			}); //img ready
			
			$('#img').load(function() {
				$(window).resize( function() {
					var strImg = $('#index_header').css("height");
					var strTitle = $('#title_cont').css("height");
					var ImgHeight =  parseInt(strImg.replace("px", ""));
					var TitleHeight =  parseInt(strTitle.replace("px", ""));
					var margin = ImgHeight + TitleHeight + 25;
					// $('#impressum').attr("style", "margin-top:" + margin + "px; !important");
				});// win res
			}); //img ready
		}); // doc ready
	</script>
</body>