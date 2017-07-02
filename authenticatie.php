<?php
session_start();
function controle($naam, $wachtwoord) {
	if ($naam !="arjan" || $wachtwoord != md5("pass118")) {
	return false;
	} else {
		return true;
	}
}
if (isset($_POST["verzonden"]) && controle($_POST["naam"], md5($_POST["wachtwoord"]))==true) {
	$_SESSION['naam'] = $naam;
	$_SESSION['wachtwoord'] = md5($wachtwoord);
}
if (controle($_SESSION['naam'], $_SESSION['wachtwoord'])==false) {
	echo "<form method=\"post\" action=\"$PHP_SELF\">\n";
	echo "Naam: ";
	echo "<input type=\"text\" name=\"naam\">";
	echo "<br>";
	echo "Wachtwoord: ";
	echo "<input type=\"password\" name=\"wachtwoord\">";
	echo "<br>";
	echo "<input type=\"submit\" value=\"verzenden\" name=\"verzonden\">";
	echo "</form>";
	echo "wachtwoord is niet correct";
	exit;
}
?>