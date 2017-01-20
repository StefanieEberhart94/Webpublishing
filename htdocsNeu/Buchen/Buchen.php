<!DOCTYPE html>
<html lang="de"> 
<head> 
	<title>Alleinunterhalter</title>
	<meta name="author" content="Stefanie Eberhart, Bettina Haberstroh" />
	<meta name="date" content="2016-11-20" />
	<meta name="keywords" content="Musik"/>
	<link type="text/css" rel="stylesheet" href="../stylesheet.css"/>
</head>
<body>
	<?php
	include("../nav.php");
	?>
	<div id="Halb">
	<p id="Überschrift">Hier können Sie uns buchen:</p>
	
	<img id="BandBild" src="../Bilder/Band.JPG" alt="Die Band">
		<!-- The Modal -->
	<div id="myModal" class="modal">
	<span class="close">&times;</span>
	<img class="modal-content-groß" id="img01">
	<div id="caption"></div></div>
	
	<p><form method="post" action="../formmail.php">
	<label><p class="TextBuchen">Name</p><input id="Leer" type="text" name="Name"></label></br>
	<label><p class="TextBuchen">Email</p><input id="Leer" type="text" name="Mail"></label></br>
	<label><p class="TextBuchen">Telefon / Mobil</p><input id="Leer" type="text" name="Mobil"></label></br>
	<p class="TextBuchen">Art des Events</p><textarea id="Leer" name="" cols="22" rows="3"></textarea></br>
	<label><p class="TextBuchen">Wunschtermin</p><input id="Leer" type="text" name="Termin"></label></br>
	<label><p class="TextBuchen">Ort der Veranstaltung</p><input id="Leer" type="text" name="Ort"></label></br>
	<p class="TextBuchen">Uhrzeit der Veranstaltung und ungefähre Dauer</p><textarea id="Leer" name="" cols="22" rows="3"></textarea></br>
	<p class="TextBuchen">Besetzungswunsch und/oder weitere Wünsche</p><textarea id="Leer" name="" cols="22" rows="3"></textarea></br>
	<p class="TextBuchen">Wünsche: Musikwünsche und/oder Stilrichtungen</p><textarea id="Leer" name="" cols="22" rows="3"></textarea></br>
	<input id="BuchenButton" type="submit" value="Buchung bestätigen.">
	<p>Lesen Sie unsere allgemeinen Geschäftsbegingungen im Impressum rechts auf der Seite.</p>
	</form></p></br>
	</div>
	<div id="Sidebar">
	<!--Impressum-->
	<p id="Seitentext"><span class="fett"> Impressum</span></br></br>
	<span class="schwarz">Mike and the Electronics</span></br>Michael Eberhart</br>Tel. 07428/3417</br>
	michael.eberhart1@gmx.de</br></br>Bei Buchungen gelten unsere</br> 
	<a href="../agb.pdf"><img id="pdf" src="../Bilder/pdf.png" alt="Allgemeine Geschäftsbedingungen">Allgemeinen Geschäftsbedingungen.</a></p></br>
	<!--Kalender-->
	<p id="Seitentext"><span class="fett"> Kalender</span></br></br>
	<?php
	include("../Kalender/Kalender3.php");
	?></p>
	</div>
	<?php
	include("../java.php");
	?>
</body>
</html>
