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

	
<?php
	// Aufbau der Datenbankverbindung
$mysql = new mysqli("localhost", "root", "", "musik2017");
// $error enthält Fehlerausgaben, falls etwas schief geht.
$error = "";
if (isset($_POST['button'])) { // Neuer Kommentar!
   // Sicheres Belegen der Variablen aus dem Request.
   $name = trim(isset($_POST['name'])?$_POST['name']:"");
   $mail = trim(isset($_POST['mail'])?$_POST['mail']:"");
   $mobil = trim(isset($_POST['mobil'])?$_POST['mobil']:"");
   $eventart = trim(isset($_POST['eventart'])?$_POST['eventart']:"");
   $termin = trim(isset($_POST['termin'])?$_POST['termin']:"");
   $ort = trim(isset($_POST['ort'])?$_POST['ort']:"");
   $angebot = trim(isset($_POST['angebot'])?$_POST['angebot']:"");
   $musikwunsch = trim(isset($_POST['musikwunsch'])?$_POST['musikwunsch']:"");
   // Prüfen, ob alles ausgefüllt wurde.
   if (empty($name) || empty($mail) || empty($mobil) || empty($eventart) || empty($termin) || empty($ort) || empty($angebot) || empty($musikwunsch)){
      $error = "Bitte alle Felder ausfüllen! (Wenn Angaben nicht bekannt, Strich in das Feld)";
   } else {
      // Das eigentliche SQL Insert Statement als "Prepared Statement"
      // Die Platzhalter (?) müssen noch mit Werten befüllt werden.
      $insert = $mysql->prepare("INSERT INTO buchen (url, name, mail, mobil, eventart, termin, ort, angebot, musikwunsch, zeitpunkt)
      			VALUES (?,?,?,?,?,?,?,?,?,now())");
      // Befüllen der Parameter ("ss" gibt an, dass alle zwei Parameter Strings sind.)
      $insert->bind_param("sssssssss", $_SERVER['PHP_SELF'], $name, $mail, $mobil, $eventart, $termin, $ort, $angebot, $musikwunsch);
      // Statement an die Datenbank schicken.
      $insert->execute();
      // Ggf. Fehler in die $error-Variable übertragen.
      if (!empty($insert->error)) $error = "DB ERROR: ".$insert->error;
   }
}
?>

<div id="comments">
   <?php
      // Falls es Fehler gibt, hier ausgeben.
      if (!empty($error)) {
                     echo ("<p>".$error."</p>");
      }
   ?>
   <form method="post" action="">
      Vor- und Nachname:</br> <input type="text" name="name" length="40" /><br/>
	  E-Mail:</br> <input type="text" name="mail" length="20" /><br/>
	  Telefon / Mobil:</br> <input type="text" name="mobil" length="20" /><br/>
	  Ort der Veranstaltung:</br> <input type="text" name="ort" length="20" /><br/>
	  Eventart (z.B. Hochzeit, Fasnet, ...):</br> <textarea type="text" name="eventart" cols="60" rows="5"></textarea><br/>
	  Termin (Datum, Start und falls bekannt Länge der Veranstaltung):</br> <textarea type="text" name="termin" cols="60" rows="5"></textarea><br/>
	  Besetzungswunsch und/oder weitere Wünsche:</br> <textarea type="text" name="angebot" cols="60" rows="5"></textarea><br/>
	  Wünsche: Stilrichtungen und Songtitel:</br> <textarea type="text" name="musikwunsch" cols="60" rows="5"></textarea><br/>	  
      <input type="submit" name="button" value="Buchungsanfrage bestätigen!"/>
   </form>
</div>

<?php
//Ausgabe von buchen
// Wieder wird das SQL Select Statement vorbereitet.
$query = $mysql->prepare("SELECT name,mail,mobil,eventart,termin,ort,angebot,musikwunsch,zeitpunkt FROM buchen WHERE url=?");
// Als Parameter wird die aktuelle URL der Webseite übergeben.
$query->bind_param("s", $_SERVER['PHP_SELF']);
$query->execute();
// Umgekehrt werden die Ergebnisspalten wieder Variablen zugewiesen.
// Diese können dann bei der Ausgabe benutzt werden, siehe unten.
$query->bind_result($name, $mail, $mobil, $eventart, $termin, $ort, $angebot, $musikwunsch, $zeitpunkt);
// Falls es Fehler gibt, werden sie in $error vermerkt. Achtung, da da jetzt schon was
// drin stehen kann, hängen wir uns hinten dran.
if (!empty($query->error)) $error = "Insert Error: ".$error." / Query Error: ".$query->error;

?>	
	
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

