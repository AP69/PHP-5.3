<html>
<head>
 <title>Mail versturen aan de lijst</title>
 </head>
 <body>
 <?php
 ini_set("SMTP", "smtp.chello.nl");
 ini_set("smtp_port", 25);
 ini_set("sendmail_from", "burger@eduvision.nl");
 $bestandsnaam = "email.txt";
 $gegvens = file($bestandsnaam); //Sla bestand op in array
	$afzender = "website@leer-php.nl";
	$onderwerp = "Welkom bij onze dienst!";
	$aantal_adressen = count($gegvens);
	for ($nr=0; $nr <$aantal_adressen; $nr++) {
	$item = explode("|", $gegevens[$nr]);
	$achternaam = $items[0];
	$voornaam = $items[1];
	$geslacht = $items[2];
	if ($geslacht == "man") {
		$geslacht = "heer";
	} else{
		$geslacht = "mevrouw";
	}
	$mailadres = $items[3];
	$tekst = "Geachte $geslacht $achternaam\n\nWelkom bij onze dienst!\n";
	$tekst = .="Met vriendelijke groet,\n\nTeam Leer-php.nl";
	echo "Stuur mail:<br>$text<br>";
	mail($mailadres, $onderwerp, $tekst, "from: $afzender");
	}
?>
</body>
</html>