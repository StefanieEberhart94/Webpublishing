<!DOCTYPE html>
<html lang="de"> 
<head> 
	<title>Mike and the Electronics</title>
	<meta name="author" content="Stefanie Eberhart, Bettina Haberstroh" />
	<meta name="date" content="2016-11-20" />
	<meta name="keywords" content="Musik"/>
	<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
</head>
<body>
	<?php
	include("nav.php");
	?>
	<div id="Halb">
	</br><p id="Mittig">Hallo lieber Bandsuchender!</p>
	<p>Sie sind zurzeit auf der Suche nach einer Band, die Ihre Party oder Ihr Fest musikalisch begleiten  soll, und die verschiedenste Musikstile professionell abdecken kann, damit die Veranstaltung zu einem vollen Erfolg wird?</br></br>
	Eventuell suchsen Sie sogar eine Band die einen ganz speziellen Stil abdecken soll.</br></br>
	Wir können Ihnen hier auf Ihrer persönlichen Suche nach einer geeigneten Formation mit unserer langjährigen Erfahrung im Musikgeschäft professionell weiterhelfen.</p></br>
	<p id="Fett">Wir können Ihnen hier folgendes Anbieten:</p></br></br>
	
	<p id="Rahmen">BAND – egal ob groß oder klein, wir finden die richtige Formation für Ihre Veranstaltung</p>
	<p>Egal ob Sie eine große oder kleine Veranstaltung durchführen wollen, wir haben die richtige Musikformation für Sie angefangen von:</br>
	<table id="Tabelle">
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>1 Mann Entertainer - 7 Mann Galabesetzung</td></tr>
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>3 - 5 Mann Jazzformation</td></tr>
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>7 - 14 Mann Blasorchester</td></tr>
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>15 Mann Bigband</td></tr>
	</table></br>

	<p id="Rahmen">EVENTMANAGEMENT – wir kümmern uns auch gerne um das Rahmenprogramm Ihres Events</p>
	<table id="Tabelle">
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>Artisten</td></tr>
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>DJ-Service</td></tr>
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>Catering</td></tr>
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>Light- & Beamershows</td></tr>
	</table></br>
	
	<p id="Rahmen">Konzeptionelle und technische Beratung – wir stellen unser langjähriges Know-How zur Verfügung</p>
	<table id="Tabelle">
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>Beratung</td></tr>
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>Erfahrung</td></tr>
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>Professionalität</td></tr>
			<tr><td><img id="Note" src="../Bilder/Note.png" alt="Note"></td><td>Diskretion</td></tr>
	</table>
	
	<p id="Farbe">INTERESSIERT?</p>
	<p id="Mittig">Dann Buchen Sie uns!</p>
	<div id="Button"><a id="button" href="../Buchen/Buchen.php">Hier</br>Klicken!!!</a></div>
<?php
	// Aufbau der Datenbankverbindung
$mysql = new mysqli("localhost", "root", "", "musik2017");
// $error enthält Fehlerausgaben, falls etwas schief geht.
$error = "";
if (isset($_POST['button'])) { // Neuer Kommentar!
   // Sicheres Belegen der Variablen aus dem Request.
   $mail = trim(isset($_POST['mail'])?$_POST['mail']:"");
   
   // Prüfen, ob alles ausgefüllt wurde.
   if (empty($mail) ) {
      $error = "Bitte alle Felder ausfüllen!";
   } else {
      // Das eigentliche SQL Insert Statement als "Prepared Statement"
      // Die Platzhalter (?) müssen noch mit Werten befüllt werden.
      $insert = $mysql->prepare("INSERT INTO newsletter (url,
                mail,zeitpunkt) VALUES (?,?,now())");
      // Befüllen der Parameter ("ss" gibt an, dass alle zwei Parameter Strings sind.)
      $insert->bind_param("ss", $_SERVER['PHP_SELF'], $mail);
      // Statement an die Datenbank schicken.
      $insert->execute();
      // Ggf. Fehler in die $error-Variable übertragen.
      if (!empty($insert->error)) $error = "DB ERROR: ".$insert->error;
   }
}
?>

<div id="comments">
   <hr />
   <?php
      // Falls es Fehler gibt, hier ausgeben.
      if (!empty($error)) {
                     echo ("<p>".$error."</p>");
      }
   ?>
   <form method="post" action="">
      E-Mail: <input type="text" name="mail" length="20" /><br/>
      
      <input type="submit" name="button" value="Kommentar absenden!"/>
   </form>
   <hr />
</div>

<?php
//Ausgabe von newslettern
// Wieder wird das SQL Select Statement vorbereitet.
$query = $mysql->prepare("SELECT mail,zeitpunkt FROM newsletter WHERE url=?");
// Als Parameter wird die aktuelle URL der Webseite übergeben.
$query->bind_param("s", $_SERVER['PHP_SELF']);
$query->execute();
// Umgekehrt werden die Ergebnisspalten wieder Variablen zugewiesen.
// Diese können dann bei der Ausgabe benutzt werden, siehe unten.
$query->bind_result($mail, $zeitpunkt);
// Falls es Fehler gibt, werden sie in $error vermerkt. Achtung, da da jetzt schon was
// drin stehen kann, hängen wir uns hinten dran.
if (!empty($query->error)) $error = "Insert Error: ".$error." / Query Error: ".$query->error;


?>
	</div>
	
	<div id="Sidebar">	
	<!--Newsletter-->
	<p id="Seitentext"><span class="fett">Newsletter</span></br>
	Abonnieren Sie unseren Newsletter, um die neuesten öffentliche Termine zu erhalten.
	<form method="post" action="/formmail.php">
	<p><label>E-Mail:</br><input id="Leer" type="text" name="Mail"></label></p>
	<input id="AboButton" type="submit" value="Newsletter abonnieren">
	</form></p>
	
	<!--Impressum-->
	<p id="Seitentext"><span class="fett"> Impressum</span></br>
	<span class="schwarz">Mike and the Electronics</span></br>Michael Eberhart</br>Tel. 07428/3417</br>
	michael.eberhart1@gmx.de</br></br>Bei Buchungen gelten unsere</br> 
	<a href="../agb.pdf"><img id="pdf" src="../Bilder/pdf.png" alt="Allgemeine Geschäftsbedingungen">Allgemeinen Geschäftsbedingungen.</a></p>
	</br>
	
	<!--Aktuelles-->
	<p id="Seitentext"><span class="fett">Aktuelles</span></br>Momentan sind noch keine Termine für 2017 bekannt.</br></br></br>
	</p></div>
	
</body>
</html>
