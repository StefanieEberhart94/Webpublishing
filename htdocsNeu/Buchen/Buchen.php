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
	<p><form method="post" action="/formmail.php">
	<label>Name<br><input type="text" name="Name"></label></br>
	<label>Email<br><input type="text" name="Mail"></label></br>
	<label>Telefon / Mobil<br><input type="text" name="Mobil"></label></br>
	<textarea name="" cols="16" rows="3"></textarea>Art des Events</br>
	<label>Wunschtermin<br><input type="text" name="Termin"></label></br>
	<label>Ort der Veranstaltung<br><input type="text" name="Ort"></label></br>
	<textarea name="" cols="16" rows="3"></textarea>Uhrzeit der Veranstaltung und ungefähre Dauer.</br>
	<textarea name="" cols="16" rows="3"></textarea>Besetzungswunsch und/oder weitere Wünsche</br>
	<textarea name="" cols="16" rows="3"></textarea>Wünsche: Musikwünsche und/oder Stilrichtungen</br>
	<input type="submit" value="Buchung bestätigen.">
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
</body>
</html>
