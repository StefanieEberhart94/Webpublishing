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
	<p id="Überschrift">Hier können Sie eine Buchungsanfrage stellen:</p>
	<p>Bitte füllen Sie alle Felder aus. Falls Sie bei einem Feld nichts eintragen können, 
		z.B. weil gewisse Informationen fehlen, tragen Sie bitte ein "-" oder einen einzelnen Buchstaben ein.</br></br>
		Sobald Sie auf Buchungsanfrage bestätigen drücken und sich alle Felder leeren, wurde die Anfrage an uns versendet.
		Die Bearbeitung kann einige Tage dauern. Wir bitten um Verständnis.</br></br>
		Lesen Sie unsere allgemeinen Geschäftsbegingungen (Im Impressum rechts)!</p></br></br>
	<img id="BandBild" src="../Bilder/Band.JPG" alt="Die Band">
	
<!--Hier wird "Abspeichern von Formulardate" aus der Vorlesung in angepasster Form als Buchungsformular verwendet.-->
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
      $error = "Bitte alle Felder ausfüllen! (Wenn Angaben nicht bekannt, Strich oder anderes Zeichen in das Feld)";
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
   <?php	// Falls es Fehler gibt, hier ausgeben.
      if (!empty($error)) {
                     echo ("<p>".$error."</p>");
      }
   ?>
   <form method="post" action="">
      <p id="TextBuchen">Vor- und Nachname:</br> <input type="text" name="name" length="40" /><br/>
	  E-Mail:</br> <input type="text" name="mail" length="20" /></br>
	  Telefon / Mobil:</br> <input type="text" name="mobil" length="20" /><br/>
	  Ort der Veranstaltung:</br> <input type="text" name="ort" length="20" /><br/>
	  Termin (Datum, Start und falls bekannt Länge der Veranstaltung):</br> <textarea type="text" name="termin" cols="60" rows="5"></textarea><br/>
	  Eventart (z.B. Hochzeit, Fasnet, ...):</br> <textarea type="text" name="eventart" cols="60" rows="5"></textarea><br/>
	  Besetzungswunsch und/oder weitere Wünsche:</br> <textarea type="text" name="angebot" cols="60" rows="5"></textarea><br/>
	  Wünsche: Stilrichtungen und Songtitel:</br> <textarea type="text" name="musikwunsch" cols="60" rows="5"></textarea><br/>  
      <input type="submit" name="button" value="Buchungsanfrage bestätigen!"/></p>
   </form>
</div>
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
	include("../Bilder/java.php");
	?>
</body>
</html>
